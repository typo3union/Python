<?php
namespace Typo3\Course\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Ajay Gohel <shared_user@webofficeindia.com>, WOI
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
 * Course
 */
class Course extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 * 
	 * @var string
	 */
	protected $name = '';

	/**
	 * organiser
	 * 
	 * @var string
	 */
	protected $organiser = '';
	
	/**
	 * addmenu
	 * 
	 * @var boolean
	 */
	protected $addmenu = FALSE;

	/**
	 * shorttext
	 * 
	 * @var string
	 */
	protected $shorttext = '';

	/**
	 * description
	 * 
	 * @var string
	 */
	protected $description = '';

	/**
	 * discounts
	 * 
	 * @var string
	 */
	protected $discounts = '';

	/**
	 * priceinfo
	 * 
	 * @var string
	 */
	protected $priceinfo = '';
	
	
	/**
	 * kursinhalte
	 * 
	 * @var string
	 */
	protected $kursinhalte = '';
	
	
	/**
	 * kursinhalte
	 * 
	 * @var string
	 */
	protected $weitereinformationen = '';
	
	
		
	/**
	 * price
	 * 
	 * @var string
	 */
	protected $price = '';

	/**
	 * lastminprice
	 * 
	 * @var string
	 */
	protected $lastminprice = '';

	/**
	 * actlastmin
	 * 
	 * @var boolean
	 */
	protected $actlastmin = FALSE;
	
	

	/**
	 * links
	 * 
	 * @var string
	 */
	protected $links = '';

	/**
	 * images
	 * 
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $images = NULL;

	/**
	 * bannerimages
	 * 
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $bannerimages = NULL;
	
	/**
	 * bottomimage
	 * 
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $bottomimage = NULL;

	/**
	 * downloads
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3\Course\Domain\Model\Downloads>
	 */
	protected $downloads = NULL;

	/**
	 * location
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3\Course\Domain\Model\Locations>
	 */
	protected $location = NULL;

	/**
	 * cat
	 * 
	 * @var \Typo3\Course\Domain\Model\Category
	 */
	protected $cat = NULL;

	/**
	 * dateduration
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3\Course\Domain\Model\Datestartend>
	 */
	protected $dateduration = NULL;

	/**
	 * realtedcourse
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3\Course\Domain\Model\Course>
	 */
	protected $realtedcourse = NULL;	
	
	/**
	 * video
	 *
	 * @var string
	 */
	protected $video = '';
	
	/**
	 * kursinformationentext
	 *
	 * @var string
	 */
	protected $kursinformationentext = '';	
	
	/**
	 * kursinhaltetext
	 *
	 * @var string
	 */
	protected $kursinhaltetext = '';
	
	/**
	 * weitereInformationentext
	 *
	 * @var string
	 */
	protected $weitereInformationentext = '';
	
	/**
	 * lastMinuteTitle
	 *
	 * @var string
	 */
	protected $lastMinuteTitle = '';

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
		$this->images = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->downloads = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->location = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->dateduration = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->realtedcourse = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * Returns the organiser
	 * 
	 * @return string $organiser
	 */
	public function getOrganiser() {
		return $this->organiser;
	}

	/**
	 * Sets the organiser
	 * 
	 * @param string $organiser
	 * @return void
	 */
	public function setOrganiser($organiser) {
		$this->organiser = $organiser;
	}
	
	/**
	 * Returns the addmenu
	 * 
	 * @return boolean $addmenu
	 */
	public function getAddmenu() {
		return $this->addmenu;
	}

	/**
	 * Sets the addmenu
	 * 
	 * @param boolean $addmenu
	 * @return void
	 */
	public function setAddmenu($addmenu) {
		$this->addmenu = $addmenu;
	}
	

	/**
	 * Returns the shorttext
	 * 
	 * @return string $shorttext
	 */
	public function getShorttext() {
		return $this->shorttext;
	}

	/**
	 * Sets the shorttext
	 * 
	 * @param string $shorttext
	 * @return void
	 */
	public function setShorttext($shorttext) {
		$this->shorttext = $shorttext;
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
	 * Returns the discounts
	 * 
	 * @return string $discounts
	 */
	public function getDiscounts() {
		return $this->discounts;
	}

	/**
	 * Sets the discounts
	 * 
	 * @param string $discounts
	 * @return void
	 */
	public function setDiscounts($discounts) {
		$this->discounts = $discounts;
	}

	
	/**
	 * Returns the priceinfo
	 * 
	 * @return string $priceinfo
	 */
	public function getPriceinfo() {
		return $this->priceinfo;
	}

	/**
	 * Sets the priceinfo
	 * 
	 * @param string $priceinfo
	 * @return void
	 */
	public function setPriceinfo($priceinfo) {
		$this->priceinfo = $priceinfo;
	}
	
	
	/**
	 * Returns the kursinhalte
	 * 
	 * @return string $kursinhalte
	 */
	public function getKursinhalte() {
		return $this->kursinhalte;
	}

	/**
	 * Sets the kursinhalte
	 * 
	 * @param string $priceinfo
	 * @return void
	 */
	public function setKursinhalte($kursinhalte) {
		$this->kursinhalte = $kursinhalte;
	}
	
	/**
	 * Returns the weitereinformationen
	 * 
	 * @return string $weitereinformationen
	 */
	public function getWeitereinformationen() {
		return $this->weitereinformationen;
	}

	/**
	 * Sets the weitereinformationen
	 * 
	 * @param string $weitereinformationen
	 * @return void
	 */
	public function setWeitereinformationen($weitereinformationen) {
		$this->weitereinformationen = $weitereinformationen;
	}
	
	
	
	
	/**
	 * Returns the price
	 * 
	 * @return string $price
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * Sets the price
	 * 
	 * @param string $price
	 * @return void
	 */
	public function setPrice($price) {
		$this->price = $price;
	}

	/**
	 * Returns the lastminprice
	 * 
	 * @return string $lastminprice
	 */
	public function getLastminprice() {
		return $this->lastminprice;
	}

	/**
	 * Sets the lastminprice
	 * 
	 * @param string $lastminprice
	 * @return void
	 */
	public function setLastminprice($lastminprice) {
		$this->lastminprice = $lastminprice;
	}

	/**
	 * Returns the actlastmin
	 * 
	 * @return boolean $actlastmin
	 */
	public function getActlastmin() {
		return $this->actlastmin;
	}

	/**
	 * Sets the actlastmin
	 * 
	 * @param boolean $actlastmin
	 * @return void
	 */
	public function setActlastmin($actlastmin) {
		$this->actlastmin = $actlastmin;
	}

	/**
	 * Returns the boolean state of actlastmin
	 * 
	 * @return boolean
	 */
	public function isActlastmin() {
		return $this->actlastmin;
	}

	/**
	 * Returns the links
	 * 
	 * @return string $links
	 */
	public function getLinks() {
		return $this->links;
	}

	/**
	 * Sets the links
	 * 
	 * @param string $links
	 * @return void
	 */
	public function setLinks($links) {
		$this->links = $links;
	}

	/**
	 * Returns the images
	 * 
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $images
	 */
	public function getImages() {
		return $this->images;
	}

	/**
	 * Sets the images
	 * 
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $images
	 * @return void
	 */
	public function setImages($images) {
		$this->images = $images;
	}

	/**
	 * Returns the bannerimages
	 * 
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $bannerimages
	 */
	public function getBannerimages() {
		return $this->bannerimages;
	}

	/**
	 * Sets the bannerimages
	 * 
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $bannerimages
	 * @return void
	 */
	public function setBannerimages(\TYPO3\CMS\Extbase\Domain\Model\FileReference $bannerimages) {
		$this->bannerimages = $bannerimages;
	}

	/**
	 * Adds a Downloads
	 * 
	 * @param \Typo3\Course\Domain\Model\Downloads $download
	 * @return void
	 */
	public function addDownload(\Typo3\Course\Domain\Model\Downloads $download) {
		$this->downloads->attach($download);
	}

	/**
	 * Removes a Downloads
	 * 
	 * @param \Typo3\Course\Domain\Model\Downloads $downloadToRemove The Downloads to be removed
	 * @return void
	 */
	public function removeDownload(\Typo3\Course\Domain\Model\Downloads $downloadToRemove) {
		$this->downloads->detach($downloadToRemove);
	}

	/**
	 * Returns the downloads
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3\Course\Domain\Model\Downloads> $downloads
	 */
	public function getDownloads() {
		return $this->downloads;
	}

	/**
	 * Sets the downloads
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3\Course\Domain\Model\Downloads> $downloads
	 * @return void
	 */
	public function setDownloads(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $downloads) {
		$this->downloads = $downloads;
	}

	/**
	 * Adds a Locations
	 * 
	 * @param \Typo3\Course\Domain\Model\Locations $location
	 * @return void
	 */
	public function addLocation(\Typo3\Course\Domain\Model\Locations $location) {
		$this->location->attach($location);
	}

	/**
	 * Removes a Locations
	 * 
	 * @param \Typo3\Course\Domain\Model\Locations $locationToRemove The Locations to be removed
	 * @return void
	 */
	public function removeLocation(\Typo3\Course\Domain\Model\Locations $locationToRemove) {
		$this->location->detach($locationToRemove);
	}

	/**
	 * Returns the location
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3\Course\Domain\Model\Locations> $location
	 */
	public function getLocation() {
		return $this->location;
	}

	/**
	 * Sets the location
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3\Course\Domain\Model\Locations> $location
	 * @return void
	 */
	public function setLocation(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $location) {
		$this->location = $location;
	}

	/**
	 * Returns the cat
	 * 
	 * @return \Typo3\Course\Domain\Model\Category $cat
	 */
	public function getCat() {
		return $this->cat;
	}

	/**
	 * Sets the cat
	 * 
	 * @param \Typo3\Course\Domain\Model\Category $cat
	 * @return void
	 */
	public function setCat(\Typo3\Course\Domain\Model\Category $cat) {
		$this->cat = $cat;
	}

	/**
	 * Adds a Datestartend
	 * 
	 * @param \Typo3\Course\Domain\Model\Datestartend $dateduration
	 * @return void
	 */
	public function addDateduration(\Typo3\Course\Domain\Model\Datestartend $dateduration) {
		$this->dateduration->attach($dateduration);
	}

	/**
	 * Removes a Datestartend
	 * 
	 * @param \Typo3\Course\Domain\Model\Datestartend $datedurationToRemove The Datestartend to be removed
	 * @return void
	 */
	public function removeDateduration(\Typo3\Course\Domain\Model\Datestartend $datedurationToRemove) {
		$this->dateduration->detach($datedurationToRemove);
	}

	/**
	 * Returns the dateduration
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3\Course\Domain\Model\Datestartend> $dateduration
	 */
	public function getDateduration() {
		return $this->dateduration;
	}

	/**
	 * Sets the dateduration
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3\Course\Domain\Model\Datestartend> $dateduration
	 * @return void
	 */
	public function setDateduration(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $dateduration) {
		$this->dateduration = $dateduration;
	}

	/**
	 * Adds a Course
	 * 
	 * @param \Typo3\Course\Domain\Model\Course $realtedcourse
	 * @return void
	 */
	public function addRealtedcourse(\Typo3\Course\Domain\Model\Course $realtedcourse) {
		$this->realtedcourse->attach($realtedcourse);
	}

	/**
	 * Removes a Course
	 * 
	 * @param \Typo3\Course\Domain\Model\Course $realtedcourseToRemove The Course to be removed
	 * @return void
	 */
	public function removeRealtedcourse(\Typo3\Course\Domain\Model\Course $realtedcourseToRemove) {
		$this->realtedcourse->detach($realtedcourseToRemove);
	}

	/**
	 * Returns the realtedcourse
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3\Course\Domain\Model\Course> $realtedcourse
	 */
	public function getRealtedcourse() {
		return $this->realtedcourse;
	}

	/**
	 * Sets the realtedcourse
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3\Course\Domain\Model\Course> $realtedcourse
	 * @return void
	 */
	public function setRealtedcourse(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $realtedcourse) {
		$this->realtedcourse = $realtedcourse;
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
	 * Returns the kursinformationentext
	 *
	 * @return string $kursinformationentext
	 */
	public function getKursinformationentexto() {
		return $this->kursinformationentext;
	}

	/**
	 * Sets the kursinformationentext
	 *
	 * @param string $kursinformationentext
	 * @return void
	 */
	public function setKursinformationentext($kursinformationentext) {
		$this->kursinformationentext = $kursinformationentext;
	}
	
	
	/**
	 * Returns the kursinhaltetext
	 *
	 * @return string $kursinhaltetext
	 */
	public function getKursinhaltetext() {
		return $this->kursinhaltetext;
	}

	/**
	 * Sets the kursinhaltetext
	 *
	 * @param string $kursinhaltetext
	 * @return void
	 */
	public function setKursinhaltetext($kursinhaltetext) {
		$this->kursinhaltetext = $kursinhaltetext;
	}
	
	/**
	 * Returns the weitereInformationentext
	 *
	 * @return string $weitereInformationentext
	 */
	public function getWeitereInformationentext() {
		return $this->weitereInformationentext;
	}

	/**
	 * Sets the weitereInformationentext
	 *
	 * @param string $weitereInformationentext
	 * @return void
	 */
	public function setWeitereInformationentext($weitereInformationentext) {
		$this->weitereInformationentext = $weitereInformationentext;
	}
	
	/**
	 * Returns the lastMinuteTitle
	 *
	 * @return string $lastMinuteTitle
	 */
	public function getLastMinuteTitle() {
		return $this->lastMinuteTitle;
	}

	/**
	 * Sets the lastMinuteTitle
	 *
	 * @param string $lastMinuteTitle
	 * @return void
	 */
	public function setLastMinuteTitle($lastMinuteTitle) {
		$this->lastMinuteTitle = $lastMinuteTitle;
		
		
	}
	/**
	 * Returns the bottomimage
	 * 
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $bottomimage
	 */
	public function getBottomimage() {
		return $this->bottomimage;
	}

	/**
	 * Sets the bottomimage
	 * 
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $bottomimage
	 * @return void
	 */
	public function setBottomimage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $bottomimage) {
		$this->bottomimage = $bottomimage;
	}
	
}