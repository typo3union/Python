<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Martin <martin.galler@weboffice.co.at>, Weboffice
 *  Pooja <pooja.patel@webofficeindia.com>, Weboffice
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
 *
 *
 * @package voucher
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_Voucher_Domain_Repository_VoucherRepository extends Tx_Extbase_Persistence_Repository {
	
	public function saveRegisterUserData($array){
           
		$GLOBALS['TYPO3_DB']->exec_INSERTquery('tx_voucher_domain_model_vouchercustomer', $array);
           
		return $GLOBALS['TYPO3_DB']->sql_insert_id();
                
	}
	
	public function saveOrderData($array){
		$GLOBALS['TYPO3_DB']->exec_INSERTquery('tx_voucher_domain_model_voucherorder', $array);
		return $GLOBALS['TYPO3_DB']->sql_insert_id();
	}
	
	public function checkRegisterUserData($email){
		$Query = $this->createQuery();
		$Query->getQuerySettings()->setReturnRawQueryResult(TRUE);		
		$Query->statement('SELECT * from tx_voucher_domain_model_vouchercustomer where deleted=0 AND email="'.$email.'" AND hidden=0 AND de_active=0 AND sys_language_uid ='.$GLOBALS['TSFE']->sys_language_uid);
		return $Query->execute();		
	}
	
	public function checkLoginUser($data){		
		$Query = $this->createQuery();
		$Query->getQuerySettings()->setReturnRawQueryResult(TRUE);		
		$Query->statement('SELECT * from tx_voucher_domain_model_vouchercustomer where  deleted=0 AND username="'.$data['username'].'" AND BINARY password="'.$data['password'].'" AND hidden=0 AND de_active=0 AND sys_language_uid ='.$GLOBALS['TSFE']->sys_language_uid);
		return $Query->execute();		
	}
		
	public function getVoucherTemplate($uid,$action){	
		$Query = $this->createQuery();
		$Query->getQuerySettings()->setReturnRawQueryResult(TRUE);		
		$Query->statement('SELECT * from tx_voucher_domain_model_voucher where deleted=0 AND uid='.$uid.' AND hidden=0 AND sys_language_uid ='.$GLOBALS['TSFE']->sys_language_uid);
		if($action=='list'){
			$data = $Query->execute();		 
			return $data[0];
		}else{
			return $Query->execute();		
		}
		
	}
	
	public function newgetVoucherTemplate($uid){	
		$Query = $this->createQuery();
		$Query->getQuerySettings()->setReturnRawQueryResult(TRUE);		
		$Query->statement('SELECT * from tx_voucher_domain_model_voucher where deleted=0 AND uid='.$uid.' AND hidden=0 AND sys_language_uid ='.$GLOBALS['TSFE']->sys_language_uid);
		$data = $Query->execute();		 
		return $data[0];
	}
	
	public function getAllVoucherTemplate(){	
		$Query = $this->createQuery();
		$Query->getQuerySettings()->setReturnRawQueryResult(TRUE);		
		$Query->statement('SELECT * from tx_voucher_domain_model_voucher where deleted=0  AND hidden=0 AND sys_language_uid ='.$GLOBALS['TSFE']->sys_language_uid);
		return $Query->execute();		
	}
	
        public function findAllVoucher(){
                $query = $this->createQuery();
                $constraints[] = $query->logicalAnd(
                $query->equals('deleted', 0),
                $query->equals('hidden', 0)	,
                $query->equals('sys_language_uid',$GLOBALS['TSFE']->sys_language_uid)
                       );
                $query->setOrderings(array("sorting" => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));

                $query->matching($query->logicalAnd($constraints));
                return $query->execute();

                }
               
        public function getTotalprice(){	
		$Query = $this->createQuery();
		$Query->getQuerySettings()->setReturnRawQueryResult(TRUE);		
		$Query->statement('SELECT * from tx_voucher_domain_model_voucher where deleted=0  AND hidden=0 AND sys_language_uid ='.$GLOBALS['TSFE']->sys_language_uid.' ORDER BY sorting');
		return $Query->execute();		
	}
        
         public function Getnoprice(){	
		$Query = $this->createQuery();
		$Query->getQuerySettings()->setReturnRawQueryResult(TRUE);		
		$Query->statement('SELECT * from tx_voucher_domain_model_voucher where deleted=0  AND hidden=0 AND sys_language_uid ='.$GLOBALS['TSFE']->sys_language_uid);
		return $Query->execute();		
	}
        
	
}
?>