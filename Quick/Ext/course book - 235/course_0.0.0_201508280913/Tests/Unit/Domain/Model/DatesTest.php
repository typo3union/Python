<?php

namespace Typo3\Course\Tests\Unit\Domain\Model;

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
 * Test case for class \Typo3\Course\Domain\Model\Dates.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Ajay Gohel <shared_user@webofficeindia.com>
 */
class DatesTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Typo3\Course\Domain\Model\Dates
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Typo3\Course\Domain\Model\Dates();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getDurationinfoReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getDurationinfo()
		);
	}

	/**
	 * @test
	 */
	public function setDurationinfoForStringSetsDurationinfo() {
		$this->subject->setDurationinfo('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'durationinfo',
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
	public function getDurationReturnsInitialValueForDurations() {
		$this->assertEquals(
			NULL,
			$this->subject->getDuration()
		);
	}

	/**
	 * @test
	 */
	public function setDurationForDurationsSetsDuration() {
		$durationFixture = new \Typo3\Course\Domain\Model\Durations();
		$this->subject->setDuration($durationFixture);

		$this->assertAttributeEquals(
			$durationFixture,
			'duration',
			$this->subject
		);
	}
}
