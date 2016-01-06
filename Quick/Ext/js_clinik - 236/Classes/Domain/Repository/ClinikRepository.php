<?php
namespace JS\JsClinik\Domain\Repository;

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
 * The repository for Cliniks
 */
class ClinikRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * clinikService
	 *
	 * @var \JS\JsClinik\Service\ClinikService
	 * @inject
	 */
	protected $clinikService = NULL;
	
	/**
	 * getFacilities
	 *
	 * @param $settings
	 *
	 * @return 
	 */
	public function getFacilities($settings){
		
		$limit		= "";

		$order	= $settings['orderBy'];
		if(empty($settings['orderBy'])) {
			$order = 'uid';
		}
		
		$sort	= $settings['sorting'];		
		if(empty($settings['sorting'])) {
			$sort = 'asc';
		}
		
		$orderBy	= " f.type, f.".$order." ".$sort;
	
		$field		= "f.uid, f.title, f.type, t.title as typeName"; 

		$table		= "tx_jsclinik_domain_model_facilities as f 
						LEFT JOIN tx_jsclinik_domain_model_type AS t ON t.uid = f.type ";
	
		$groupBy	= "";

		$where		= "";

		if(isset($settings['storagePID']) && $settings['storagePID']!=""){
			$where .= " AND f.pid in (".$settings['storagePID'].") ";
		}

		$where 		= " f.deleted = 0 AND f.hidden = 0 AND f.sys_language_uid = 0 ".$where;

		$res	= $this->getDBHandle()->exec_SELECTgetRows($field,$table,$where,$groupBy,$orderBy,$limit);

	//	echo $this->getDBHandle()->SELECTquery($field,$table,$where,$groupBy,$orderBy);	die;
	
		$data	= array();

		foreach ($res as $key => $value) {

			$data[$value['type']]['title'] = $value['typeName'];
			$data[$value['type']]['facilities'][$value['uid']] = $value;

		}

		return $data;
	}
	
	
	/**
	 * getClinks
	 *
	 * @param $settings
	 * @param $getData
	 *
	 * @return 
	 */
	public function getClinks($settings,$getData = ""){
		
		$limit		= "";

		$order		= 'uid';
		
		$sort		= 'asc';
		
		$orderBy	= " c.".$order." ".$sort;
	
		$field		= "c.uid, c.latitude, c.longitude"; 

		$table		= "tx_jsclinik_domain_model_clinik as c 
						LEFT JOIN tx_jsclinik_clinik_facilities_mm AS m ON c.uid = m.uid_local ";
	
		$groupBy	= "( c.uid )";

		$where		= "";


		if(isset($getData['facility']) && is_array($getData['facility'])){

			$id = implode(",", $getData['facility']);
			
 			$where .= " AND m.uid_foreign in (".$id.") ";
		}

		$where 		= " c.deleted = 0 AND c.hidden = 0 AND c.sys_language_uid = 0 ".$where;

		//$res	= $this->getDBHandle()->exec_SELECTgetRows($field,$table,$where,$groupBy,$orderBy,$limit);

		$Query = $this->createQuery();
        // Enable below line for debug
        $Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		
		$sql = 'SELECT '.$field.' from '.$table.' where '.$where.' GROUP BY '.$groupBy.' ORDER BY '.$orderBy;
        
        $Query->statement($sql);
        $res = $this->falImages($Query->execute(), "tx_jsclinik_domain_model_clinik");
		
//		echo $this->getDBHandle()->SELECTquery($field,$table,$where,$groupBy,$orderBy);	die;
	
		$id	= array();

		foreach ($res as $key => $value) {
			$id[$value['uid']] = $value['uid'];
		}
	
		$data	= array();
		
		if(count($id>0)){
			
			$limit		= "";
	
			$order		= 'c.uid';
			
			$sort		= 'asc';
			
			$orderBy	= " ".$order." ".$sort;
		
			$field		= "c.uid, c.title, c.location, c.description, c.link, r.uid_local as logo,r1.uid_local as mapIcon, c.clinik_id, c.latitude, c.longitude, c.display_map_content, c.map_content, c.map_icon"; 
	
			$table		= "tx_jsclinik_domain_model_clinik as c LEFT JOIN sys_file_reference AS r ON r.uid_foreign = c.logo  LEFT JOIN sys_file_reference AS r1 ON r1.uid_foreign = c.map_icon ";
		
			$groupBy	= "";
	
			$where 		= " c.deleted = 0 AND c.hidden = 0 AND c.sys_language_uid = 0 AND r.deleted = 0 AND r.hidden = 0 
						AND r.fieldname = 'logo' AND r.tablenames = 'tx_jsclinik_domain_model_clinik' ";
	
		//	$res		= $this->getDBHandle()->exec_SELECTgetRows($field,$table,$where,$groupBy,$orderBy,$limit);

			$Query = $this->createQuery();
	        
	        $Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
			
			$sql = 'SELECT '.$field.' from '.$table.' where '.$where.' ORDER BY '.$orderBy;
	        
	        $Query->statement($sql);
	        $res = $this->falImages($Query->execute(), "tx_jsclinik_domain_model_clinik");

			foreach ($res as $key => $value) {
				
				$selected	= in_array($value['uid'],$id)?"selected":"";
				$active		= $settings['clinik'] == $value['uid']?"active":"";
				
				$data[$value['uid']] = $value;
				$data[$value['uid']]['selected']	= $selected;
				$data[$value['uid']]['active'] 		= $active;
			}
		}
		
		return $data;
	}
	
	
	/**
	 * getClinksWithFacilities
	 *
	 * @param $settings
	 *
	 * @return 
	 */
	public function getClinksWithFacilities($settings){

		$limit		= "";

		$order		= 'c.uid';
		
		$sort		= 'asc';
		
		$orderBy	= " ".$order." ".$sort;
	
		$field		= "c.uid, c.title, c.location, c.link, c.clinik_id, c.latitude, c.longitude, r.uid_local as logo, r1.uid_local as image,
					r2.uid_local as mapIcon, c.display_map_content, c.map_content, c.map_icon";

		$table		= "tx_jsclinik_domain_model_clinik as c LEFT JOIN sys_file_reference AS r ON r.uid_foreign = c.logo
						LEFT JOIN sys_file_reference AS r1 ON r1.uid_foreign = c.image 
						LEFT JOIN sys_file_reference AS r2 ON r2.uid_foreign = c.map_icon ";

		$groupBy	= " c.uid";

		$where 		= " c.deleted = 0 AND c.hidden = 0 AND c.sys_language_uid = 0 AND r.deleted = 0 AND r.hidden = 0 AND r1.deleted = 0 AND r1.hidden = 0 
					AND r.fieldname = 'logo' AND r.tablenames = 'tx_jsclinik_domain_model_clinik' AND r1.fieldname = 'image' AND r1.tablenames = 'tx_jsclinik_domain_model_clinik'";		

		//$res	= $this->getDBHandle()->exec_SELECTgetRows($field,$table,$where,$groupBy,$orderBy,$limit);
		
//		echo $this->getDBHandle()->SELECTquery($field,$table,$where,$groupBy,$orderBy);	die;

		$Query = $this->createQuery();
	        
        $Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		
		$sql = 'SELECT '.$field.' from '.$table.' where '.$where.' GROUP BY '.$groupBy.' ORDER BY '.$orderBy;
        
        $Query->statement($sql);
        $res = $this->falImages($Query->execute(), "tx_jsclinik_domain_model_clinik");


		$table1		= "tx_jsclinik_domain_model_facilities as f LEFT JOIN tx_jsclinik_clinik_facilities_mm AS m ON m.uid_foreign = f.uid";

		$groupBy1	= "";

		$data	= array();

		foreach ($res as $key => $value) {
			
			$data[$value['uid']] = $value;
	
			$where1	= " f.deleted = 0 AND f.hidden = 0 AND m.uid_local = ".$value['uid']." ";		
	
			$arr = $this->getDBHandle()->exec_SELECTgetRows("f.uid,f.title",$table1,$where1,""," f.title asc");
			
			$facilities = array();

			foreach ($arr as $val) {
				$facilities[$val['title']] = $val['title'];
			}
			
			$active		= $settings['clinik'] == $value['uid']?"1":"";

			$data[$value['uid']]['active'] 		= $active;
			
			$data[$value['uid']]['facilities'] = $arr;
		}

		return $data;
	}	


	/**
	 * falImages
	 *
	 * @param $result
	 * @param $tablename
	 * @param $fieldname
	 * @return
	 */
    public function falImages($result, $tablename = NULL, $fieldname = NULL)
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setReturnRawQueryResult(TRUE);
        $where = "";
		
        if ($tablename != "") {
            $where = ' AND tablenames = "' . $tablename . '"';
        }
        if ($fieldname != "") {
            $where .= ' AND fieldname IN (' . $fieldname . ')';
        }
        foreach ($result as $key => $value) {
            
            $sysImage = 'SELECT * FROM sys_file_reference WHERE deleted= 0 and hidden = 0 ' . $where . ' AND uid_foreign = ' . $value['uid'] . ' ORDER BY sorting_foreign';
            
            $query->statement($sysImage);
            $sysImages = $query->execute();
            
			$arr = "";
			
            foreach ($sysImages as $key1 => $value1) {
				
                $sysImageDetail = 'SELECT * FROM sys_file WHERE uid = ' . $value1['uid_local'];
                $query->statement($sysImageDetail);
                $sysImageDetail = $query->execute();
                
                $arr[$value1['fieldname']]['identifier']	= $sysImageDetail[0]['identifier'];
                $arr[$value1['fieldname']]['title']			= $value1['title'];
                $arr[$value1['fieldname']]['caption']		= $value1['description'];
                $arr[$value1['fieldname']]['extension']		= $sysImageDetail[0]['extension'];
                $arr[$value1['fieldname']]['mime_type']		= $sysImageDetail[0]['mime_type'];
                $arr[$value1['fieldname']]['name']			= $sysImageDetail[0]['name'];
                $arr[$value1['fieldname']]['uid']			= $sysImageDetail[0]['uid'];
				
				$arr1	= \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode("/", $sysImageDetail[0]['mime_type'], true);	

				$arr[$value1['fieldname']]['mime']		= $arr1[0];
				$arr[$value1['fieldname']]['type']		= $arr1[1];
				
				$arr[$value1['fieldname']]['imageName']	= basename($sysImageDetail[0]['identifier']);
            }
			
            $result[$key]['media'] = $arr;
        }
        
        return $result;
    }
	
	/**
	 * getDBHandle
	 * 
	 * @return 
	 */
	public function getDBHandle() {
		return $GLOBALS['TYPO3_DB'];
	}
}