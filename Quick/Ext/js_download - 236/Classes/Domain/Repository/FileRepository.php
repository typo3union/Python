<?php
namespace JS\JsDownload\Domain\Repository;

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
 * The repository for Files
 */
class FileRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * downloadService
	 *
	 * @var \JS\JsDownload\Service\DownloadService
	 * @inject
	 */
	protected $downloadService = NULL;
	
	/**
	 * getFiles
	 *
	 * @param $settings
	 * @param $file
	 * @param $typeID
	 *
	 * @return 
	 */
	public function getFiles($settings,$file,$typeID){
		
		$this->fullURL	=  \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_SITE_URL');
		
		$this->cObject	= \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tslib_cObj');

		$limit		= "";
				
		if(isset($settings['limit']) && $settings['limit']>0){
			$limit = $settings['limit'];
		}

		$order	= $settings['orderBy'];
		if(empty($settings['orderBy'])) {
			$order = 'uid';
		}
		
		$sort	= $settings['sorting'];		
		if(empty($settings['sorting'])) {
			$sort = 'asc';
		}
		
		$orderBy	= " f.".$order." ".$sort;
	
		$field		= "f.uid, f.title, f.date, f.short_description, f.video, c.title as category, c.title as category, t.title as fileType"; 

		$table		= "tx_jsdownload_domain_model_file as f 
						LEFT JOIN tx_jsdownload_file_category_mm AS m ON f.uid = m.uid_local 
						LEFT JOIN tx_jsdownload_domain_model_category AS c ON m.uid_foreign = c.uid 
						LEFT JOIN tx_jsdownload_domain_model_filetype AS t ON f.file_type = t.uid ";
	
		$groupBy	= "( f.uid )";

		$where		= " ";

		$file = intval($file);
		
		if($file>0){
			$where 		= " AND f.uid =  '".$file."'";
		}else{

			if(isset($settings['storagePID']) && $settings['storagePID']!=""){
				$where .= " AND f.pid in (".$settings['storagePID'].") ";
			}
			
			if(isset($settings['categories']) && $settings['categories']!=""){
				$where 	.= " AND m.uid_foreign IN (".$settings['categories'].")  ";
			}
			
			if($typeID>0) {
				$where 	.= " AND t.uid = ".$typeID." ";
			}
		}
		
		$where 		= " f.deleted = 0 AND f.hidden = 0 AND c.deleted = 0 AND c.hidden = 0 AND t.deleted = 0 AND t.hidden = 0 
						".$where;

		//$res	= $this->getDBHandle()->exec_SELECTgetRows($field,$table,$where,$groupBy,$orderBy,$limit);
		
		$Query = $this->createQuery();
        // Enable below line for debug
        $Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		
		$sql = 'SELECT '.$field.' from '.$table.' where '.$where.' order by '.$orderBy;
        
        $Query->statement($sql);
        $res = $this->falImages($Query->execute(), "tx_jsdownload_domain_model_file");

		$data	= array();

		foreach ($res as $key => $value) {
			
			if(is_array($value['media'])){

				if($value['video']==1){
					$fuid = $value['media']['video_mp4']['uid'];
					if($fuid==""){
						$fuid = $value['media']['video_webm']['uid'];
						if($fuid==""){
							$fuid = $value['media']['video_ogg']['uid'];
						}
					}
					$mime = "video";
				}else{
					$fuid = $value['media']['media']['uid'];
					$mime = $value['media']['media']['mime'];;
				}
				
				$link['additionalParams']	= "&tx_jsdownload_download[action]=download&tx_jsdownload_download[file]=".$value['uid'];
				$link['returnLast']			= 'url'; 
				$link['parameter']			= $GLOBALS['TSFE']->id;
				$detailLink					= $this->fullURL.$this->cObject->typolink(NULL, $link);
				
				$configurations['additionalParams']	= '&tx_jsdownload_download[action]=download&tx_jsdownload_download[docID]=' . base64_encode($fuid).'&tx_jsdownload_download[media]=' . base64_encode($value['uid']);
				
				$configurations['returnLast']		= 'url';
				$configurations['parameter']		= $GLOBALS['TSFE']->id;
				$downlonadLink						= $this->fullURL.$this->cObject->typolink(NULL, $configurations);
				
				$data[$value['uid']]					= $value;
				$data[$value['uid']]['mime']			= $mime;
				$data[$value['uid']]['detailLink']		= $detailLink;
				$data[$value['uid']]['downlonadLink']	= $downlonadLink;
			}
		}
		
		if($file>0){
			return $data[$file];
		}

		return $data;
	}
	
	
	/**
	 * getFileTypes
	 *
	 * @param $settings
	 * @param $fileType
	 *
	 * @return 
	 */
	public function getFileTypes($settings,$fileType){
		
		$this->fullURL	=  \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_SITE_URL');
		
		$this->cObject	= \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tslib_cObj');

		$limit		= "";
				
		$orderBy	= " t.uid asc ";
	
		$field		= " t.uid, t.title, t.icon, r.uid as reference"; 

		$table		= "tx_jsdownload_domain_model_filetype as t 
						LEFT JOIN sys_file_reference AS r ON r.uid_foreign = t.uid 
						LEFT JOIN sys_file AS s ON r.uid_local = s.uid ";		
	
		$groupBy	= "";

		$where		= " ";

		$fileType = intval($fileType);
		
		$where 		= " t.deleted = 0 AND t.hidden = 0 AND r.deleted = 0 AND r.hidden = 0 AND fieldname = 'icon' AND tablenames = 'tx_jsdownload_domain_model_filetype' ".$where;

		$res	= $this->getDBHandle()->exec_SELECTgetRows($field,$table,$where,$groupBy,$orderBy,$limit);
		
//		echo $this->getDBHandle()->SELECTquery($field,$table,$where,$groupBy,$orderBy);	die;

		$data	= array();

		foreach ($res as $key => $value) {
			
			$link['additionalParams']	= "&tx_jsdownload_download[action]=download&tx_jsdownload_download[type]=".$value['uid'];
			$link['returnLast']			= 'url'; 
			$link['parameter']			= $GLOBALS['TSFE']->id;
			$detailLink					= $this->fullURL.$this->cObject->typolink(NULL, $link);
			

			$data[$value['uid']]					= $value;
			$data[$value['uid']]['active']			= $value['uid']==$fileType?"active":"";
			$data[$value['uid']]['detailLink']		= $detailLink;
		}
		
		return $data;
	}	
	
	/**
	 * downloadFile
	 *
	 * @param $id
	 * @param $media
	 * @param $path
	 * @return
	 */
	public function downloadFile($id,$media, $path) {
		
		$table = 'tx_jsdownload_domain_model_file';
		
		$where = " uid = ".$media;		
		
		$res = $this->getDBHandle()->exec_SELECTgetRows('no_of_download', $table,$where);
		
		$fields_values = array("no_of_download" => ($res[0]['no_of_download']+ 1));

		$this->getDBHandle()->exec_UPDATEquery ($table, $where,$fields_values);

		/*
			$sql 	= "UPDATE tx_jsdownload_domain_model_file SET no_of_download=no_of_download + 1 WHERE uid = ".$media;		
			
			$query = $this->createQuery();
			$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
			$query->statement($sql); 
			$query->execute(); 
		*/
		$resArr = $this->getDBHandle()->exec_SELECTgetRows('*', 'sys_file', 'uid in (\'' . $id . '\')');
		
		if (count($resArr) > 0) {
			$fullPath = $_SERVER['DOCUMENT_ROOT'] . "/".$path . $resArr[0]['identifier'];
			$image = $resArr[0]['name'];
			$this->downloadService->download($fullPath, $image);
		} else {
			$this->downloadService->noAccess();
		}
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