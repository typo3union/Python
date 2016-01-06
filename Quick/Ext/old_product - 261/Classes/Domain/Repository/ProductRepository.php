<?php
namespace Product\Product\Domain\Repository;


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
 * The repository for Products
 */
class ProductRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

    public function findcategories()
    {
        $Query = $this->createQuery();
        // Enable below line for debug
        $Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
        $Query->statement('SELECT * from tx_product_domain_model_category where deleted=0 AND hidden=0 AND sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid);
    
        return $Query->execute();
    }
    
    
    public function findProducts()
    {
        $Query = $this->createQuery();
        // Enable below line for debug
        $Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
        $sql = $Query->statement('SELECT * from tx_product_domain_model_product where deleted=0 AND hidden=0 AND sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid);
        //$result = $this->FalImage($Query->execute(), "tx_product_domain_model_product");
    
        return $Query->execute();
    }
    
    public function findFeatureProduct()
    {
        $Query = $this->createQuery();
        // Enable below line for debug
    
        $Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
        $sql = $Query->statement('SELECT * from tx_product_domain_model_product where deleted=0 AND featured_product=1 AND hidden=0 AND sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid);
        // $result = $this->FalImage($Query->execute(), "tx_product_domain_model_product");
    
        return $Query->execute();
    }
    
    public function findCat($cid)
    {
        $Query = $this->createQuery();
        // Enable below line for debug
        if($cid){
            $where = 'AND uid = '.$cid.'';
        }else{
            $where = '';
        }
        $Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
    
        $Query->statement('SELECT * from tx_product_domain_model_category where deleted=0  '.$where.' AND hidden=0 AND sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid);
         
        return $Query->execute();
    }
    
    public function findshowProduct($pid)
    {
         
        $Query = $this->createQuery();
        if($pid){
            $where = 'AND uid = '.$pid.'';
        }else{
            $where = '';
        }
        $Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
    
        $sql1 = $Query->statement('SELECT * from tx_product_domain_model_product where deleted=0 '.$where.'  AND hidden=0 AND sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid);
        // $result = $this->FalImage($Query->execute(), "tx_product_domain_model_product");
    
        return $Query->execute();
    }
    
    
    public function findCatbyID($id)
    {
        if($pid){
            $where = 'where uid_foreign = '.$id.'';
        }else{
            $where = '';
        }
         
        $Query = $this->createQuery();
        // Enable below line for debug
    
        $Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
    
        $sql1 = $Query->statement('SELECT * from tx_product_product_category_mm '.$where);
        return $Query->execute();
    }
    
}