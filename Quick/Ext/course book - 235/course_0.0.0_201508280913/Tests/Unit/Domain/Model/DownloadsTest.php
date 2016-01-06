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
 * Test case for class \Typo3\Course\Domain\Model\Downloads.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Ajay Gohel <shared_user@webofficeindia.com>
 */
class DownloadsTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Typo3\Course\Domain\Model\Downloads
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Typo3\Course\Domain\Model\Downloads();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getDownloadtitleReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getDownloadtitle()
		);
	}

	/**
	 * @test
	 */
	public function setDownloadtitleForStringSetsDownloadtitle() {
		$this->subject->setDownloadtitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'downloadtitle',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDatadownloadReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getDatadownload()
		);
	}

	/**
	 * @test
	 */
	public function setDatadownloadForFileReferenceSetsDatadownload() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setDatadownload($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'datadownload',
			$this->subject
		);
	}
}
