<?php
namespace Golf\Golf\Domain\Model;


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
 * Golf
 */
class Golf extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * puttingHoles
	 *
	 * @var boolean
	 */
	protected $puttingHoles = FALSE;

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * videoImage
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $videoImage = NULL;

	/**
	 * video
	 *
	 * @var string
	 */
	protected $video = '';

	/**
	 * holeImage
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $holeImage = NULL;

	/**
	 * par
	 *
	 * @var string
	 */
	protected $par = '';

	/**
	 * hcp
	 *
	 * @var string
	 */
	protected $hcp = '';

	/**
	 * red
	 *
	 * @var string
	 */
	protected $red = '';

	/**
	 * green
	 *
	 * @var string
	 */
	protected $green = '';

	/**
	 * pinpositionImage
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $pinpositionImage = NULL;

	/**
	 * sliderImages
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $sliderImages = NULL;

	/**
	 * content
	 *
	 * @var string
	 */
	protected $content = '';

	/**
	 * table
	 *
	 * @var string
	 */
	protected $table = '';

	/**
	 * Returns the puttingHoles
	 *
	 * @return boolean $puttingHoles
	 */
	public function getPuttingHoles() {
		return $this->puttingHoles;
	}

	/**
	 * Sets the puttingHoles
	 *
	 * @param boolean $puttingHoles
	 * @return void
	 */
	public function setPuttingHoles($puttingHoles) {
		$this->puttingHoles = $puttingHoles;
	}

	/**
	 * Returns the boolean state of puttingHoles
	 *
	 * @return boolean
	 */
	public function isPuttingHoles() {
		return $this->puttingHoles;
	}

	/**
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
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
	 * Returns the videoImage
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $videoImage
	 */
	public function getVideoImage() {
		return $this->videoImage;
	}

	/**
	 * Sets the videoImage
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $videoImage
	 * @return void
	 */
	public function setVideoImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $videoImage) {
		$this->videoImage = $videoImage;
	}

	/**
	 * Returns the video
	 *
	 * @return string $video
	 */
	public function getVideo() {
		return $this->video;
	}

	/**
	 * Sets the video
	 *
	 * @param string $video
	 * @return void
	 */
	public function setVideo($video) {
		$this->video = $video;
	}

	/**
	 * Returns the holeImage
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $holeImage
	 */
	public function getHoleImage() {
		return $this->holeImage;
	}

	/**
	 * Sets the holeImage
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $holeImage
	 * @return void
	 */
	public function setHoleImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $holeImage) {
		$this->holeImage = $holeImage;
	}

	/**
	 * Returns the par
	 *
	 * @return string $par
	 */
	public function getPar() {
		return $this->par;
	}

	/**
	 * Sets the par
	 *
	 * @param string $par
	 * @return void
	 */
	public function setPar($par) {
		$this->par = $par;
	}

	/**
	 * Returns the hcp
	 *
	 * @return string $hcp
	 */
	public function getHcp() {
		return $this->hcp;
	}

	/**
	 * Sets the hcp
	 *
	 * @param string $hcp
	 * @return void
	 */
	public function setHcp($hcp) {
		$this->hcp = $hcp;
	}

	/**
	 * Returns the red
	 *
	 * @return string $red
	 */
	public function getRed() {
		return $this->red;
	}

	/**
	 * Sets the red
	 *
	 * @param string $red
	 * @return void
	 */
	public function setRed($red) {
		$this->red = $red;
	}

	/**
	 * Returns the green
	 *
	 * @return string $green
	 */
	public function getGreen() {
		return $this->green;
	}

	/**
	 * Sets the green
	 *
	 * @param string $green
	 * @return void
	 */
	public function setGreen($green) {
		$this->green = $green;
	}

	/**
	 * Returns the pinpositionImage
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $pinpositionImage
	 */
	public function getPinpositionImage() {
		return $this->pinpositionImage;
	}

	/**
	 * Sets the pinpositionImage
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $pinpositionImage
	 * @return void
	 */
	public function setPinpositionImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $pinpositionImage) {
		$this->pinpositionImage = $pinpositionImage;
	}

	/**
	 * Returns the sliderImages
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $sliderImages
	 */
	public function getSliderImages() {
		return $this->sliderImages;
	}

	/**
	 * Sets the sliderImages
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $sliderImages
	 * @return void
	 */
	public function setSliderImages(\TYPO3\CMS\Extbase\Domain\Model\FileReference $sliderImages) {
		$this->sliderImages = $sliderImages;
	}

	/**
	 * Returns the content
	 *
	 * @return string $content
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * Sets the content
	 *
	 * @param string $content
	 * @return void
	 */
	public function setContent($content) {
		$this->content = $content;
	}

	/**
	 * Returns the table
	 *
	 * @return string $table
	 */
	public function getTable() {
		return $this->table;
	}

	/**
	 * Sets the table
	 *
	 * @param string $table
	 * @return void
	 */
	public function setTable($table) {
		$this->table = $table;
	}

}