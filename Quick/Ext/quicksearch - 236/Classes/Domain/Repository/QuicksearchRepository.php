<?php
namespace PJ\Quicksearch\Domain\Repository;


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
 * The repository for Quicksearches
 */
class QuicksearchRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	public function getPageList($val){					
		


		$field	 = "uid,title,page_type"; 
		$table	 = "pages";
		$groupBy = "";
		$orderBy = "";
		$limit   = "";
		$where 	 = " hidden=0 AND deleted=0 AND doktype=1 AND page_type!=''";

		if($val=='0'){
			//$where .= ' AND FIND_IN_SET(page_type,0)';
			$where .= ' AND FIND_IN_SET(0,page_type)';
		}
		if($val=='1'){
			//$where .= ' AND FIND_IN_SET(page_type,1)'; 
			$where .= ' AND FIND_IN_SET(1,page_type)'; 
		}
	
		$res	= $this->getDBHandle()->exec_SELECTgetRows($field,$table,$where,$groupBy,$orderBy,$limit);
		//echo $this->getDBHandle()->SELECTquery($field,$table,$where,$groupBy,$orderBy,$limit); die;
		return $res;
		
	}
	public function getDBHandle() {
		return $GLOBALS['TYPO3_DB'];
	}
}