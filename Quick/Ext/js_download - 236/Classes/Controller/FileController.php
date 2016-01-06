<?php
namespace JS\JsDownload\Controller;

ini_set('display_errors', 1);
/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * FileController
 */
class FileController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * fileRepository
	 * 
	 * @var \JS\JsDownload\Domain\Repository\FileRepository
	 * @inject
	 */
	protected $fileRepository = NULL;
	

	/**
	 * downloadService
	 *
	 * @var \JS\JsDownload\Service\DownloadService
	 * @inject
	 */
	protected $downloadService;
		

	/**
	 * action download
	 * 
	 * @return void
	 */
	public function downloadAction() {
		
		
		$getData	= \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_jsdownload_download');
		
		$detail 	= 0;

		if(isset($getData['file']) && $getData['file']>0){
			$detail = intval($getData['file']);
		}
		
		if ($this->request->hasArgument('docID')){
			$id = $this->request->getArguments();
			$id['docID'] = base64_decode($id['docID']);
			$docID = intval($id['docID']);
			$id['media'] = base64_decode($id['media']);
			$media = intval($id['media']);

			if($docID>0 && $media>0){
				$media = $this->fileRepository->downloadFile($docID,$media,$this->settings['basePath']);
			}
		}
		
		$typeID = 0;
		
		$defaultClass = "active";
		
		if ($this->request->hasArgument('type')){
			$defaultClass = "";
			$arg = $this->request->getArguments(); 			
			$typeID	= $arg['type'];
		}

		$template = $this->downloadService->missingConfiguration($this->settings);

		$fileType = $this->fileRepository->getFileTypes($this->settings,$typeID);
		
		$data = $this->fileRepository->getFiles($this->settings,$detail,$typeID);
		
		$paginate  = 0;
		
		if(isset($this->settings['paginate'])){
			$paginate	= $this->settings['paginate'];
		}
		
		$recordPerPage  = 2;
		
		if(isset($this->settings['recordPerPage'])){
			$recordPerPage	= $this->settings['recordPerPage'];
		}
		
		if(count($data)==0){
			$template = 'no-record';
		}
		
		$this->view->assign('fileType', $fileType);
		$this->view->assign('files', $data);
		$this->view->assign('template', $template);
		$this->view->assign('fileDetail', $detail);
		$this->view->assign('paginate', $paginate);
		$this->view->assign('recordPerPage', $recordPerPage);
		$this->view->assign('defaultClass', $defaultClass);
		
		// Include Additional Data
		$this->downloadService->includeAdditionalData($this->settings);
	}
}