<?php
namespace Product\Product\Domain\Repository;

/**
 * *************************************************************
 *
 * Copyright notice
 *
 * (c) 2015
 *
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 * *************************************************************
 */

/**
 * The repository for Products
 */
class ProductRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    public function findCategories($fid)
    {
        $Query = $this->createQuery();
        // Enable below line for debug
        $Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
        if ($fid) {
            $where = 'AND uid=' . $fid . ''; 
        } else {
            $where = '';
        }
        $Query->statement('SELECT * from tx_product_domain_model_category where deleted=0 AND is_sub=1 '.$where.'  AND hidden=0 AND sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid);
        
        return $Query->execute();
    }

    public function findCatid($cid)
    {
        $Query = $this->createQuery();
        // Enable below line for debug
        $Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
        $where = ' find_in_set(' . $cid . ',sub_category) <> 0';
      
        $Query->statement('SELECT * from tx_product_domain_model_category where deleted=0 AND ' . $where . ' AND hidden=0 AND sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid);
        
        return $Query->execute();
    }
    
    

    public function findsubcategoriesId($sid)
    {
        $Query = $this->createQuery();
        // Enable below line for debug
        $Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
        if ($sid) {
            $where = 'AND uid=' . $sid . '';
        } else {
            $where = '';
        }
        $Query->statement('SELECT sub_category from tx_product_domain_model_category where deleted=0 AND hidden=0 '.$where.' AND sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid);
        
        return $Query->execute();
    }

    public function findsubcategories($sub_id)
    {
        if ($sub_id) {
            $where = 'AND uid IN(' . $sub_id . ')';
        } else {
            $where = 'AND uid IN(-1)';
        }
        $Query = $this->createQuery();
        // Enable below line for debug
        $Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
        $Query->statement('SELECT * from tx_product_domain_model_category where deleted=0 AND hidden=0 ' . $where . ' AND sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid);
        
        return $Query->execute();
    }

    public function findProduct($pid)
    {
        $Query = $this->createQuery();
        // Enable below line for debug
        $Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
        
        /*
         * $sql = 'SELECT p.*, r.uid, s.identifier from
         * tx_product_domain_model_product AS p LEFT JOIN sys_file_reference AS r ON r.uid_foreign = p.uid
         * LEFT JOIN sys_file AS s ON r.uid_local = s.uid
         * where p.deleted=0 AND p.hidden=0 AND p.category IN(' . $pid . ') AND p.sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid."
         * AND fieldname = 'featuredImage' OR fieldname = 'image' AND tablenames = 'tx_product_domain_model_product' ";
         */
        
        if ($pid) {
            $where = 'AND p.category IN(' . $pid . ') ';
        } else {
            $where = 'AND uid IN(-1)';
        }
        
        $sql = 'SELECT p.*,r.category_name from tx_product_domain_model_product AS p LEFT JOIN tx_product_domain_model_category AS r ON r.uid = p.category where p.deleted=0 '.$where.' AND  p.hidden=0 AND p.sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid;
        
        $Query->statement($sql);
        $result = $this->FalImage($Query->execute(), "tx_product_domain_model_product");
        
        return $result;
        // return $Query->execute();
    }

    
    
    public function findMenucategory()
    {
        
        $Query = $this->createQuery();
        // Enable below line for debug
        $Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
        $Query->statement('SELECT * from tx_product_domain_model_category where deleted=0 AND in_menu=1 AND hidden=0 AND sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid);
    
        return $Query->execute();
    }
    
    public function findMenu()
    {
        $Query = $this->createQuery();
        // Enable below line for debug
        $Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
        $Query->statement('SELECT * from pages where deleted=0 AND pid=52 AND hidden=0');
    
        return $Query->execute();
    }
    
    public function findMenusecond()
    {
        $Query = $this->createQuery();
        // Enable below line for debug
        $Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
        $Query->statement('SELECT * from pages where deleted=0 AND pid=53 AND hidden=0');
    
        return $Query->execute();
    }
    
    public function findFeatureProduct()
    {
        $Query = $this->createQuery();
        // Enable below line for debug
        $Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
        $sql = 'SELECT * from tx_product_domain_model_product where deleted=0 AND featured_product=1 AND hidden=0 AND sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid;
        $Query->statement($sql);
        $result = $this->FalImage($Query->execute(), "tx_product_domain_model_product");
    
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
            // print_r($sysimages); exit;
            $arr = "";
            foreach ($sysimages as $key1 => $value1) {
                $sysimagedetail = 'SELECT * FROM sys_file WHERE uid = ' . $value1['uid_local'];
                $query->statement($sysimagedetail);
                $sysimagedetail = $query->execute();
                
                $arr[$value1['fieldname']]['imagepath'] = $sysimagedetail[0]['identifier'];
                $arr[$value1['fieldname']]['title'] = $value1['title'];
                $arr[$value1['fieldname']]['caption'] = $value1['description'];
            }
            // print_r($arr); exit;
            $result[$key]['pictures'] = $arr;
            // $result[$key]['images'] = $arr[0];
            // $arr = explode(',', $value['pictures']);
            // $result[$key]['images'] = $arr[0];
        }
        // print_r($result); exit;
        
        return $result;
    }
   
    
}