<?php
namespace Typo3\Course\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Ajay Gohel <shared_user@webofficeindia.com>, WOI
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
 * Test case for class Typo3\Course\Controller\CourseController.
 *
 * @author Ajay Gohel <shared_user@webofficeindia.com>
 */
class CourseControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \Typo3\Course\Controller\CourseController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('Typo3\\Course\\Controller\\CourseController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllCoursesFromRepositoryAndAssignsThemToView() {

		$allCourses = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$courseRepository = $this->getMock('Typo3\\Course\\Domain\\Repository\\CourseRepository', array('findAll'), array(), '', FALSE);
		$courseRepository->expects($this->once())->method('findAll')->will($this->returnValue($allCourses));
		$this->inject($this->subject, 'courseRepository', $courseRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('courses', $allCourses);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenCourseToView() {
		$course = new \Typo3\Course\Domain\Model\Course();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('course', $course);

		$this->subject->showAction($course);
	}
}
