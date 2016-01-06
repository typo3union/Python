<?php
namespace Typo3\Karriere\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Ajay Gohel <shared_user@webofficeindia.com>, Weboffice India
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * Karriere
 */
class Karriere extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * subtitle
	 *
	 * @var string
	 */
	protected $subtitle = '';

	/**
	 * preview
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $preview = NULL;

	/**
	 * image
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $image = NULL;

	/**
	 * files
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $files = NULL;

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * cat
	 *
	 * @var string
	 */
	protected $cat = '';
	
	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the subtitle
	 *
	 * @return string $subtitle
	 */
	public function getSubtitle() {
		return $this->subtitle;
	}

	/**
	 * Sets the subtitle
	 *
	 * @param string $subtitle
	 * @return void
	 */
	public function setSubtitle($subtitle) {
		$this->subtitle = $subtitle;
	}

	/**
	 * Returns the preview
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $preview
	 */
	public function getPreview() {
		return $this->preview;
	}

	/**
	 * Sets the preview
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $preview
	 * @return void
	 */
	public function setPreview(\TYPO3\CMS\Extbase\Domain\Model\FileReference $preview) {
		$this->preview = $preview;
	}

	/**
	 * Returns the image
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Sets the image
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 * @return void
	 */
	public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image) {
		$this->image = $image;
	}

	/**
	 * Returns the files
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $files
	 */
	public function getFiles() {
		return $this->files;
	}

	/**
	 * Sets the files
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $files
	 * @return void
	 */
	public function setFiles(\TYPO3\CMS\Extbase\Domain\Model\FileReference $files) {
		$this->files = $files;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the cat
	 *
	 * @return string $cat
	 */
	public function getCat() {
		return $this->cat;
	}
	
	/**
	 * Sets the cat
	 *
	 * @param string $cat
	 * @return void
	 */
	public function setCat($cat) {
		$this->title = $cat;
	}

	
}