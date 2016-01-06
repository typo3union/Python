<?php
namespace TYPO3\NmTouren\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Marco Adomat <m.adomat@netzmagnet.de>, netzmagnet GmbH
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class TYPO3\NmTouren\Controller\TermineController.
 *
 * @author Marco Adomat <m.adomat@netzmagnet.de>
 */
class TermineControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \TYPO3\NmTouren\Controller\TermineController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('TYPO3\\NmTouren\\Controller\\TermineController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllTerminesFromRepositoryAndAssignsThemToView() {

		$allTermines = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$termineRepository = $this->getMock('TYPO3\\NmTouren\\Domain\\Repository\\TermineRepository', array('findAll'), array(), '', FALSE);
		$termineRepository->expects($this->once())->method('findAll')->will($this->returnValue($allTermines));
		$this->inject($this->subject, 'termineRepository', $termineRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('termines', $allTermines);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenTermineToView() {
		$termine = new \TYPO3\NmTouren\Domain\Model\Termine();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('termine', $termine);

		$this->subject->showAction($termine);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenTermineToView() {
		$termine = new \TYPO3\NmTouren\Domain\Model\Termine();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newTermine', $termine);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($termine);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenTermineToTermineRepository() {
		$termine = new \TYPO3\NmTouren\Domain\Model\Termine();

		$termineRepository = $this->getMock('TYPO3\\NmTouren\\Domain\\Repository\\TermineRepository', array('add'), array(), '', FALSE);
		$termineRepository->expects($this->once())->method('add')->with($termine);
		$this->inject($this->subject, 'termineRepository', $termineRepository);

		$this->subject->createAction($termine);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenTermineToView() {
		$termine = new \TYPO3\NmTouren\Domain\Model\Termine();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('termine', $termine);

		$this->subject->editAction($termine);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenTermineInTermineRepository() {
		$termine = new \TYPO3\NmTouren\Domain\Model\Termine();

		$termineRepository = $this->getMock('TYPO3\\NmTouren\\Domain\\Repository\\TermineRepository', array('update'), array(), '', FALSE);
		$termineRepository->expects($this->once())->method('update')->with($termine);
		$this->inject($this->subject, 'termineRepository', $termineRepository);

		$this->subject->updateAction($termine);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenTermineFromTermineRepository() {
		$termine = new \TYPO3\NmTouren\Domain\Model\Termine();

		$termineRepository = $this->getMock('TYPO3\\NmTouren\\Domain\\Repository\\TermineRepository', array('remove'), array(), '', FALSE);
		$termineRepository->expects($this->once())->method('remove')->with($termine);
		$this->inject($this->subject, 'termineRepository', $termineRepository);

		$this->subject->deleteAction($termine);
	}
}
