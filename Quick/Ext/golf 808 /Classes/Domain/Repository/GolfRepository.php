<?php
namespace Golf\Golf\Domain\Repository;


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
 * The repository for Golves
 */
class GolfRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {


	public function findgolf()
    {

        $Query = $this->createQuery();
        // Enable below line for debug
        $Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
        $sql = 'SELECT * from tx_golf_domain_model_golf where deleted=0 AND hidden=0 AND sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid;
    	
    	$Query->statement($sql);
        $result = $this->FalImage($Query->execute(), "tx_golf_domain_model_golf");
        
        return $result;
    }
	

    public function findgolfdetail($id)
    {

        $Query = $this->createQuery();
        // Enable below line for debug
        $Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
         $sql = 'SELECT * from tx_golf_domain_model_golf where  uid='.$id.' AND deleted=0 AND hidden=0 AND sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid;
        
        $Query->statement($sql);
        $result = $this->FalImage($Query->execute(), "tx_golf_domain_model_golf");
       
        $where1 = 'uid >'.$id;
        $next = $GLOBALS['TYPO3_DB']->exec_SELECTgetSingleRow('uid','tx_golf_domain_model_golf',$where1);
        $where2 = 'uid <'.$id;
        $prev = $GLOBALS['TYPO3_DB']->exec_SELECTgetSingleRow('uid','tx_golf_domain_model_golf',$where2,'','uid desc');

        $result[0]['next'] = $next['uid'];
        $result[0]['prev'] = $prev['uid'];

        return $result;
    }
    

	public function FalImage($result, $tablename = NULL, $fieldname = NULL)
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
            
            $sysimage = 'SELECT * FROM sys_file_reference WHERE deleted= 0 and hidden = 0 ' . $where . ' AND uid_foreign = ' . $value['uid'] . ' ORDER BY sorting_foreign';
            
            $query->statement($sysimage);
            $sysimages = $query->execute();
            //echo '<pre>'; print_r($sysimages); exit;
            $arr = "";
            foreach ($sysimages as $key1 => $value1) {
                $sysimagedetail = 'SELECT * FROM sys_file WHERE uid = ' . $value1['uid_local']; 
                $query->statement($sysimagedetail);
                $sysimagedetail = $query->execute();
                //echo '<pre>'; print_r($key1); echo '</pre>';
                $arr[$value1['fieldname']][$value1['uid']]['imagepath'] = $sysimagedetail[0]['identifier'];
                $arr[$value1['fieldname']][$value1['uid']]['title'] = $value1['title'];
                $arr[$value1['fieldname']][$value1['uid']]['caption'] = $value1['description'];
            }

           // echo '<pre>'; print_r($arr); exit;
            $result[$key]['pictures'] = $arr;
            // $result[$key]['images'] = $arr[0];
            // $arr = explode(',', $value['pictures']);
            // $result[$key]['images'] = $arr[0];
        }
        // print_r($result); exit;
        
        return $result;
    }
	
}