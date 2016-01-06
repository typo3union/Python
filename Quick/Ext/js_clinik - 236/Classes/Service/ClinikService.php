<?php
namespace JS\JsClinik\Service;

/*
 *  (c) 2015 Jainish Senjaliya <jainish.online@gmail.com>
 *  Jainish Senjaliya <jainish.online@gmail.com>
*/

class ClinikService implements \TYPO3\CMS\Core\SingletonInterface {

	/**
	 * clinikRepository
	 * 
	 * @var \JS\JsClinik\Domain\Repository\ClinikRepository
	 * @inject
	 */
	protected $clinikRepository = NULL;
	
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
		
		$additionalDataJS	= '<script src="typo3conf/ext/js_clinik/Resources/Public/Script/clinik.js" type="text/javascript"></script>';
		
		$additionalDataCSS	= '<link rel="stylesheet" href="typo3conf/ext/js_clinik/Resources/Public/Css/clinik.css" type="text/css" media="all" />';
		
		if($settings['includeJSinFooter']==1){
			$GLOBALS['TSFE']->additionalFooterData['clinikFinderJS'] = $additionalDataJS;
		}else{
			$GLOBALS['TSFE']->additionalHeaderData['clinikFinderJS'] = $additionalDataJS;	
		}
		
		if($settings['includeCSSinFooter']==1){
			$GLOBALS['TSFE']->additionalFooterData['clinikFinderCSS'] = $additionalDataCSS;
		}else{
			$GLOBALS['TSFE']->additionalHeaderData['clinikFinderCSS'] = $additionalDataCSS;	
		}
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