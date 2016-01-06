<?php

namespace TYPO3\Events\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 pooja <pooja.patel@webofficeindia.com>, Weboffice
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
 * Test case for class \TYPO3\Events\Domain\Model\Location.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author pooja <pooja.patel@webofficeindia.com>
 */
class LocationTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \TYPO3\Events\Domain\Model\Location
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \TYPO3\Events\Domain\Model\Location();
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
	public function getIconReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getIcon()
		);
	}

	/**
	 * @test
	 */
	public function setIconForFileReferenceSetsIcon() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setIcon($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'icon',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getHovericonReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getHovericon()
		);
	}

	/**
	 * @test
	 */
	public function setHovericonForFileReferenceSetsHovericon() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setHovericon($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'hovericon',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTableiconReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getTableicon()
		);
	}

	/**
	 * @test
	 */
	public function setTableiconForFileReferenceSetsTableicon() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setTableicon($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'tableicon',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUserReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getUser()
		);
	}

	/**
	 * @test
	 */
	public function setUserForIntegerSetsUser() {
		$this->subject->setUser(12);

		$this->assertAttributeEquals(
			12,
			'user',
			$this->subject
		);
	}
}
