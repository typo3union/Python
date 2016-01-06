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
 * Test case for class \JS\JsCareer\Domain\Model\Job.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class JobTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \JS\JsCareer\Domain\Model\Job
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \JS\JsCareer\Domain\Model\Job();
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
	public function getPlaceReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getPlace()
		);
	}

	/**
	 * @test
	 */
	public function setPlaceForStringSetsPlace() {
		$this->subject->setPlace('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'place',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getJoinCheckReturnsInitialValueForBoolean() {
		$this->assertSame(
			FALSE,
			$this->subject->getJoinCheck()
		);
	}

	/**
	 * @test
	 */
	public function setJoinCheckForBooleanSetsJoinCheck() {
		$this->subject->setJoinCheck(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'joinCheck',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getJoinDateReturnsInitialValueForDateTime() {
		$this->assertEquals(
			NULL,
			$this->subject->getJoinDate()
		);
	}

	/**
	 * @test
	 */
	public function setJoinDateForDateTimeSetsJoinDate() {
		$dateTimeFixture = new \DateTime();
		$this->subject->setJoinDate($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'joinDate',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTextCheckReturnsInitialValueForBoolean() {
		$this->assertSame(
			FALSE,
			$this->subject->getTextCheck()
		);
	}

	/**
	 * @test
	 */
	public function setTextCheckForBooleanSetsTextCheck() {
		$this->subject->setTextCheck(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'textCheck',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTextReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getText()
		);
	}

	/**
	 * @test
	 */
	public function setTextForStringSetsText() {
		$this->subject->setText('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'text',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAbSofortReturnsInitialValueForBoolean() {
		$this->assertSame(
			FALSE,
			$this->subject->getAbSofort()
		);
	}

	/**
	 * @test
	 */
	public function setAbSofortForBooleanSetsAbSofort() {
		$this->subject->setAbSofort(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'abSofort',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTimingReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getTiming()
		);
	}

	/**
	 * @test
	 */
	public function setTimingForIntegerSetsTiming() {
		$this->subject->setTiming(12);

		$this->assertAttributeEquals(
			12,
			'timing',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getContractReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getContract()
		);
	}

	/**
	 * @test
	 */
	public function setContractForStringSetsContract() {
		$this->subject->setContract('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'contract',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getShortDescriptionReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getShortDescription()
		);
	}

	/**
	 * @test
	 */
	public function setShortDescriptionForStringSetsShortDescription() {
		$this->subject->setShortDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'shortDescription',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionHeaderReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getDescriptionHeader()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionHeaderForStringSetsDescriptionHeader() {
		$this->subject->setDescriptionHeader('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'descriptionHeader',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionPart1ReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getDescriptionPart1()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionPart1ForStringSetsDescriptionPart1() {
		$this->subject->setDescriptionPart1('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'descriptionPart1',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionPart2ReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getDescriptionPart2()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionPart2ForStringSetsDescriptionPart2() {
		$this->subject->setDescriptionPart2('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'descriptionPart2',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPdfReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getPdf()
		);
	}

	/**
	 * @test
	 */
	public function setPdfForFileReferenceSetsPdf() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setPdf($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'pdf',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCaetgoryReturnsInitialValueForClinik() {
		$this->assertEquals(
			NULL,
			$this->subject->getCaetgory()
		);
	}

	/**
	 * @test
	 */
	public function setCaetgoryForClinikSetsCaetgory() {
		$caetgoryFixture = new \JS\JsCareer\Domain\Model\Clinik();
		$this->subject->setCaetgory($caetgoryFixture);

		$this->assertAttributeEquals(
			$caetgoryFixture,
			'caetgory',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getContactPersonReturnsInitialValueForManager() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getContactPerson()
		);
	}

	/**
	 * @test
	 */
	public function setContactPersonForObjectStorageContainingManagerSetsContactPerson() {
		$contactPerson = new \JS\JsCareer\Domain\Model\Manager();
		$objectStorageHoldingExactlyOneContactPerson = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneContactPerson->attach($contactPerson);
		$this->subject->setContactPerson($objectStorageHoldingExactlyOneContactPerson);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneContactPerson,
			'contactPerson',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addContactPersonToObjectStorageHoldingContactPerson() {
		$contactPerson = new \JS\JsCareer\Domain\Model\Manager();
		$contactPersonObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$contactPersonObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($contactPerson));
		$this->inject($this->subject, 'contactPerson', $contactPersonObjectStorageMock);

		$this->subject->addContactPerson($contactPerson);
	}

	/**
	 * @test
	 */
	public function removeContactPersonFromObjectStorageHoldingContactPerson() {
		$contactPerson = new \JS\JsCareer\Domain\Model\Manager();
		$contactPersonObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$contactPersonObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($contactPerson));
		$this->inject($this->subject, 'contactPerson', $contactPersonObjectStorageMock);

		$this->subject->removeContactPerson($contactPerson);

	}

	/**
	 * @test
	 */
	public function getApplicantReturnsInitialValueForApplicant() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getApplicant()
		);
	}

	/**
	 * @test
	 */
	public function setApplicantForObjectStorageContainingApplicantSetsApplicant() {
		$applicant = new \JS\JsCareer\Domain\Model\Applicant();
		$objectStorageHoldingExactlyOneApplicant = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneApplicant->attach($applicant);
		$this->subject->setApplicant($objectStorageHoldingExactlyOneApplicant);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneApplicant,
			'applicant',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addApplicantToObjectStorageHoldingApplicant() {
		$applicant = new \JS\JsCareer\Domain\Model\Applicant();
		$applicantObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$applicantObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($applicant));
		$this->inject($this->subject, 'applicant', $applicantObjectStorageMock);

		$this->subject->addApplicant($applicant);
	}

	/**
	 * @test
	 */
	public function removeApplicantFromObjectStorageHoldingApplicant() {
		$applicant = new \JS\JsCareer\Domain\Model\Applicant();
		$applicantObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$applicantObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($applicant));
		$this->inject($this->subject, 'applicant', $applicantObjectStorageMock);

		$this->subject->removeApplicant($applicant);

	}
}
