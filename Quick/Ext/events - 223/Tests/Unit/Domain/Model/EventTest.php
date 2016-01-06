<?php

namespace TYPO3\Events\Tests\Unit\Domain\Model;

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
 * Test case for class \TYPO3\Events\Domain\Model\Event.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author pooja <pooja.patel@webofficeindia.com>
 */
class EventTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \TYPO3\Events\Domain\Model\Event
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \TYPO3\Events\Domain\Model\Event();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() {
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDateReturnsInitialValueForDateTime() {
		$this->assertEquals(
			NULL,
			$this->subject->getDate()
		);
	}

	/**
	 * @test
	 */
	public function setDateForDateTimeSetsDate() {
		$dateTimeFixture = new \DateTime();
		$this->subject->setDate($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'date',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTimeReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTime()
		);
	}

	/**
	 * @test
	 */
	public function setTimeForStringSetsTime() {
		$this->subject->setTime('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'time',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPrivateReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getPrivate()
		);
	}

	/**
	 * @test
	 */
	public function setPrivateForIntegerSetsPrivate() {
		$this->subject->setPrivate(12);

		$this->assertAttributeEquals(
			12,
			'private',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCategoryReturnsInitialValueForCategory() {
		$this->assertEquals(
			NULL,
			$this->subject->getCategory()
		);
	}

	/**
	 * @test
	 */
	public function setCategoryForCategorySetsCategory() {
		$categoryFixture = new \TYPO3\Events\Domain\Model\Category();
		$this->subject->setCategory($categoryFixture);

		$this->assertAttributeEquals(
			$categoryFixture,
			'category',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLocationReturnsInitialValueForLocation() {
		$this->assertEquals(
			NULL,
			$this->subject->getLocation()
		);
	}

	/**
	 * @test
	 */
	public function setLocationForLocationSetsLocation() {
		$locationFixture = new \TYPO3\Events\Domain\Model\Location();
		$this->subject->setLocation($locationFixture);

		$this->assertAttributeEquals(
			$locationFixture,
			'location',
			$this->subject
		);
	}
}
