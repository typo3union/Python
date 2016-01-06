<?php
namespace TYPO3\Events\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 pooja <pooja.patel@webofficeindia.com>, Weboffice
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
 * Test case for class TYPO3\Events\Controller\EventController.
 *
 * @author pooja <pooja.patel@webofficeindia.com>
 */
class EventControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \TYPO3\Events\Controller\EventController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('TYPO3\\Events\\Controller\\EventController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllEventsFromRepositoryAndAssignsThemToView() {

		$allEvents = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$eventRepository = $this->getMock('TYPO3\\Events\\Domain\\Repository\\EventRepository', array('findAll'), array(), '', FALSE);
		$eventRepository->expects($this->once())->method('findAll')->will($this->returnValue($allEvents));
		$this->inject($this->subject, 'eventRepository', $eventRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('events', $allEvents);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenEventToView() {
		$event = new \TYPO3\Events\Domain\Model\Event();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('event', $event);

		$this->subject->showAction($event);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenEventToView() {
		$event = new \TYPO3\Events\Domain\Model\Event();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newEvent', $event);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($event);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenEventToEventRepository() {
		$event = new \TYPO3\Events\Domain\Model\Event();

		$eventRepository = $this->getMock('TYPO3\\Events\\Domain\\Repository\\EventRepository', array('add'), array(), '', FALSE);
		$eventRepository->expects($this->once())->method('add')->with($event);
		$this->inject($this->subject, 'eventRepository', $eventRepository);

		$this->subject->createAction($event);
	}
}
