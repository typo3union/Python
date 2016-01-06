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
 * Test case for class \Product\Product\Domain\Model\Category.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class CategoryTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Product\Product\Domain\Model\Category
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Product\Product\Domain\Model\Category();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getCategoryNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getCategoryName()
		);
	}

	/**
	 * @test
	 */
	public function setCategoryNameForStringSetsCategoryName() {
		$this->subject->setCategoryName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'categoryName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getIsSubReturnsInitialValueForBoolean() {
		$this->assertSame(
			FALSE,
			$this->subject->getIsSub()
		);
	}

	/**
	 * @test
	 */
	public function setIsSubForBooleanSetsIsSub() {
		$this->subject->setIsSub(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'isSub',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSubCategoryReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getSubCategory()
		);
	}

	/**
	 * @test
	 */
	public function setSubCategoryForStringSetsSubCategory() {
		$this->subject->setSubCategory('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'subCategory',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getInMenuReturnsInitialValueForBoolean() {
		$this->assertSame(
			FALSE,
			$this->subject->getInMenu()
		);
	}

	/**
	 * @test
	 */
	public function setInMenuForBooleanSetsInMenu() {
		$this->subject->setInMenu(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'inMenu',
			$this->subject
		);
	}
}
