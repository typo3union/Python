<?php
namespace Arzte\Arzte\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014
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
 * CategoryController
 */
class CategoryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * categoryRepository
	 *
	 * @var \Arzte\Arzte\Domain\Repository\CategoryRepository
	 * @inject
	 */
	protected $categoryRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		
		$GLOBALS['TSFE']->set_no_cache();
		
		$this->cObj = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tslib_cObj');
		//print_r($this->settings); exit; 
		if($this->settings['catheader'] !=""){
			$catheader = $this->settings['catheader'];
		}
		 $this->view->assign('catheader', $catheader);
		 if($this->settings['catrte'] !=""){
			$catrte = $this->settings['catrte'];
		}
		 $this->view->assign('catrte', $catrte);
		 
		$catlist = $this->categoryRepository->catlist();
		$this->view->assign('catlist', $catlist);
	}

	/**
	 * action show
	 *
	 * @param \Arzte\Arzte\Domain\Model\Category $category
	 * @return void
	 */
	public function showAction(\Arzte\Arzte\Domain\Model\Category $category) {
		
		$this->view->assign('category', $category);
	}

	/**
	 * action catlist
	 *
	 * @return void
	 */
	public function catlistAction() {
		$GLOBALS['TSFE']->set_no_cache();
		$catl = $this->categoryRepository->catl();
		$this->view->assign('pluginid', $this->settings['pluginid']);
		$this->view->assign('catl', $catl);
	}

}