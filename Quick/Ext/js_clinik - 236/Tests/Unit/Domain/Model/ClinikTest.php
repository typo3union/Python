<?php

namespace JS\JsClinik\Tests\Unit\Domain\Model;

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
 * Test case for class \JS\JsClinik\Domain\Model\Clinik.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class ClinikTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \JS\JsClinik\Domain\Model\Clinik
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \JS\JsClinik\Domain\Model\Clinik();
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
	public function getLocationReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getLocation()
		);
	}

	/**
	 * @test
	 */
	public function setLocationForStringSetsLocation() {
		$this->subject->setLocation('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'location',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLogoReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getLogo()
		);
	}

	/**
	 * @test
	 */
	public function setLogoForFileReferenceSetsLogo() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setLogo($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'logo',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription() {
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLinkReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getLink()
		);
	}

	/**
	 * @test
	 */
	public function setLinkForStringSetsLink() {
		$this->subject->setLink('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'link',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getClinikIdReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getClinikId()
		);
	}

	/**
	 * @test
	 */
	public function setClinikIdForStringSetsClinikId() {
		$this->subject->setClinikId('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'clinikId',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getImageReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getImage()
		);
	}

	/**
	 * @test
	 */
	public function setImageForFileReferenceSetsImage() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setImage($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'image',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLatitudeReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getLatitude()
		);
	}

	/**
	 * @test
	 */
	public function setLatitudeForStringSetsLatitude() {
		$this->subject->setLatitude('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'latitude',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLongitudeReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getLongitude()
		);
	}

	/**
	 * @test
	 */
	public function setLongitudeForStringSetsLongitude() {
		$this->subject->setLongitude('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'longitude',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDisplayMapContentReturnsInitialValueForBoolean() {
		$this->assertSame(
			FALSE,
			$this->subject->getDisplayMapContent()
		);
	}

	/**
	 * @test
	 */
	public function setDisplayMapContentForBooleanSetsDisplayMapContent() {
		$this->subject->setDisplayMapContent(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'displayMapContent',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMapContentReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getMapContent()
		);
	}

	/**
	 * @test
	 */
	public function setMapContentForStringSetsMapContent() {
		$this->subject->setMapContent('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'mapContent',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMapIconReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getMapIcon()
		);
	}

	/**
	 * @test
	 */
	public function setMapIconForFileReferenceSetsMapIcon() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setMapIcon($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'mapIcon',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFacilitiesReturnsInitialValueForFacilities() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getFacilities()
		);
	}

	/**
	 * @test
	 */
	public function setFacilitiesForObjectStorageContainingFacilitiesSetsFacilities() {
		$facility = new \JS\JsClinik\Domain\Model\Facilities();
		$objectStorageHoldingExactlyOneFacilities = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneFacilities->attach($facility);
		$this->subject->setFacilities($objectStorageHoldingExactlyOneFacilities);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneFacilities,
			'facilities',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addFacilityToObjectStorageHoldingFacilities() {
		$facility = new \JS\JsClinik\Domain\Model\Facilities();
		$facilitiesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$facilitiesObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($facility));
		$this->inject($this->subject, 'facilities', $facilitiesObjectStorageMock);

		$this->subject->addFacility($facility);
	}

	/**
	 * @test
	 */
	public function removeFacilityFromObjectStorageHoldingFacilities() {
		$facility = new \JS\JsClinik\Domain\Model\Facilities();
		$facilitiesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$facilitiesObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($facility));
		$this->inject($this->subject, 'facilities', $facilitiesObjectStorageMock);

		$this->subject->removeFacility($facility);

	}
}
