<?php
namespace Arzte\Arzte\Domain\Repository;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014
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
	public function catlist(){
		
		$query = $this->createQuery();
		$query->getQuerySettings()->setReturnRawQueryResult(true);			
		$sql = 'SELECT * FROM tx_arzte_domain_model_category WHERE deleted= 0 and hidden = 0 ORDER BY sorting' ;
		$query->statement($sql);
		$result = $query->execute();
		
		foreach($result as $key=>$value){
			$sysimage = 'SELECT * FROM sys_file_reference WHERE deleted= 0 and hidden = 0 AND tablenames = "tx_arzte_domain_model_category" AND uid_foreign = '.$value['uid'].' ORDER BY sorting_foreign';
			$query->statement($sysimage);
			$sysimages = $query->execute();
			$arr = "";
			foreach($sysimages as $key1=>$value1){
				$sysimagedetail = 'SELECT * FROM sys_file WHERE uid = '.$value1['uid_local'];
				$query->statement($sysimagedetail);
        		$sysimagedetail = $query->execute();
				//print_r($sysimagedetail); exit;
				$arr[$key1]['imagepath']  = $sysimagedetail[0]['identifier'];
				$arr[$key1]['title'] = $value1['title'];
				$arr[$key1]['caption'] = $value1['description'];
				
			}
			$result[$key]['pictures'] = $arr;
			$result[$key]['images'] = $arr[0];
			//print_r($arr); exit;
		}
		//echo "<pre>";
		//print_r($result); exit;
        return $result;
	}
	
	public function catl(){
		$query = $this->createQuery();
		$query->getQuerySettings()->setReturnRawQueryResult(true);			
		$sql = 'SELECT * FROM tx_arzte_domain_model_category WHERE deleted= 0 and hidden = 0 ORDER BY sorting' ;
		$query->statement($sql);
		$result = $query->execute();
		return $result;
	}
	
}