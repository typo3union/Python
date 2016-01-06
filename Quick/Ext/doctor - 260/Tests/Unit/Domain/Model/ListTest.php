<?php

namespace Arzte\Arzte\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 
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
 * Test case for class \Arzte\Arzte\Domain\Model\List.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class ListTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Arzte\Arzte\Domain\Model\List
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Arzte\Arzte\Domain\Model\List();
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
	public function getShortInformationReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getShortInformation()
		);
	}

	/**
	 * @test
	 */
	public function setShortInformationForStringSetsShortInformation() {
		$this->subject->setShortInformation('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'shortInformation',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAddressReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getAddress()
		);
	}

	/**
	 * @test
	 */
	public function setAddressForStringSetsAddress() {
		$this->subject->setAddress('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'address',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPhonenumberReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getPhonenumber()
		);
	}

	/**
	 * @test
	 */
	public function setPhonenumberForStringSetsPhonenumber() {
		$this->subject->setPhonenumber('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'phonenumber',
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
	public function getHeadlineReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getHeadline()
		);
	}

	/**
	 * @test
	 */
	public function setHeadlineForStringSetsHeadline() {
		$this->subject->setHeadline('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'headline',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDetailedinformationReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getDetailedinformation()
		);
	}

	/**
	 * @test
	 */
	public function setDetailedinformationForStringSetsDetailedinformation() {
		$this->subject->setDetailedinformation('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'detailedinformation',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCategoryselectReturnsInitialValueForCategory() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getCategoryselect()
		);
	}

	/**
	 * @test
	 */
	public function setCategoryselectForObjectStorageContainingCategorySetsCategoryselect() {
		$categoryselect = new \Arzte\Arzte\Domain\Model\Category();
		$objectStorageHoldingExactlyOneCategoryselect = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneCategoryselect->attach($categoryselect);
		$this->subject->setCategoryselect($objectStorageHoldingExactlyOneCategoryselect);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneCategoryselect,
			'categoryselect',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addCategoryselectToObjectStorageHoldingCategoryselect() {
		$categoryselect = new \Arzte\Arzte\Domain\Model\Category();
		$categoryselectObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$categoryselectObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($categoryselect));
		$this->inject($this->subject, 'categoryselect', $categoryselectObjectStorageMock);

		$this->subject->addCategoryselect($categoryselect);
	}

	/**
	 * @test
	 */
	public function removeCategoryselectFromObjectStorageHoldingCategoryselect() {
		$categoryselect = new \Arzte\Arzte\Domain\Model\Category();
		$categoryselectObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$categoryselectObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($categoryselect));
		$this->inject($this->subject, 'categoryselect', $categoryselectObjectStorageMock);

		$this->subject->removeCategoryselect($categoryselect);

	}
}
