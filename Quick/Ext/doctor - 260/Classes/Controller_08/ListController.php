<?php
namespace Arzte\Arzte\Controller;
echo "dffdsf"; exit;
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
 * ListController
 */
class ListController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * listRepository
	 *
	 * @var \Arzte\Arzte\Domain\Repository\ListRepository
	 * @inject
	 */
	protected $listRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		echo "dffdsf"; exit;
		//$lists = $this->listRepository->findAll();
		//$this->view->assign('lists', $lists);
	}

	/**
	 * action show
	 *
	 * @param \Arzte\Arzte\Domain\Model\List $list
	 * @return void
	 */
	public function showAction(\Arzte\Arzte\Domain\Model\List $list) {
		$this->view->assign('list', $list);
	}

	/**
	 * action new
	 *
	 * @param \Arzte\Arzte\Domain\Model\List $newList
	 * @ignorevalidation $newList
	 * @return void
	 */
	public function newAction(\Arzte\Arzte\Domain\Model\List $newList = NULL) {
		$this->view->assign('newList', $newList);
	}

	/**
	 * action create
	 *
	 * @param \Arzte\Arzte\Domain\Model\List $newList
	 * @return void
	 */
	public function createAction(\Arzte\Arzte\Domain\Model\List $newList) {
		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->listRepository->add($newList);
		$this->redirect('list');
	}

}