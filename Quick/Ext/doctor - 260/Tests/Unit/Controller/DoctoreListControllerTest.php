<?php
namespace Arzte\Arzte\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 
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
 * Test case for class Arzte\Arzte\Controller\DoctoreListController.
 *
 */
class DoctoreListControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \Arzte\Arzte\Controller\DoctoreListController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('Arzte\\Arzte\\Controller\\DoctoreListController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllDoctoreListsFromRepositoryAndAssignsThemToView() {

		$allDoctoreLists = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$doctoreListRepository = $this->getMock('Arzte\\Arzte\\Domain\\Repository\\DoctoreListRepository', array('findAll'), array(), '', FALSE);
		$doctoreListRepository->expects($this->once())->method('findAll')->will($this->returnValue($allDoctoreLists));
		$this->inject($this->subject, 'doctoreListRepository', $doctoreListRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('doctoreLists', $allDoctoreLists);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenDoctoreListToView() {
		$doctoreList = new \Arzte\Arzte\Domain\Model\DoctoreList();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('doctoreList', $doctoreList);

		$this->subject->showAction($doctoreList);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenDoctoreListToView() {
		$doctoreList = new \Arzte\Arzte\Domain\Model\DoctoreList();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newDoctoreList', $doctoreList);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($doctoreList);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenDoctoreListToDoctoreListRepository() {
		$doctoreList = new \Arzte\Arzte\Domain\Model\DoctoreList();

		$doctoreListRepository = $this->getMock('Arzte\\Arzte\\Domain\\Repository\\DoctoreListRepository', array('add'), array(), '', FALSE);
		$doctoreListRepository->expects($this->once())->method('add')->with($doctoreList);
		$this->inject($this->subject, 'doctoreListRepository', $doctoreListRepository);

		$this->subject->createAction($doctoreList);
	}
}
