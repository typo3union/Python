<?php
namespace JS\JsCareer\Domain\Repository;

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
 * The repository for Jobs
 */
class JobRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * careerService
	 *
	 * @var \JS\JsCareer\Service\CareerService
	 * @inject
	 */
	protected $careerService = NULL;

	protected $downloadService = NULL;

	/**
	 * getJobsList
	 *
	 * @param $settings
	 * @param $order
	 * @param $search
	 * @return
	 */
	public function getJobsList($settings, $order, $search,$klinik) {
		

		$limit	= "";
				
		if(isset($settings['limit']) && $settings['limit']>0){
			$limit = $settings['limit'];
		}
		
		//$orderBy	= " j.join_date asc";
		$orderBy	= "j.join_date asc , j.ab_sofort asc , j.text asc ";
		
		if(isset($order) && $order!=""){
			//$orderBy	= " j.join_date ".$order;
			$orderBy	= "j.join_date ".$order.", j.ab_sofort ".$order.", j.text  ".$order;
		}
		
		$field		= "j.uid, j.title, j.place, j.timing, j.ab_sofort, j.text_check, j.join_check, j.join_date, j.text, j.contract, c.title as clinik"; 

		$table		= "tx_jscareer_domain_model_job as j
						LEFT JOIN tx_jscareer_domain_model_clinik AS c ON c.uid = j.caetgory ";
	
		$groupBy	= "";

		$where		= " ";		
		
		if(isset($search) && $search!=""){
			$where	.= " AND j.title  LIKE '%".$search."%' ";
		}
		
		if(isset($klinik) && $klinik!="" && $klinik!="0"){
			$where	.= " AND c.uid=".$klinik;
		}			

		if(isset($settings['storagePID']) && $settings['storagePID']!=""){
			$where .= " AND j.pid in (".$settings['storagePID'].") ";
		}
		
		
		$where 		= " j.deleted = 0 AND j.hidden = 0 AND c.deleted = 0 AND c.hidden = 0 ".$where;

		$res	= $this->getDBHandle()->exec_SELECTgetRows($field,$table,$where,$groupBy,$orderBy,$limit);
		
		//echo 	$this->getDBHandle()->SELECTquery($field,$table,$where,$groupBy,$orderBy);	die;

		$data	= array();

		foreach ($res as $key => $value) {
			
			$link['additionalParams']	= "&tx_jscareer_career[action]=job&tx_jscareer_career[job]=".$value['uid'];
			$link['returnLast']			= 'url'; 
			$link['parameter']			= $GLOBALS['TSFE']->id;
			$detailLink					= $settings['fullURL'].$settings['cObject']->typolink(NULL, $link);
			
			$data[$value['uid']]					= $value; 
			$data[$value['uid']]['detailLink']		= $detailLink;
			
		}

		return $data;
	}
	
	/**
	 * getJobsDetail
	 *
	 * @param $settings
	 * @param $jobId	
	 *
	 * @return 
	 */
	public function getJobsDetail($settings,$jobId){
		
		$orderBy	= "";
														 
		$field		= "j.uid, j.title, j.place, j.join_date, j.timing, j.text_check, j.join_check, j.text, j.ab_sofort, j.contract, j.short_description, j.description_header, j.description_part1, j.description_part2, c.title as clinik, GROUP_CONCAT(m.uid_foreign) as manager"; 

		$table		= "tx_jscareer_domain_model_job as j
						LEFT JOIN tx_jscareer_domain_model_clinik AS c ON c.uid = j.caetgory 
						LEFT JOIN tx_jscareer_job_manager_mm AS m ON m.uid_local = j.uid ";
	
		$groupBy	= "m.uid_local";

		$where 		= " AND j.uid =  '".$jobId."'";

		$where 		= " j.deleted = 0 AND j.hidden = 0 AND c.deleted = 0 AND c.hidden = 0 ".$where;

		//$res	= $this->getDBHandle()->exec_SELECTgetRows($field,$table,$where,$groupBy,$orderBy,$limit);


		$Query = $this->createQuery();
        
        $Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		
		$sql = 'SELECT '.$field.' from '.$table.' where '.$where.'  GROUP BY '.$groupBy; 
        
        $Query->statement($sql);
        $res = $this->falImages($Query->execute(), "tx_jscareer_domain_model_job");

		$orderBy1	= "";
	
		$field1		= "m.uid, m.name, m.designation, m.phone, m.email, m.voraussetzungen, r.uid as picture"; 

		$table1		= "tx_jscareer_domain_model_manager as m
						LEFT JOIN sys_file_reference AS r ON r.uid_foreign = m.uid  ";
	
		$groupBy1	= "";

		$where1 		= " m.uid in (".$res[0]['manager'].") AND m.deleted = 0 AND m.hidden = 0 AND r.deleted = 0 AND r.hidden = 0 AND r.fieldname = 'picture' AND tablenames = 'tx_jscareer_domain_model_manager' ";

		
		$res1	= $this->getDBHandle()->exec_SELECTgetRows($field1,$table1,$where1,$groupBy1,$orderBy1);
		
//		echo $this->getDBHandle()->SELECTquery($field1,$table1,$where1,$groupBy1,$orderBy1); die;
		

		foreach ($res1 as $key => $value) {
			
			$data[$value['uid']]		= $value;
		}
		
		$res[0]['manager'] = $data; 
		
		return $res[0];
	}
	
	/**
	 * insertUserData
	 *
	 * @param $insertArray
	 * @return 
	 */
	public function insertUserData($insertArray) {
		
		$this->getDBHandle()->exec_insertQuery('tx_jscareer_domain_model_applicant',$insertArray);
		return $GLOBALS['TYPO3_DB']->sql_insert_id($newSysRes);
	}	
	
	/**
	 * myFileOperationsFal
	 *
	 * @param $myFileOperationsFal
	 * @param $filetype
	 * @param $filesize
	 * @param $uidNew
	 * @param $storagePID
	 * @return 
	*/	
	public function myFileOperationsFal($filename, $filetype, $filesize, $uidNew, $storagePID){
		
		$newSysFields = array(
			'pid'			=> 0,
			'identifier'	=>'/user_upload/career/'.$filename,
			'mime_type'		=> $filetype,
			'extension'		=> 'pdf',
			'name'			=> $filename,
			'size'			=> $filesize,
			'storage'		=> 1,
			'creation_date' => $GLOBALS['EXEC_TIME'],
			'tstamp'		=> $GLOBALS['EXEC_TIME']
		);
		
		$newSysRes = $GLOBALS['TYPO3_DB']->exec_INSERTquery('sys_file', $newSysFields);
		
		$uid_local = $GLOBALS['TYPO3_DB']->sql_insert_id($newSysRes); 
		
		$newRefFields = array(
		
			'pid' 			=> $storagePID,
			'tablenames'	=> 'tx_jscareer_domain_model_applicant',
			'uid_foreign'	=> $uidNew,
			'uid_local'		=> $uid_local,
			'table_local'	=> 'sys_file',
			'fieldname'		=> 'resume',
			'crdate'		=> $GLOBALS['EXEC_TIME'],
			'tstamp'		=> $GLOBALS['EXEC_TIME']
		);
		
		return $GLOBALS['TYPO3_DB']->exec_INSERTquery('sys_file_reference', $newRefFields);
	}
	
	/**
	 * getManagerEmails
	 *
	 * @param $jobId	
	 *
	 * @return 
	 */
	public function getManagerEmails($jobId){
		
		
		$orderBy	= "";
	
		$field		= "	m.name, m.email"; 

		$table		= "tx_jscareer_domain_model_job as j
						LEFT JOIN tx_jscareer_job_manager_mm AS mm ON mm.uid_local = j.uid 
						LEFT JOIN tx_jscareer_domain_model_manager AS m ON m.uid = mm.uid_foreign ";


		$where 		= " AND j.uid =  '".$jobId."'";

		$where 		= " j.deleted = 0 AND j.hidden = 0 AND m.deleted = 0 AND m.hidden = 0 ".$where;

		$res	= $this->getDBHandle()->exec_SELECTgetRows($field,$table,$where,$groupBy,$orderBy,$limit);

		return $res;
		
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
	public function getClinikList($settings){					
		/*
		$field = 'title,uid';
		$table = 'tx_jscareer_domain_model_clinik';
		$where = " deleted=0 AND hidden=0 ";
		$groupBy = 'title';
		$orderBy = '';
		$limit = '';
				
		if(isset($settings['storagePID']) && $settings['storagePID']!=""){
			$where .= " AND pid in (".$settings['storagePID'].") ";
		}
		
		*/
		$field	 = "c.title,c.uid"; 
		$table	 = "tx_jscareer_domain_model_job as j LEFT JOIN tx_jscareer_domain_model_clinik AS c ON c.uid = j.caetgory ";
		$groupBy = "title";
		$orderBy = "";
		$limit   = "";
		$where 	 = "";

		$where 	.= " j.deleted = 0 AND j.hidden = 0 AND c.deleted = 0 AND c.hidden = 0 ";
		if(isset($settings['storagePID']) && $settings['storagePID']!=""){
			$where .= " AND j.pid in (".$settings['storagePID'].") ";
		}
		
		$res	= $this->getDBHandle()->exec_SELECTgetRows($field,$table,$where,$groupBy,$orderBy,$limit);
		//echo $this->getDBHandle()->SELECTquery($field,$table,$where,$groupBy,$orderBy,$limit); die;
		return $res;
		
	}

}
