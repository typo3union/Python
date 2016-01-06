<?php
namespace JS\JsDownload\Service;

/*
 *  (c) 2015 Jainish Senjaliya <jainish.online@gmail.com>
 *  Jainish Senjaliya <jainish.online@gmail.com>
*/

class DownloadService implements \TYPO3\CMS\Core\SingletonInterface {

	/**
	 * fileRepository
	 * 
	 * @var \JS\JsDownload\Domain\Repository\FileRepository
	 * @inject
	 */
	protected $fileRepository = NULL;
	
	/**
	 * missingConfiguration
	 *
	 * @param $settings
	 * @return
	 */
	 
	function missingConfiguration($settings)
	{
		if($settings['configuration']!=1){
			return 'include_template';
		}else if($settings['storagePID']=="" ){
			return 'storagePID';
		}else if($settings['categories']=="" ){
			return 'categories';
		}
		return 1;
	}

 	/**
	 * includeAdditionalData
	 *
	 * @param $settings
	 * @return
	 */
	
	function includeAdditionalData($settings)
	{
		
		$settings['includeJSinFooter']	= 1;
		$settings['includeCSSinFooter']	= 1;
		
		$additionalDataJS	= '<script src="typo3conf/ext/js_download/Resources/Public/Script/downloadManager.js" type="text/javascript"></script>';
		
		$additionalDataCSS	= '<link rel="stylesheet" href="typo3conf/ext/js_download/Resources/Public/Css/downloadManager.css" type="text/css" media="all" />';
		
		if($settings['includeJSinFooter']==1){
			$GLOBALS['TSFE']->additionalFooterData['downloadManagerJS'] = $additionalDataJS;
		}else{
			$GLOBALS['TSFE']->additionalHeaderData['downloadManagerJS'] = $additionalDataJS;	
		}
		
		if($settings['includeCSSinFooter']==1){
			$GLOBALS['TSFE']->additionalFooterData['downloadManagerCSS'] = $additionalDataCSS;
		}else{
			$GLOBALS['TSFE']->additionalHeaderData['downloadManagerCSS'] = $additionalDataCSS;	
		}
	}
	
	/**
	 * download
	 *
	 * @param $fullPath
	 * @param $image
	 * @return
	 */
	public function download($fullPath,$image) {
		
	
		$tmp = explode('.', $image);
		
		$fsize = filesize($fullPath);
		
		switch ($tmp[count($tmp) - 1]) {
				case 'pdf':
					$ctype = 'application/pdf';
					break;
				case 'exe':
					$ctype = 'application/octet-stream';
					break;
				case 'zip':
					$ctype = 'application/zip';
					break;
				case 'docx':
				case 'doc':
					$ctype = 'application/msword';
					break;
				case 'csv':
				case 'xls':
				case 'xlsx':
					$ctype = 'application/vnd.ms-excel';
					break;
				case 'ppt':
					$ctype = 'application/vnd.ms-powerpoint';
					break;
				case 'gif':
					$ctype = 'image/gif';
					break;
				case 'png':
					$ctype = 'image/png';
					break;
				case 'jpeg':
				case 'jpg':
					$ctype = 'image/jpg';
					break;
				case 'tif':
				case 'tiff':
					$ctype = 'image/tiff';
					break;
				case 'psd':
					$ctype = 'image/psd';
					break;
				case 'bmp':
					$ctype = 'image/bmp';
					break;
				case 'ico':
					$ctype = 'image/vnd.microsoft.icon';
					break;
				default:
					$ctype = 'application/force-download';
			}
	
			header('Pragma: public');
			// required
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Cache-Control: private', false);
			// required for certain browsers
			header("Content-Type: {$ctype}");
			header('Content-Disposition: attachment; filename="' . $image . '";');
			header('Content-Transfer-Encoding: binary');
			header('Content-Length: ' . $fsize);
			ob_clean();
			flush();
			readfile($fullPath);
			die;
	}	
	
	/**
	 * noAccess
	 *
	 * @return
	 */
	public function noAccess() {
		die('<h1>Sorry</h1><p>You do not have the right to download this file.');
	}	
}

?>