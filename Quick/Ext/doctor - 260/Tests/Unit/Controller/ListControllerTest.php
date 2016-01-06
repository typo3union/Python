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
 * Test case for class Arzte\Arzte\Controller\ListController.
 *
 */
class ListControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \Arzte\Arzte\Controller\ListController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('Arzte\\Arzte\\Controller\\ListController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllListsFromRepositoryAndAssignsThemToView() {

		$allLists = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$listRepository = $this->getMock('Arzte\\Arzte\\Domain\\Repository\\ListRepository', array('findAll'), array(), '', FALSE);
		$listRepository->expects($this->once())->method('findAll')->will($this->returnValue($allLists));
		$this->inject($this->subject, 'listRepository', $listRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('lists', $allLists);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenListToView() {
		$list = new \Arzte\Arzte\Domain\Model\List();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('list', $list);

		$this->subject->showAction($list);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenListToView() {
		$list = new \Arzte\Arzte\Domain\Model\List();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newList', $list);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($list);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenListToListRepository() {
		$list = new \Arzte\Arzte\Domain\Model\List();

		$listRepository = $this->getMock('Arzte\\Arzte\\Domain\\Repository\\ListRepository', array('add'), array(), '', FALSE);
		$listRepository->expects($this->once())->method('add')->with($list);
		$this->inject($this->subject, 'listRepository', $listRepository);

		$this->subject->createAction($list);
	}
}
