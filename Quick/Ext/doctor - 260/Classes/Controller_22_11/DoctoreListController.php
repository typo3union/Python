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
 * DoctoreListController
 */
class DoctoreListController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * doctoreListRepository
	 *
	 * @var \Arzte\Arzte\Domain\Repository\DoctoreListRepository
	 * @inject
	 */
	protected $doctoreListRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$doctoreLists = $this->doctoreListRepository->findAll();
		$this->view->assign('doctoreLists', $doctoreLists);
	}

	/**
	 * action show
	 *
	 * @param \Arzte\Arzte\Domain\Model\DoctoreList $doctoreList
	 * @return void
	 */
	public function showAction(\Arzte\Arzte\Domain\Model\DoctoreList $doctoreList) {
		$this->view->assign('doctoreList', $doctoreList);
	}

	/**
	 * action new
	 *
	 * @param \Arzte\Arzte\Domain\Model\DoctoreList $newDoctoreList
	 * @ignorevalidation $newDoctoreList
	 * @return void
	 */
	public function newAction(\Arzte\Arzte\Domain\Model\DoctoreList $newDoctoreList = NULL) {
		$this->view->assign('newDoctoreList', $newDoctoreList);
	}

	/**
	 * action create
	 *
	 * @param \Arzte\Arzte\Domain\Model\DoctoreList $newDoctoreList
	 * @return void
	 */
	public function createAction(\Arzte\Arzte\Domain\Model\DoctoreList $newDoctoreList) {
		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->doctoreListRepository->add($newDoctoreList);
		$this->redirect('list');
	}

}