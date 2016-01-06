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
 * Test case for class \Typo3\Course\Domain\Model\Datestartend.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Ajay Gohel <shared_user@webofficeindia.com>
 */
class DatestartendTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Typo3\Course\Domain\Model\Datestartend
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Typo3\Course\Domain\Model\Datestartend();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitleinfoReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTitleinfo()
		);
	}

	/**
	 * @test
	 */
	public function setTitleinfoForStringSetsTitleinfo() {
		$this->subject->setTitleinfo('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'titleinfo',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getStartdateReturnsInitialValueForDateTime() {
		$this->assertEquals(
			NULL,
			$this->subject->getStartdate()
		);
	}

	/**
	 * @test
	 */
	public function setStartdateForDateTimeSetsStartdate() {
		$dateTimeFixture = new \DateTime();
		$this->subject->setStartdate($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'startdate',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEnddateReturnsInitialValueForDateTime() {
		$this->assertEquals(
			NULL,
			$this->subject->getEnddate()
		);
	}

	/**
	 * @test
	 */
	public function setEnddateForDateTimeSetsEnddate() {
		$dateTimeFixture = new \DateTime();
		$this->subject->setEnddate($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'enddate',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPriceReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getPrice()
		);
	}

	/**
	 * @test
	 */
	public function setPriceForStringSetsPrice() {
		$this->subject->setPrice('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'price',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLastmintutepriceReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getLastmintuteprice()
		);
	}

	/**
	 * @test
	 */
	public function setLastmintutepriceForStringSetsLastmintuteprice() {
		$this->subject->setLastmintuteprice('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'lastmintuteprice',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDurationtimingReturnsInitialValueForDates() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getDurationtiming()
		);
	}

	/**
	 * @test
	 */
	public function setDurationtimingForObjectStorageContainingDatesSetsDurationtiming() {
		$durationtiming = new \Typo3\Course\Domain\Model\Dates();
		$objectStorageHoldingExactlyOneDurationtiming = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneDurationtiming->attach($durationtiming);
		$this->subject->setDurationtiming($objectStorageHoldingExactlyOneDurationtiming);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneDurationtiming,
			'durationtiming',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addDurationtimingToObjectStorageHoldingDurationtiming() {
		$durationtiming = new \Typo3\Course\Domain\Model\Dates();
		$durationtimingObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$durationtimingObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($durationtiming));
		$this->inject($this->subject, 'durationtiming', $durationtimingObjectStorageMock);

		$this->subject->addDurationtiming($durationtiming);
	}

	/**
	 * @test
	 */
	public function removeDurationtimingFromObjectStorageHoldingDurationtiming() {
		$durationtiming = new \Typo3\Course\Domain\Model\Dates();
		$durationtimingObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$durationtimingObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($durationtiming));
		$this->inject($this->subject, 'durationtiming', $durationtimingObjectStorageMock);

		$this->subject->removeDurationtiming($durationtiming);

	}
}
