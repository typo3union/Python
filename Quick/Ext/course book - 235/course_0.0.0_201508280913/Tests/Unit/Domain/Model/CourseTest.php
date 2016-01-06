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
 * Test case for class \Typo3\Course\Domain\Model\Course.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Ajay Gohel <shared_user@webofficeindia.com>
 */
class CourseTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Typo3\Course\Domain\Model\Course
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Typo3\Course\Domain\Model\Course();
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
	public function getOrganiserReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getOrganiser()
		);
	}

	/**
	 * @test
	 */
	public function setOrganiserForStringSetsOrganiser() {
		$this->subject->setOrganiser('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'organiser',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getShorttextReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getShorttext()
		);
	}

	/**
	 * @test
	 */
	public function setShorttextForStringSetsShorttext() {
		$this->subject->setShorttext('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'shorttext',
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
	public function getDiscountsReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getDiscounts()
		);
	}

	/**
	 * @test
	 */
	public function setDiscountsForStringSetsDiscounts() {
		$this->subject->setDiscounts('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'discounts',
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
	public function getLastminpriceReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getLastminprice()
		);
	}

	/**
	 * @test
	 */
	public function setLastminpriceForStringSetsLastminprice() {
		$this->subject->setLastminprice('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'lastminprice',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getActlastminReturnsInitialValueForBoolean() {
		$this->assertSame(
			FALSE,
			$this->subject->getActlastmin()
		);
	}

	/**
	 * @test
	 */
	public function setActlastminForBooleanSetsActlastmin() {
		$this->subject->setActlastmin(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'actlastmin',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLinksReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getLinks()
		);
	}

	/**
	 * @test
	 */
	public function setLinksForStringSetsLinks() {
		$this->subject->setLinks('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'links',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getImagesReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getImages()
		);
	}

	/**
	 * @test
	 */
	public function setImagesForFileReferenceSetsImages() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setImages($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'images',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getBannerimagesReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getBannerimages()
		);
	}

	/**
	 * @test
	 */
	public function setBannerimagesForFileReferenceSetsBannerimages() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setBannerimages($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'bannerimages',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDownloadsReturnsInitialValueForDownloads() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getDownloads()
		);
	}

	/**
	 * @test
	 */
	public function setDownloadsForObjectStorageContainingDownloadsSetsDownloads() {
		$download = new \Typo3\Course\Domain\Model\Downloads();
		$objectStorageHoldingExactlyOneDownloads = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneDownloads->attach($download);
		$this->subject->setDownloads($objectStorageHoldingExactlyOneDownloads);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneDownloads,
			'downloads',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addDownloadToObjectStorageHoldingDownloads() {
		$download = new \Typo3\Course\Domain\Model\Downloads();
		$downloadsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$downloadsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($download));
		$this->inject($this->subject, 'downloads', $downloadsObjectStorageMock);

		$this->subject->addDownload($download);
	}

	/**
	 * @test
	 */
	public function removeDownloadFromObjectStorageHoldingDownloads() {
		$download = new \Typo3\Course\Domain\Model\Downloads();
		$downloadsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$downloadsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($download));
		$this->inject($this->subject, 'downloads', $downloadsObjectStorageMock);

		$this->subject->removeDownload($download);

	}

	/**
	 * @test
	 */
	public function getLocationReturnsInitialValueForLocations() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getLocation()
		);
	}

	/**
	 * @test
	 */
	public function setLocationForObjectStorageContainingLocationsSetsLocation() {
		$location = new \Typo3\Course\Domain\Model\Locations();
		$objectStorageHoldingExactlyOneLocation = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneLocation->attach($location);
		$this->subject->setLocation($objectStorageHoldingExactlyOneLocation);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneLocation,
			'location',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addLocationToObjectStorageHoldingLocation() {
		$location = new \Typo3\Course\Domain\Model\Locations();
		$locationObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$locationObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($location));
		$this->inject($this->subject, 'location', $locationObjectStorageMock);

		$this->subject->addLocation($location);
	}

	/**
	 * @test
	 */
	public function removeLocationFromObjectStorageHoldingLocation() {
		$location = new \Typo3\Course\Domain\Model\Locations();
		$locationObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$locationObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($location));
		$this->inject($this->subject, 'location', $locationObjectStorageMock);

		$this->subject->removeLocation($location);

	}

	/**
	 * @test
	 */
	public function getCatReturnsInitialValueForCategory() {
		$this->assertEquals(
			NULL,
			$this->subject->getCat()
		);
	}

	/**
	 * @test
	 */
	public function setCatForCategorySetsCat() {
		$catFixture = new \Typo3\Course\Domain\Model\Category();
		$this->subject->setCat($catFixture);

		$this->assertAttributeEquals(
			$catFixture,
			'cat',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDatedurationReturnsInitialValueForDatestartend() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getDateduration()
		);
	}

	/**
	 * @test
	 */
	public function setDatedurationForObjectStorageContainingDatestartendSetsDateduration() {
		$dateduration = new \Typo3\Course\Domain\Model\Datestartend();
		$objectStorageHoldingExactlyOneDateduration = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneDateduration->attach($dateduration);
		$this->subject->setDateduration($objectStorageHoldingExactlyOneDateduration);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneDateduration,
			'dateduration',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addDatedurationToObjectStorageHoldingDateduration() {
		$dateduration = new \Typo3\Course\Domain\Model\Datestartend();
		$datedurationObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$datedurationObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($dateduration));
		$this->inject($this->subject, 'dateduration', $datedurationObjectStorageMock);

		$this->subject->addDateduration($dateduration);
	}

	/**
	 * @test
	 */
	public function removeDatedurationFromObjectStorageHoldingDateduration() {
		$dateduration = new \Typo3\Course\Domain\Model\Datestartend();
		$datedurationObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$datedurationObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($dateduration));
		$this->inject($this->subject, 'dateduration', $datedurationObjectStorageMock);

		$this->subject->removeDateduration($dateduration);

	}

	/**
	 * @test
	 */
	public function getRealtedcourseReturnsInitialValueForCourse() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getRealtedcourse()
		);
	}

	/**
	 * @test
	 */
	public function setRealtedcourseForObjectStorageContainingCourseSetsRealtedcourse() {
		$realtedcourse = new \Typo3\Course\Domain\Model\Course();
		$objectStorageHoldingExactlyOneRealtedcourse = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneRealtedcourse->attach($realtedcourse);
		$this->subject->setRealtedcourse($objectStorageHoldingExactlyOneRealtedcourse);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneRealtedcourse,
			'realtedcourse',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addRealtedcourseToObjectStorageHoldingRealtedcourse() {
		$realtedcourse = new \Typo3\Course\Domain\Model\Course();
		$realtedcourseObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$realtedcourseObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($realtedcourse));
		$this->inject($this->subject, 'realtedcourse', $realtedcourseObjectStorageMock);

		$this->subject->addRealtedcourse($realtedcourse);
	}

	/**
	 * @test
	 */
	public function removeRealtedcourseFromObjectStorageHoldingRealtedcourse() {
		$realtedcourse = new \Typo3\Course\Domain\Model\Course();
		$realtedcourseObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$realtedcourseObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($realtedcourse));
		$this->inject($this->subject, 'realtedcourse', $realtedcourseObjectStorageMock);

		$this->subject->removeRealtedcourse($realtedcourse);

	}
}
