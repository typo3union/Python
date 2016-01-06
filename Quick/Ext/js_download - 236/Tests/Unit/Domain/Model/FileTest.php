<?php

namespace JS\JsDownload\Tests\Unit\Domain\Model;

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
 * Test case for class \JS\JsDownload\Domain\Model\File.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class FileTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \JS\JsDownload\Domain\Model\File
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \JS\JsDownload\Domain\Model\File();
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
	public function getMediaReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getMedia()
		);
	}

	/**
	 * @test
	 */
	public function setMediaForFileReferenceSetsMedia() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setMedia($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'media',
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
	public function getVideoReturnsInitialValueForBoolean() {
		$this->assertSame(
			FALSE,
			$this->subject->getVideo()
		);
	}

	/**
	 * @test
	 */
	public function setVideoForBooleanSetsVideo() {
		$this->subject->setVideo(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'video',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getVideoMp4ReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getVideoMp4()
		);
	}

	/**
	 * @test
	 */
	public function setVideoMp4ForFileReferenceSetsVideoMp4() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setVideoMp4($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'videoMp4',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getVideoWebmReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getVideoWebm()
		);
	}

	/**
	 * @test
	 */
	public function setVideoWebmForFileReferenceSetsVideoWebm() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setVideoWebm($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'videoWebm',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getVideoOggReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getVideoOgg()
		);
	}

	/**
	 * @test
	 */
	public function setVideoOggForFileReferenceSetsVideoOgg() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setVideoOgg($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'videoOgg',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getNoOfDownloadReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getNoOfDownload()
		);
	}

	/**
	 * @test
	 */
	public function setNoOfDownloadForIntegerSetsNoOfDownload() {
		$this->subject->setNoOfDownload(12);

		$this->assertAttributeEquals(
			12,
			'noOfDownload',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCategoryReturnsInitialValueForCategory() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getCategory()
		);
	}

	/**
	 * @test
	 */
	public function setCategoryForObjectStorageContainingCategorySetsCategory() {
		$category = new \JS\JsDownload\Domain\Model\Category();
		$objectStorageHoldingExactlyOneCategory = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneCategory->attach($category);
		$this->subject->setCategory($objectStorageHoldingExactlyOneCategory);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneCategory,
			'category',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addCategoryToObjectStorageHoldingCategory() {
		$category = new \JS\JsDownload\Domain\Model\Category();
		$categoryObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$categoryObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($category));
		$this->inject($this->subject, 'category', $categoryObjectStorageMock);

		$this->subject->addCategory($category);
	}

	/**
	 * @test
	 */
	public function removeCategoryFromObjectStorageHoldingCategory() {
		$category = new \JS\JsDownload\Domain\Model\Category();
		$categoryObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$categoryObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($category));
		$this->inject($this->subject, 'category', $categoryObjectStorageMock);

		$this->subject->removeCategory($category);

	}

	/**
	 * @test
	 */
	public function getFileTypeReturnsInitialValueForFiletype() {
		$this->assertEquals(
			NULL,
			$this->subject->getFileType()
		);
	}

	/**
	 * @test
	 */
	public function setFileTypeForFiletypeSetsFileType() {
		$fileTypeFixture = new \JS\JsDownload\Domain\Model\Filetype();
		$this->subject->setFileType($fileTypeFixture);

		$this->assertAttributeEquals(
			$fileTypeFixture,
			'fileType',
			$this->subject
		);
	}
}
