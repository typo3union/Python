<?php
namespace Typo3\Karriere\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Ajay Gohel <shared_user@webofficeindia.com>, Weboffice India
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
 * KarriereController
 */
class KarriereController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * karriereRepository
	 *
	 * @var \Typo3\Karriere\Domain\Repository\KarriereRepository
	 * @inject
	 */
	protected $karriereRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$category = $this->settings['category'];
			$karrieres = $this->karriereRepository->findAll();
			$this->view->assign('karrieres', $karrieres);
			
			$karriereCat = $this->karriereRepository->categoryName($category);
			$this->view->assign('karriere_cat', $karriereCat);
		}
	
		

	/**
	 * action show
	 *
	 * @param \Typo3\Karriere\Domain\Model\Karriere $karriere
	 * @return void
	 */
	public function showAction(\Typo3\Karriere\Domain\Model\Karriere $karriere) {
		$catTitle = $_GET['tx_karriere_karriere']['karriere'];
		$this->view->assign('karriere', $karriere);
		//print_r($karriere->title);
		//$page_title = 'Wasserspender von aQto Watersystems - ';
		//$this->response->addAdditionalHeaderData('<title>'.$page_title.'</title>');
		$karriereCat = $this->karriereRepository->catName($catTitle);
		$this->view->assign('karriere_cat', $karriereCat);
	}

}