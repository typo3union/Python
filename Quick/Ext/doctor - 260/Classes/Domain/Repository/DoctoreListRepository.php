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
 * The repository for DoctoreLists
 */
class DoctoreListRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	public function doclist($catid){
		$this->cObj = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tslib_cObj');
		$query = $this->createQuery();
		$query->getQuerySettings()->setReturnRawQueryResult(true);
		$sql = 'SELECT * FROM tx_arzte_domain_model_doctorelist WHERE deleted= 0 and hidden = 0 AND uid IN ( SELECT uid_local FROM tx_arzte_doctorelist_category_mm WHERE uid_foreign = '.$catid .') ORDER BY sorting' ;
		//$sql = 'SELECT uid_local FROM tx_arzte_doctorelist_category_mm WHERE uid_foreign = '.$catid ;
		$query->statement($sql);
		$result = $query->execute();
		
		foreach($result as $key=>$value){
			$sysimage = 'SELECT * FROM sys_file_reference WHERE deleted= 0 and hidden = 0 AND tablenames = "tx_arzte_domain_model_doctorelist" AND 	fieldname = "image" AND uid_foreign = '.$value['uid'].' ORDER BY sorting_foreign';
			$query->statement($sysimage);
			$sysimages = $query->execute();
			$arr = "";
			foreach($sysimages as $key1=>$value1){
				$sysimagedetail = 'SELECT * FROM sys_file WHERE uid = '.$value1['uid_local'];
				$query->statement($sysimagedetail);
        		$sysimagedetail = $query->execute();
				//print_r($sysimagedetail); exit;
				$suf = 'c';
				$lConf = array();
				$lConf['image.']['file.']['maxH']   = '145c';
				$lConf['image.']['file.']['maxW']   ='253c';
				$lConf['image.']['file.']['height'] = '145c';
				$lConf['image.']['file.']['width']  = '253c';
				if ($lConf['image.']['file.']['maxW'] && ! $lConf['image.']['file.']['width']) {
					$lConf['image.']['file.']['width'] = $lConf['image.']['file.']['maxW'] . $suf;
					unset($lConf['image.']['file.']['maxW']);
				}
				if ($lConf['image.']['file.']['maxH'] && ! $lConf['image.']['file.']['height']) {
					$lConf['image.']['file.']['height'] = $lConf['image.']['file.']['maxH'] . $suf;
					unset($lConf['image.']['file.']['maxH']);
				}
				
				$lConf['image.']['titleText'] = '';
				$lConf['image.']['altText'] = '';
				$lConf['image.']['file'] = 'fileadmin/'.$sysimagedetail[0]['identifier'];
				$image = $this->cObj->IMG_RESOURCE($lConf['image.']);

				//echo $image."hghg"; exit;
				
				$arr[$key1]['imagepath']  = $image;
				$arr[$key1]['title'] = $value1['title'];
				$arr[$key1]['caption'] = $value1['description'];
				
			}
			$result[$key]['pictures'] = $arr;
			$result[$key]['images'] = $arr[0];
			//print_r($arr); exit;
		}
		foreach($result as $key=>$value){
			$sysimage = 'SELECT * FROM sys_file_reference WHERE deleted= 0 and hidden = 0 AND tablenames = "tx_arzte_domain_model_doctorelist" AND 	fieldname = "logo" AND uid_foreign = '.$value['uid'].' ORDER BY sorting_foreign';
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
			$result[$key]['logolist'] = $arr;
			$result[$key]['logos'] = $arr[0];
			//print_r($arr); exit;
		}
		
		// category name
		$sqlcat = 'SELECT name,detail FROM tx_arzte_domain_model_category WHERE deleted= 0 and hidden = 0 AND uid ='.$catid ;
		$query->statement($sqlcat);
		$sqlcat = $query->execute();
		$result[0]['category_name'] = $sqlcat[0]['name'];
		$result[0]['detail'] = $sqlcat[0]['detail'];
		//print_r($sqlcat); exit;
		
		//echo "<pre>";
		//print_r($result); exit;
		
		return $result;
		
	}
	
	public function docshow($uid){
		$this->cObj = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tslib_cObj');
		$query = $this->createQuery();
		$query->getQuerySettings()->setReturnRawQueryResult(true);
		$sql = 'SELECT * FROM tx_arzte_domain_model_doctorelist WHERE deleted= 0 and hidden = 0 AND uid = '.$uid.' ORDER BY sorting' ;
		//$sql = 'SELECT uid_local FROM tx_arzte_doctorelist_category_mm WHERE uid_foreign = '.$catid ;
		$query->statement($sql);
		$result = $query->execute();
		//print_r($result); exit;
		
		foreach($result as $key=>$value){
			$sysimage = 'SELECT * FROM sys_file_reference WHERE deleted= 0 and hidden = 0 AND tablenames = "tx_arzte_domain_model_doctorelist" AND 	fieldname = "image" AND uid_foreign = '.$value['uid'].' ORDER BY sorting_foreign';
			$query->statement($sysimage);
			$sysimages = $query->execute();
			//print_r($sysimages); exit;
			$arr = "";
			foreach($sysimages as $key1=>$value1){
				$sysimagedetail = 'SELECT * FROM sys_file WHERE uid = '.$value1['uid_local'];
				$query->statement($sysimagedetail);
        		$sysimagedetail = $query->execute();
				//print_r($sysimagedetail); exit;
				
				$suf = 'c';
				$lConf = array();
				$lConf['image.']['file.']['maxH']   = '145c';
				$lConf['image.']['file.']['maxW']   ='253c';
				$lConf['image.']['file.']['height'] = '145c';
				$lConf['image.']['file.']['width']  = '253c';
				if ($lConf['image.']['file.']['maxW'] && ! $lConf['image.']['file.']['width']) {
					$lConf['image.']['file.']['width'] = $lConf['image.']['file.']['maxW'] . $suf;
					unset($lConf['image.']['file.']['maxW']);
				}
				if ($lConf['image.']['file.']['maxH'] && ! $lConf['image.']['file.']['height']) {
					$lConf['image.']['file.']['height'] = $lConf['image.']['file.']['maxH'] . $suf;
					unset($lConf['image.']['file.']['maxH']);
				}
				
				$lConf['image.']['titleText'] = '';
				$lConf['image.']['altText'] = '';
				$lConf['image.']['file'] = 'fileadmin/'.$sysimagedetail[0]['identifier'];
				$image = $this->cObj->IMG_RESOURCE($lConf['image.']);
				
				
				$lConf1 = array();
				$lConf1['image.']['file.']['maxH']   = '377c';
				$lConf1['image.']['file.']['maxW']   ='';
				$lConf1['image.']['file.']['height'] = '377c';
				$lConf1['image.']['file.']['width']  = '';
				if ($lConf1['image.']['file.']['maxW'] && ! $lConf1['image.']['file.']['width']) {
					$lConf1['image.']['file.']['width'] = $lConf1['image.']['file.']['maxW'] . $suf;
					unset($lConf1['image.']['file.']['maxW']);
				}
				if ($lConf1['image.']['file.']['maxH'] && ! $lConf1['image.']['file.']['height']) {
					$lConf1['image.']['file.']['height'] = $lConf1['image.']['file.']['maxH'] . $suf;
					unset($lConf1['image.']['file.']['maxH']);
				}
				
				$lConf1['image.']['titleText'] = '';
				$lConf1['image.']['altText'] = '';
				$lConf1['image.']['file'] = 'fileadmin/'.$sysimagedetail[0]['identifier'];
				$image1 = $this->cObj->IMG_RESOURCE($lConf1['image.']);
				
				//echo $image1; exit;
				$arr[$key1]['imagepath']  = $image;
				//$arr[$key1]['originpath'] = 'fileadmin/'.$sysimagedetail[0]['identifier'];
				// With reduced size in the center
				$arr[$key1]['originpath'] = $image1;
				$arr[$key1]['title'] = $value1['title'];
				$arr[$key1]['caption'] = $value1['description'];
				
			}
			$result[$key]['pictures'] = $arr;
			$result[$key]['images'] = $arr[0];
			$result[$key]['detailimages'] = $arr[1];
			//print_r($arr); exit;
		}
		foreach($result as $key=>$value){
			$sysimage = 'SELECT * FROM sys_file_reference WHERE deleted= 0 and hidden = 0 AND tablenames = "tx_arzte_domain_model_doctorelist" AND 	fieldname = "logo" AND uid_foreign = '.$value['uid'].' ORDER BY sorting_foreign';
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
			$result[$key]['logolist'] = $arr;
			$result[$key]['logos'] = $arr[0];
			//print_r($arr); exit;
		}
		
		//echo "<pre>";
		//print_r($result); exit;
		
		return $result;
		
	}
	
	
	public function catl($uid){
		$query = $this->createQuery();
		$query->getQuerySettings()->setReturnRawQueryResult(true);
		$sql = 'SELECT uid,name FROM tx_arzte_domain_model_category WHERE deleted= 0 and hidden = 0 AND uid NOT IN ( SELECT uid_foreign FROM tx_arzte_doctorelist_category_mm WHERE uid_local = '.$uid .')  ORDER BY sorting ' ;
		//$sql = 'SELECT uid_local FROM tx_arzte_doctorelist_category_mm WHERE uid_foreign = '.$catid ;
		$query->statement($sql);
		$result = $query->execute();
		//print_r($result); exit;
		return $result;
	}
}