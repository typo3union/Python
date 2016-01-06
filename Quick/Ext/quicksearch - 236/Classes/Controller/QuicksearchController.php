<?php
namespace PJ\Quicksearch\Controller;


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
 * QuicksearchController
 */
class QuicksearchController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * quicksearchRepository
	 *
	 * @var \PJ\Quicksearch\Domain\Repository\QuicksearchRepository
	 * @inject
	 */
	protected $quicksearchRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {

		$this->settings['fullURL']	= \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_SITE_URL');		
		$this->settings['cObject']	= \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tslib_cObj');


		$pageList = $this->quicksearchRepository->getPageList('all');
		$pageList_0 = $this->quicksearchRepository->getPageList('0');
		$pageList_1 = $this->quicksearchRepository->getPageList('1');
		
		$array[0] = '---Auswählen---';
		foreach($pageList as $key=>$value){
			$array[$value['uid']] = $value['title'];
		}

		$array_0[0] = '---Auswählen---';	
		foreach($pageList_0 as $key=>$value){
			$array_0[$value['uid']] = $value['title'];
		}

		$array_1[0] = '---Auswählen---';	
		foreach($pageList_1 as $key=>$value){
			$array_1[$value['uid']] = $value['title'];
		}

		if ($this->request->hasArgument('quickSearchSubmit')){
			$arg = $this->request->getArguments();

			$this->redirectURL($this->settings['cObject'],$arg['page_select'],$this->settings['fullURL'],'');	
		}

		$this->view->assign('pageList', $array);
		$this->view->assign('pageList_0', $array_0);
		$this->view->assign('pageList_1', $array_1);

	}
	public function redirectURL($cObject, $pid, $fullURL, $additionalParams = "") {
			
		$configurations['additionalParams'] = $additionalParams;
		$configurations['returnLast'] = 'url'; // get it as URL
		$configurations['parameter'] = $pid;
		$url  = $fullURL.$cObject->typolink(NULL, $configurations);

		header("Location:".$url);
		die;
	}

}