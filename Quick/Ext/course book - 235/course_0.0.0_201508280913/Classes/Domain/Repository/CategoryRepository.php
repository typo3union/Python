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
 * The repository for Categories
 */
class CategoryRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	function coursesfindAll($storageFolder){	
		$getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('name,uid,cat,addmenu,bannerimages,images,bottomimage,sort','tx_course_domain_model_course','hidden = 0 AND deleted = 0 AND pid = '.$storageFolder.'','','sorting','');		
		return $getRows;
	}	
	function categoryByUid($storageFolder,$category_id){	
		$getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*','tx_course_domain_model_category','hidden = 0 AND deleted = 0 AND uid='.$category_id.' AND pid = '.$storageFolder.$where.'','','','');		
		return $getRows;
	}
	
    function adword($storageFolder,$category_id){	
		$getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('adword','tx_course_domain_model_category','uid='.$category_id.'','','',''); 	
       	return $getRows;
	}
	function findDetailUId($storageFolder,$uid){
		$where = ' AND uid='.$uid;	
		$getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*','tx_course_domain_model_category','hidden = 0 AND deleted = 0 AND pid = '.$storageFolder.$where.'','','sorting','');		
			return $getRows;
	}	
	function findAllCAtegoryList($storageFolder){
		$getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*','tx_course_domain_model_category','hidden = 0 AND deleted = 0 AND pid = '.$storageFolder,'','sorting','');		
			return $getRows;
	}	
	function findAllCourses(){
		$getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('uid,category,parentcategory,maincategory,sort','tx_course_domain_model_category','hidden = 0 AND deleted = 0','','sorting','');		
		return $getRows;
	}	
	public function findAllSubCourses(){
		$query = $this->createQuery();
		$constraints[] = $query->logicalAnd(
			$query->equals('deleted', 0),
			$query->equals('hidden', 0)	,
			$query->equals('sys_language_uid',$GLOBALS['TSFE']->sys_language_uid),
			$query->equals('maincategory',0)						
        );
		$query->matching($query->logicalAnd($constraints));
		return $query->execute();
	}
	public function subpages($id){
		$getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*','pages','hidden = 0 AND deleted = 0 AND pid = '.$id,'','','');		
		return $getRows;
	}
	
	
	function findAllCAtegoryList_new(){
		$getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('uid,sort,"cat" as "type"','tx_course_domain_model_category','hidden = 0 AND deleted = 0 AND maincategory=1','','sort','');		
		return $getRows;
	}
	function coursesfindAll_new(){
		$getRows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('uid,sort,"course" as "type"','tx_course_domain_model_course','hidden = 0 AND deleted = 0 AND addmenu=1','','sorting','');			
		return $getRows;
	}	
		
	
}