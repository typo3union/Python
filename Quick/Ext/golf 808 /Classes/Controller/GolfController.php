<?php
namespace Golf\Golf\Controller;


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
 * GolfController
 */
class GolfController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * golfRepository
	 *
	 * @var \Golf\Golf\Domain\Repository\GolfRepository
	 * @inject
	 */
	protected $golfRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		
		$golves = $this->golfRepository->findgolf();
		$bgimg = $this->settings['flexform']['main']['golfimg'];
		$title = $this->settings['flexform']['main']['golftitle'];
		$content = $this->settings['flexform']['main']['golfcontent'];
		$content1 = $this->settings['flexform']['main']['golfcontent1'];
		$titleimg = $this->settings['flexform']['main']['titleimg'];
		
		$this->view->assign('golves', $golves);
		$this->view->assign('bgimgs', $bgimg);
		$this->view->assign('title', $title);
		$this->view->assign('titleimg', $titleimg);
		$this->view->assign('content', $content);
		$this->view->assign('content1', $content1);
	}

	/**
	 * action show
	 *
	 * @param \Golf\Golf\Domain\Model\Golf $golf
	 * @return void
	 */
	public function showAction(\Golf\Golf\Domain\Model\Golf $golf) {
		$GLOBALS["TSFE"]->set_no_cache();
		$uriArr = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_golf_golf');
			if(!empty($uriArr['golf'])){
			$golfid = $uriArr['golf'];
			}else{
			$golfid = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('golf');
			}
					// $arg = $this->request->getArguments();
  //      echo $golfid = $arg['golf'];
        
		$golf = $this->golfRepository->findgolfdetail($golfid);
		//echo '<pre>';
		//print_r($golf); 
		$btnimg = $this->settings['flexform']['main']['btnimg'];
		
		$this->view->assign('btnimg', $btnimg);
		$this->view->assign('golf', $golf);
	}


}