<?php
namespace JS\JsDownload\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015
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
 * File
 */
class File extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * shortDescription
	 *
	 * @var string
	 */
	protected $shortDescription = '';

	/**
	 * date
	 *
	 * @var \DateTime
	 */
	protected $date = NULL;

	/**
	 * media
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $media = NULL;

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * video
	 *
	 * @var boolean
	 */
	protected $video = FALSE;

	/**
	 * videoMp4
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $videoMp4 = NULL;

	/**
	 * videoWebm
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $videoWebm = NULL;

	/**
	 * videoOgg
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $videoOgg = NULL;

	/**
	 * noOfDownload
	 *
	 * @var integer
	 */
	protected $noOfDownload = 0;

	/**
	 * category
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsDownload\Domain\Model\Category>
	 */
	protected $category = NULL;

	/**
	 * fileType
	 *
	 * @var \JS\JsDownload\Domain\Model\Filetype
	 */
	protected $fileType = NULL;

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->category = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

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
	 * Returns the shortDescription
	 *
	 * @return string $shortDescription
	 */
	public function getShortDescription() {
		return $this->shortDescription;
	}

	/**
	 * Sets the shortDescription
	 *
	 * @param string $shortDescription
	 * @return void
	 */
	public function setShortDescription($shortDescription) {
		$this->shortDescription = $shortDescription;
	}

	/**
	 * Returns the date
	 *
	 * @return \DateTime $date
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * Sets the date
	 *
	 * @param \DateTime $date
	 * @return void
	 */
	public function setDate(\DateTime $date) {
		$this->date = $date;
	}

	/**
	 * Returns the media
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $media
	 */
	public function getMedia() {
		return $this->media;
	}

	/**
	 * Sets the media
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $media
	 * @return void
	 */
	public function setMedia(\TYPO3\CMS\Extbase\Domain\Model\FileReference $media) {
		$this->media = $media;
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
	 * Returns the noOfDownload
	 *
	 * @return integer $noOfDownload
	 */
	public function getNoOfDownload() {
		return $this->noOfDownload;
	}

	/**
	 * Sets the noOfDownload
	 *
	 * @param integer $noOfDownload
	 * @return void
	 */
	public function setNoOfDownload($noOfDownload) {
		$this->noOfDownload = $noOfDownload;
	}

	/**
	 * Adds a Category
	 *
	 * @param \JS\JsDownload\Domain\Model\Category $category
	 * @return void
	 */
	public function addCategory(\JS\JsDownload\Domain\Model\Category $category) {
		$this->category->attach($category);
	}

	/**
	 * Removes a Category
	 *
	 * @param \JS\JsDownload\Domain\Model\Category $categoryToRemove The Category to be removed
	 * @return void
	 */
	public function removeCategory(\JS\JsDownload\Domain\Model\Category $categoryToRemove) {
		$this->category->detach($categoryToRemove);
	}

	/**
	 * Returns the category
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsDownload\Domain\Model\Category> $category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * Sets the category
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsDownload\Domain\Model\Category> $category
	 * @return void
	 */
	public function setCategory(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $category) {
		$this->category = $category;
	}

	/**
	 * Returns the fileType
	 *
	 * @return \JS\JsDownload\Domain\Model\Filetype $fileType
	 */
	public function getFileType() {
		return $this->fileType;
	}

	/**
	 * Sets the fileType
	 *
	 * @param \JS\JsDownload\Domain\Model\Filetype $fileType
	 * @return void
	 */
	public function setFileType(\JS\JsDownload\Domain\Model\Filetype $fileType) {
		$this->fileType = $fileType;
	}

	/**
	 * Returns the video
	 *
	 * @return boolean $video
	 */
	public function getVideo() {
		return $this->video;
	}

	/**
	 * Sets the video
	 *
	 * @param boolean $video
	 * @return void
	 */
	public function setVideo($video) {
		$this->video = $video;
	}

	/**
	 * Returns the boolean state of video
	 *
	 * @return boolean
	 */
	public function isVideo() {
		return $this->video;
	}

	/**
	 * Returns the videoMp4
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $videoMp4
	 */
	public function getVideoMp4() {
		return $this->videoMp4;
	}

	/**
	 * Sets the videoMp4
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $videoMp4
	 * @return void
	 */
	public function setVideoMp4(\TYPO3\CMS\Extbase\Domain\Model\FileReference $videoMp4) {
		$this->videoMp4 = $videoMp4;
	}

	/**
	 * Returns the videoWebm
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $videoWebm
	 */
	public function getVideoWebm() {
		return $this->videoWebm;
	}

	/**
	 * Sets the videoWebm
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $videoWebm
	 * @return void
	 */
	public function setVideoWebm(\TYPO3\CMS\Extbase\Domain\Model\FileReference $videoWebm) {
		$this->videoWebm = $videoWebm;
	}

	/**
	 * Returns the videoOgg
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $videoOgg
	 */
	public function getVideoOgg() {
		return $this->videoOgg;
	}

	/**
	 * Sets the videoOgg
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $videoOgg
	 * @return void
	 */
	public function setVideoOgg(\TYPO3\CMS\Extbase\Domain\Model\FileReference $videoOgg) {
		$this->videoOgg = $videoOgg;
	}

}