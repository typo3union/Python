<?php

namespace Product\Product\Tests\Unit\Domain\Model;

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
 * Test case for class \Product\Product\Domain\Model\Product.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class ProductTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Product\Product\Domain\Model\Product
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Product\Product\Domain\Model\Product();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getFeaturedProductReturnsInitialValueForBoolean() {
		$this->assertSame(
			FALSE,
			$this->subject->getFeaturedProduct()
		);
	}

	/**
	 * @test
	 */
	public function setFeaturedProductForBooleanSetsFeaturedProduct() {
		$this->subject->setFeaturedProduct(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'featuredProduct',
			$this->subject
		);
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
	public function getSeasonReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getSeason()
		);
	}

	/**
	 * @test
	 */
	public function setSeasonForStringSetsSeason() {
		$this->subject->setSeason('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'season',
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
	public function getFeaturedImageReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getFeaturedImage()
		);
	}

	/**
	 * @test
	 */
	public function setFeaturedImageForFileReferenceSetsFeaturedImage() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setFeaturedImage($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'featuredImage',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getContentReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getContent()
		);
	}

	/**
	 * @test
	 */
	public function setContentForStringSetsContent() {
		$this->subject->setContent('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'content',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTableContentReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTableContent()
		);
	}

	/**
	 * @test
	 */
	public function setTableContentForStringSetsTableContent() {
		$this->subject->setTableContent('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'tableContent',
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
		$category = new \Product\Product\Domain\Model\Category();
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
		$category = new \Product\Product\Domain\Model\Category();
		$categoryObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$categoryObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($category));
		$this->inject($this->subject, 'category', $categoryObjectStorageMock);

		$this->subject->addCategory($category);
	}

	/**
	 * @test
	 */
	public function removeCategoryFromObjectStorageHoldingCategory() {
		$category = new \Product\Product\Domain\Model\Category();
		$categoryObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$categoryObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($category));
		$this->inject($this->subject, 'category', $categoryObjectStorageMock);

		$this->subject->removeCategory($category);

	}
}
