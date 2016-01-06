<?php

namespace TYPO3\NmTouren\Tests\Unit\Domain\Model;

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
 * Test case for class \TYPO3\NmTouren\Domain\Model\Termine.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Marco Adomat <m.adomat@netzmagnet.de>
 */
class TermineTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \TYPO3\NmTouren\Domain\Model\Termine
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \TYPO3\NmTouren\Domain\Model\Termine();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getDatumReturnsInitialValueForDateTime() {
		$this->assertEquals(
			NULL,
			$this->subject->getDatum()
		);
	}

	/**
	 * @test
	 */
	public function setDatumForDateTimeSetsDatum() {
		$dateTimeFixture = new \DateTime();
		$this->subject->setDatum($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'datum',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getGeblocktReturnsInitialValueForBoolean() {
		$this->assertSame(
			FALSE,
			$this->subject->getGeblockt()
		);
	}

	/**
	 * @test
	 */
	public function setGeblocktForBooleanSetsGeblockt() {
		$this->subject->setGeblockt(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'geblockt',
			$this->subject
		);
	}
}
