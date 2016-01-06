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
 * Test case for class TYPO3\NmTouren\Controller\TourController.
 *
 * @author Marco Adomat <m.adomat@netzmagnet.de>
 */
class TourControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \TYPO3\NmTouren\Controller\TourController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('TYPO3\\NmTouren\\Controller\\TourController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllToursFromRepositoryAndAssignsThemToView() {

		$allTours = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$tourRepository = $this->getMock('TYPO3\\NmTouren\\Domain\\Repository\\TourRepository', array('findAll'), array(), '', FALSE);
		$tourRepository->expects($this->once())->method('findAll')->will($this->returnValue($allTours));
		$this->inject($this->subject, 'tourRepository', $tourRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('tours', $allTours);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenTourToView() {
		$tour = new \TYPO3\NmTouren\Domain\Model\Tour();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('tour', $tour);

		$this->subject->showAction($tour);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenTourToView() {
		$tour = new \TYPO3\NmTouren\Domain\Model\Tour();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newTour', $tour);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($tour);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenTourToTourRepository() {
		$tour = new \TYPO3\NmTouren\Domain\Model\Tour();

		$tourRepository = $this->getMock('TYPO3\\NmTouren\\Domain\\Repository\\TourRepository', array('add'), array(), '', FALSE);
		$tourRepository->expects($this->once())->method('add')->with($tour);
		$this->inject($this->subject, 'tourRepository', $tourRepository);

		$this->subject->createAction($tour);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenTourToView() {
		$tour = new \TYPO3\NmTouren\Domain\Model\Tour();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('tour', $tour);

		$this->subject->editAction($tour);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenTourInTourRepository() {
		$tour = new \TYPO3\NmTouren\Domain\Model\Tour();

		$tourRepository = $this->getMock('TYPO3\\NmTouren\\Domain\\Repository\\TourRepository', array('update'), array(), '', FALSE);
		$tourRepository->expects($this->once())->method('update')->with($tour);
		$this->inject($this->subject, 'tourRepository', $tourRepository);

		$this->subject->updateAction($tour);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenTourFromTourRepository() {
		$tour = new \TYPO3\NmTouren\Domain\Model\Tour();

		$tourRepository = $this->getMock('TYPO3\\NmTouren\\Domain\\Repository\\TourRepository', array('remove'), array(), '', FALSE);
		$tourRepository->expects($this->once())->method('remove')->with($tour);
		$this->inject($this->subject, 'tourRepository', $tourRepository);

		$this->subject->deleteAction($tour);
	}
}
