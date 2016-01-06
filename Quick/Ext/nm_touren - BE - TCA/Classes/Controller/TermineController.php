<?php
namespace TYPO3\NmTouren\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Marco Adomat <m.adomat@netzmagnet.de>, netzmagnet GmbH
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
 * TermineController
 */
class TermineController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * termineRepository
	 *
	 * @var \TYPO3\NmTouren\Domain\Repository\TermineRepository
	 * @inject
	 */
	protected $termineRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$termines = $this->termineRepository->findAll();
		$this->view->assign('termines', $termines);
	}

	/**
	 * action show
	 *
	 * @param \TYPO3\NmTouren\Domain\Model\Termine $termine
	 * @return void
	 */
	public function showAction(\TYPO3\NmTouren\Domain\Model\Termine $termine) {
		$this->view->assign('termine', $termine);
	}

	/**
	 * action new
	 *
	 * @param \TYPO3\NmTouren\Domain\Model\Termine $newTermine
	 * @ignorevalidation $newTermine
	 * @return void
	 */
	public function newAction(\TYPO3\NmTouren\Domain\Model\Termine $newTermine = NULL) {
		$this->view->assign('newTermine', $newTermine);
	}

	/**
	 * action create
	 *
	 * @param \TYPO3\NmTouren\Domain\Model\Termine $newTermine
	 * @return void
	 */
	public function createAction(\TYPO3\NmTouren\Domain\Model\Termine $newTermine) {
		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->termineRepository->add($newTermine);
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param \TYPO3\NmTouren\Domain\Model\Termine $termine
	 * @ignorevalidation $termine
	 * @return void
	 */
	public function editAction(\TYPO3\NmTouren\Domain\Model\Termine $termine) {
		$this->view->assign('termine', $termine);
	}

	/**
	 * action update
	 *
	 * @param \TYPO3\NmTouren\Domain\Model\Termine $termine
	 * @return void
	 */
	public function updateAction(\TYPO3\NmTouren\Domain\Model\Termine $termine) {
		$this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->termineRepository->update($termine);
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \TYPO3\NmTouren\Domain\Model\Termine $termine
	 * @return void
	 */
	public function deleteAction(\TYPO3\NmTouren\Domain\Model\Termine $termine) {
		$this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->termineRepository->remove($termine);
		$this->redirect('list');
	}

}