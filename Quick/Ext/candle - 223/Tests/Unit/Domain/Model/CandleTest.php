<?php

namespace TYPO3\Candle\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 
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
 * Test case for class \TYPO3\Candle\Domain\Model\Candle.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class CandleTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \TYPO3\Candle\Domain\Model\Candle
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \TYPO3\Candle\Domain\Model\Candle();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getUserNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getUserName()
		);
	}

	/**
	 * @test
	 */
	public function setUserNameForStringSetsUserName() {
		$this->subject->setUserName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'userName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getActiveReturnsInitialValueForBoolean() {
		$this->assertSame(
			FALSE,
			$this->subject->getActive()
		);
	}

	/**
	 * @test
	 */
	public function setActiveForBooleanSetsActive() {
		$this->subject->setActive(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'active',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTypeReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getType()
		);
	}

	/**
	 * @test
	 */
	public function setTypeForIntegerSetsType() {
		$this->subject->setType(12);

		$this->assertAttributeEquals(
			12,
			'type',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUserAddressReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getUserAddress()
		);
	}

	/**
	 * @test
	 */
	public function setUserAddressForStringSetsUserAddress() {
		$this->subject->setUserAddress('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'userAddress',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDedicatedNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getDedicatedName()
		);
	}

	/**
	 * @test
	 */
	public function setDedicatedNameForStringSetsDedicatedName() {
		$this->subject->setDedicatedName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'dedicatedName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMessageReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getMessage()
		);
	}

	/**
	 * @test
	 */
	public function setMessageForStringSetsMessage() {
		$this->subject->setMessage('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'message',
			$this->subject
		);
	}
}
