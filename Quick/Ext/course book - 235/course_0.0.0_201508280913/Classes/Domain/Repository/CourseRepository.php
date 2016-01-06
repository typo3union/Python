<?php
namespace Typo3\Course\Domain\Repository;


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
 * The repository for Courses
 */
class CourseRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

public function findLastDay($lastMinuteDays) {
		$lastMinuteDays = $lastMinuteDays * 86400;
     		 
		 $getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('t1.uid_local,t2.lastmintuteprice,t2.uid,t2.startdate,UNIX_TIMESTAMP(t2.startdate),UNIX_TIMESTAMP(t2.startdate)-'.$lastMinuteDays.',UNIX_TIMESTAMP(NOW())','tx_course_course_datestartend_mm t1 LEFT JOIN tx_course_domain_model_datestartend t2 ON t2.uid = t1.uid_foreign','t2.startdate !="0000-00-00" AND t2.hidden = 0 AND t2.deleted = 0 AND (UNIX_TIMESTAMP(t2.startdate)-'.$lastMinuteDays.') <= UNIX_TIMESTAMP(NOW())'.$where.'','t1.uid_local','','');
		 
		return $getRows; 
	}

	
	
	public function findCatUId($uid) {
	
        $getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*','tx_course_domain_model_category','hidden = 0 AND deleted = 0 AND uid = '.$uid.$where.'','','','');		
			return $getRows;
	}
	
	public function findAlldata($storageFolder) {
        $getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*','tx_course_domain_model_course','hidden = 0 AND deleted = 0 AND pid = '.$storageFolder.$where.'','','','');		
			return $getRows;
	}

	function findDetailUId($storageFolder,$uid){
		$where = ' AND uid='.$uid;	
		$getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*','tx_course_domain_model_course','hidden = 0 AND deleted = 0 AND pid = '.$storageFolder.$where.'','','','');		
			return $getRows;
	}
	
	function findRelatedCourses($storageFolder,$uid){
		$where = ' AND t2.uid_local='.$uid;	
		
		$getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('t2.uid_foreign','tx_course_domain_model_course t1 LEFT JOIN tx_course_course_course_mm t2 ON t1.uid = t2.uid_local','t1.hidden = 0 AND t1.deleted = 0 AND t1.pid = '.$storageFolder.$where.'','','','');	
		
		foreach ($getRows as $key=>$value){
				$uids[$key] = $value['uid_foreign'];
		}
		
		$uidss = implode(',',$uids);
		
		$where1 = ' AND uid IN ('.$uidss.')';	
 		$getRows1 = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*','tx_course_domain_model_course','hidden = 0 AND deleted = 0 AND pid = '.$storageFolder.$where1.'','','','');
	
		return $getRows1;
	}
	
	function findImageUid($storageFolder,$uid){
		$where = ' AND uid='.$uid;	
		$getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('images','tx_course_domain_model_course','hidden = 0 AND deleted = 0 AND pid = '.$storageFolder.$where.'','','','');		
			return $getRows;
	}
	
	function getImageGallery($imagesArray){
		if($imagesArray != ""){
		$liItems = explode(',',$imagesArray);
		$lisubtitles = explode("\n", trim($subtitles));
		$addCaption = '';
		$li = '<ul class="newsgallary newsgallary popup-gallery">';	
			for($i=0;$i<count($liItems);$i++){
				if($display_subtitle==1){
					$addCaption = '<span class="caption">'.$lisubtitles[$i].'</span>';
				}
				//$image = $this->imageResize('155','103','uploads/tx_aktuelle/'.$liItems[$i]);	
				$li .= '<li ><a  href="uploads/tx_course/'.$liItems[$i].'"><img   src="uploads/tx_course/'.$liItems[$i].'" alt=""  width="155" height="103" /></a></li>';
			}
			$li .= '</ul>';
		}
		return $li;
	}
	
	public function findByUid($uid) {
	  $query = $this->createQuery();
	  $query->matching($query->equals('uid', $uid));
	  
	   $orderings = array(
            'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
        );
		 $query->setOrderings($orderings);
		
	  $models = $query->execute();
	  
	 
	  
	  return $models;
	}
	
	
	
	public function findFirstMonth($courseUid){
		$where = ' AND t1.uid_local='.$courseUid;	
		 $getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('t2.startdate','tx_course_course_datestartend_mm t1 LEFT JOIN tx_course_domain_model_datestartend t2 ON t2.uid = t1.uid_foreign','t2.hidden = 0 AND t2.deleted = 0 '.$where.'','','',''); 
		return $getRows; 
	}
	
	public function findByPrice($courseUid,$priceUid){
		$getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('t2.price','tx_course_course_datestartend_mm t1 LEFT JOIN tx_course_domain_model_datestartend t2 ON t2.uid = t1.uid_foreign','t2.hidden = 0 AND t2.deleted = 0 AND t1.uid_foreign = '.$priceUid.' AND t1.uid_local = '.$courseUid.$where.'','','','');		
		return $getRows;
	}
	
	function findDates($storageFolder,$uid){
	
		
		$where = ' AND t1.uid_local='.$uid;	
		$getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('t1.*,t2.*','tx_course_course_datestartend_mm t1 LEFT JOIN tx_course_domain_model_datestartend t2 ON t2.uid = t1.uid_foreign','t2.hidden = 0 AND t2.deleted = 0 '.$where.'','','t2.startdate','');
		return $getRows;
	}	
	function findTypeDates($storageFolder,$uid,$type){
		
		$where = ' AND t1.uid_local='.$uid;	
		
		if($type==0){
			$where .= ' AND type=0';
		}else{
			$where .= ' AND type=1';
		}
		
		$getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('t1.*,t2.*','tx_course_course_datestartend_mm t1 LEFT JOIN tx_course_domain_model_datestartend t2 ON t2.uid = t1.uid_foreign','t2.hidden = 0 AND t2.deleted = 0 '.$where.'','','t2.startdate','');
		return $getRows;
	}	
	
	
	function findallDates($uid){
		$where = ' AND t1.uid_local='.$uid;	
		$getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('t1.*,t2.*','tx_course_datestartend_dates_mm t1 LEFT JOIN tx_course_domain_model_dates t2 ON t2.uid = t1.uid_foreign','t2.hidden = 0 AND t2.deleted = 0 '.$where.'','','','');
		return $getRows;
	}	
	
	function getActiveDates(){		
		$getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('uid,startdate,enddate','tx_course_domain_model_datestartend','hidden = 0 AND deleted = 0','','','');
		return $getRows;
	}
	
	function findPageData($pageId){		
		$getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('uid,pid,title','pages','hidden = 0 AND doktype=1 AND tx_realurl_exclude=0 AND deleted = 0 AND uid='.$pageId,'','','');
		return $getRows;
	}
	
	function findParentCat($catId){	
 	$getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*','tx_course_domain_model_category','hidden = 0 AND deleted = 0 AND find_in_set ("'.$catId.'",parentcategory)' ,'','','');	 	 
			return $getRows;
	}
	
		
}

