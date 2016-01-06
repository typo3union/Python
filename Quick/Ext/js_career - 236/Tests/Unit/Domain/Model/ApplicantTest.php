<?php

namespace JS\JsCareer\Tests\Unit\Domain\Model;

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
 * Test case for class \JS\JsCareer\Domain\Model\Applicant.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class ApplicantTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \JS\JsCareer\Domain\Model\Applicant
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \JS\JsCareer\Domain\Model\Applicant();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * @test
	 */
	public function setNameForStringSetsName() {
		$this->subject->setName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'name',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPhoneReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getPhone()
		);
	}

	/**
	 * @test
	 */
	public function setPhoneForStringSetsPhone() {
		$this->subject->setPhone('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'phone',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEmailReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getEmail()
		);
	}

	/**
	 * @test
	 */
	public function setEmailForStringSetsEmail() {
		$this->subject->setEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'email',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getResumeReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getResume()
		);
	}

	/**
	 * @test
	 */
	public function setResumeForFileReferenceSetsResume() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setResume($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'resume',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getContactDateReturnsInitialValueForDateTime() {
		$this->assertEquals(
			NULL,
			$this->subject->getContactDate()
		);
	}

	/**
	 * @test
	 */
	public function setContactDateForDateTimeSetsContactDate() {
		$dateTimeFixture = new \DateTime();
		$this->subject->setContactDate($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'contactDate',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getIpReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getIp()
		);
	}

	/**
	 * @test
	 */
	public function setIpForStringSetsIp() {
		$this->subject->setIp('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'ip',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUseragentReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getUseragent()
		);
	}

	/**
	 * @test
	 */
	public function setUseragentForStringSetsUseragent() {
		$this->subject->setUseragent('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'useragent',
			$this->subject
		);
	}
}
