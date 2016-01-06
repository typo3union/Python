<?php
namespace TYPO3\CompanyManagement\Domain\Repository;

ini_set('display_errors', 1);
ini_set('allow_url_fopen ', 'ON');

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Andreas Predl <andreas.predl@weboffice.co.at >, WEBOFFICE AUSTRIA
 *           Pooja Patel <pooja.patel@webofficeindia.com>, WEBOFFICE
 *           Ghanshyam Gohel <ghanshyam.gohel@webofficeindia.com>, WEBOFFICE
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
 * The repository for Companies
 */
class CompanyRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
	
	
	public function findAllFilterCompany($sort){
		$query = $this->createQuery();
		$date = new \DateTime('today');
		$org_date = $date->format('Y-m-d');
		$str_date = strtotime($org_date);
		$constraints[] = $query->logicalAnd(
			$query->equals('deleted', 0),
			$query->equals('hidden', 0)	,
			$query->equals('sys_language_uid',$GLOBALS['TSFE']->sys_language_uid),
			$query->equals('display_mode',0)						
        );		
		$constraints[] =$query->logicalOr(
			$query->equals('access_date', NULL),
			$query->equals('access_date', 0),
			$query->greaterThanOrEqual('access_date',$str_date)
			);     
		
		if(isset($sort)){
				if($sort==0){
					$query->setOrderings(array("branch" => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
				}
				if($sort==1){
					$query->setOrderings(array("name" => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
				}
				if($sort==2){
					$query->setOrderings(array("name" => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
				}	
				if($sort==3){
					$query->setOrderings(array("zip" => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
				}
				if($sort==4){
					$query->setOrderings(array("employee" => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
				}
							
			}   
		
		$query->matching($query->logicalAnd($constraints));
		return $query->execute();
	}
	
	public function findAllNews(){
		$Query = $this->createQuery();
		 //Enable below line for debug
		$Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		
		$Query->statement('SELECT uid,title,datetime as date  from tx_news_domain_model_news where  deleted=0 AND hidden=0 AND sys_language_uid ='.$GLOBALS['TSFE']->sys_language_uid.' ORDER BY datetime DESC'); 
		return $Query->execute();
	}	
	
	public function findAllNewsCompanyWithDetailLink(){	
		
		$query = $this->createQuery();
		$date = new \DateTime('today');
		$org_date = $date->format('Y-m-d');
		$str_date = strtotime($org_date);
			
		$Query = $this->createQuery();
		 //Enable below line for debug
		$Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		
		$Query->statement('SELECT f.name as image,c.uid,c.name,c.latest_date as date from 
		tx_companymanagement_domain_model_company as c 
		INNER JOIN sys_file_reference as fr ON fr.uid_foreign=c.uid 
		INNER JOIN sys_file as f ON f.uid=fr.uid_local 
		where c.deleted=0 AND c.hidden=0 AND c.display_mode=0 AND (c.access_date =0 OR c.access_date=NULL OR c.access_date>='.$str_date.') AND fr.deleted=0 AND fr.hidden=0  AND fr.fieldname="logo" AND fr.tablenames="tx_companymanagement_domain_model_company" AND c.sys_language_uid ='.$GLOBALS['TSFE']->sys_language_uid.' AND fr.sys_language_uid ='.$GLOBALS['TSFE']->sys_language_uid.' ORDER BY c.crdate DESC'); 
		return $Query->execute();
		
	}
	
	public function findFirstLetterName($where){		
		$Query = $this->createQuery();
		
		$date = new \DateTime('today');
		$org_date = $date->format('Y-m-d');
		$str_date = strtotime($org_date);
			
		 //Enable below line for debug
		$Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		
		$Query->statement('SELECT name from tx_companymanagement_domain_model_company 
		where deleted=0 AND hidden=0 AND '.$where.' AND ( access_date =0 OR access_date= 0 OR access_date>= '.$str_date.') AND sys_language_uid ='.$GLOBALS['TSFE']->sys_language_uid.' ORDER BY name'); 
		return $Query->execute();
			
	}
	
	public function findAllPresentStates($where){
		
		$Query = $this->createQuery();
		
		$date = new \DateTime('today');
		$org_date = $date->format('Y-m-d');
		$str_date = strtotime($org_date);
		
		 //Enable below line for debug
		$Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		
		$Query->statement('SELECT DISTINCT state_id from tx_companymanagement_domain_model_company 
		where deleted=0 AND hidden=0 AND '.$where.' AND ( access_date =0 OR access_date=NULL OR access_date>= '.$str_date.') AND sys_language_uid ='.$GLOBALS['TSFE']->sys_language_uid.''); 
		return $Query->execute();
			
	}
	
	public function findAllPresentStatesName($uids){
		
		$Query = $this->createQuery();
		$Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		
		$Query->statement('SELECT name,uid from tx_companymanagement_domain_model_state where deleted=0 AND hidden=0 AND uid IN('.$uids.') AND sys_language_uid ='.$GLOBALS['TSFE']->sys_language_uid.''); 
		return $Query->execute();
			
	}
	
	public function findAllPreviewCompany(){
		$query = $this->createQuery();
		$date = new \DateTime('today');
		$org_date = $date->format('Y-m-d');
		$str_date = strtotime($org_date);
		$constraints[] = $query->logicalAnd(
			$query->equals('deleted', 0),
			$query->equals('hidden', 0)	,
			$query->equals('sys_language_uid',$GLOBALS['TSFE']->sys_language_uid),
			$query->equals('display_mode',2)						
        );
		$query->matching($query->logicalAnd($constraints));
		return $query->execute();
	}	
	
	public function findAllHistoricalCompany($sort,$stateId,$alpha){
			
		$query = $this->createQuery();
		$date = new \DateTime('today');
		$org_date = $date->format('Y-m-d');
		$str_date = strtotime($org_date);
		$constraints[] = $query->logicalAnd(
			$query->equals('deleted', 0),
			$query->equals('hidden', 0)	,
			$query->equals('sys_language_uid',$GLOBALS['TSFE']->sys_language_uid)
        );		
		$constraints[] =$query->logicalOr(
			$query->equals('access_date', NULL),
			$query->equals('access_date', 0),
			$query->greaterThanOrEqual('access_date',$str_date)
		); 
		$constraints[] =$query->logicalNot(
			$query->equals('display_mode',2)	
		);  
		
		if(isset($stateId)){
			if($stateId !=0){
				$constraints[] = $query->logicalAnd(
					$query->equals('state_id', $stateId)
			    );
			}			
		}
		
		if(isset($alpha)){
			$constraints[] = $query->logicalAnd(
			$query->like('name', $alpha.'%')
        );
		} 
		
		
		if(isset($sort)){
			if($sort==0){
				$query->setOrderings(array("branch" => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
			}
			if($sort==1){
				$query->setOrderings(array("name" => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
			}
			if($sort==2){
				$query->setOrderings(array("name" => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
			}	
			if($sort==3){
				$query->setOrderings(array("zip" => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
			}
			if($sort==4){
				$query->setOrderings(array("employee" => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
			}						
		}else{
			$query->setOrderings(array("display_mode" => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));		
		}
		$query->matching($query->logicalAnd($constraints));
		return $query->execute();
	}
	
	public function findAllSearchResults($keywoed){	
		$date = new \DateTime('today');
		$org_date = $date->format('Y-m-d');
		$str_date = strtotime($org_date);	
		$Query = $this->createQuery();
		 //Enable below line for debug
		$Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		
		$Query->statement("
(SELECT p.uid,p.title,tc.bodytext as description,'page' as 'type', 'pages' as 'table' FROM pages as p
INNER JOIN tt_content as tc ON p.uid=tc.pid 
WHERE (tc.bodytext LIKE '%".$keywoed."%'
OR  p.title LIKE '%".$keywoed."%')
AND p.no_search=0 AND p.hidden=0 AND p.deleted=0
AND p.nav_hide=0
AND tc.hidden=0 AND tc.deleted=0
AND sys_language_uid =".$GLOBALS['TSFE']->sys_language_uid."
GROUP BY p.uid
)

UNION

(SELECT uid,title,bodytext, 'news' as 'type','tx_news_domain_model_news' as 'table' FROM tx_news_domain_model_news
WHERE ( bodytext LIKE '%".$keywoed."%' 
OR title LIKE '%".$keywoed."%')
AND hidden=0 AND deleted=0
AND sys_language_uid =".$GLOBALS['TSFE']->sys_language_uid."
GROUP BY uid
)

UNION

(SELECT uid,name,company_profile as description, 'company' as 'type','tx_companymanagement_domain_model_company' as 'table' FROM tx_companymanagement_domain_model_company
WHERE ( company_profile LIKE '%".$keywoed."%' 
OR name LIKE '%".$keywoed."%'
OR products_and_services LIKE '%".$keywoed."%'
OR chronicle LIKE '%".$keywoed."%'
OR award LIKE '%".$keywoed."%')
AND display_mode=0
AND (access_date =0 OR access_date=NULL OR access_date>=".$str_date.")
AND hidden=0 AND deleted=0
AND sys_language_uid =".$GLOBALS['TSFE']->sys_language_uid."
GROUP BY uid
)

UNION

(SELECT uid,name,description, 'statement' as 'type','tx_companymanagement_domain_model_statement' as 'table' FROM tx_companymanagement_domain_model_statement
WHERE (description LIKE '%".$keywoed."%' 
OR name LIKE '%".$keywoed."%'
OR designation LIKE '%".$keywoed."%'
OR state_prependtext LIKE '%".$keywoed."%')
AND hidden=0 AND deleted=0
GROUP BY uid
)

		
	"); 
		return $Query->execute();
		
	}	
	
		
  public function findByUidForMeta($uid){		
		$Query = $this->createQuery();
		
		$date = new \DateTime('today');
		$org_date = $date->format('Y-m-d');
		$str_date = strtotime($org_date);
			
		 //Enable below line for debug
		$Query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		
		$Query->statement('SELECT * from tx_companymanagement_domain_model_company  where deleted=0 AND hidden=0 AND uid='.$uid.' AND sys_language_uid ='.$GLOBALS['TSFE']->sys_language_uid.' ORDER BY name'); 
		return $Query->execute();
			
	}
}


