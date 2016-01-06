<?php

namespace Typo3\Karriere\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Ajay Gohel <shared_user@webofficeindia.com>, Weboffice India
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
 * Test case for class \Typo3\Karriere\Domain\Model\Karriere.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Ajay Gohel <shared_user@webofficeindia.com>
 */
class KarriereTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Typo3\Karriere\Domain\Model\Karriere
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Typo3\Karriere\Domain\Model\Karriere();
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
	public function getSubtitleReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getSubtitle()
		);
	}

	/**
	 * @test
	 */
	public function setSubtitleForStringSetsSubtitle() {
		$this->subject->setSubtitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'subtitle',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPreviewReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getPreview()
		);
	}

	/**
	 * @test
	 */
	public function setPreviewForFileReferenceSetsPreview() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setPreview($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'preview',
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
	public function getFilesReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getFiles()
		);
	}

	/**
	 * @test
	 */
	public function setFilesForFileReferenceSetsFiles() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setFiles($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'files',
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
}
