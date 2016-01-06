<?php
namespace TYPO3\CompanyManagement\Controller;


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
 * CompanyController
 */
 
use \TYPO3\CMS\Core\Utility\GeneralUtility; 
class CompanyController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * companyRepository
	 *
	 * @var \TYPO3\CompanyManagement\Domain\Repository\CompanyRepository
	 * @inject
	 */
	protected $companyRepository = NULL;
	
	
	/**
	 * statementRepository
	 *
	 * @var \TYPO3\CompanyManagement\Domain\Repository\StatementRepository
	 * @inject
	 */
	protected $statementRepository;
	
	
	/**
	 * stateRepository
	 *
	 * @var \TYPO3\CompanyManagement\Domain\Repository\StateRepository
	 * @inject
	 */
	protected $stateRepository;
	
		
	/**
	 * action list
	 *
	 * @return void
	 */
	

	public function listAction() {
		if(TYPO3_MODE === 'FE') {	
			$pageType = GeneralUtility::_GP('type'); 
			$sort = GeneralUtility::_GP('sort'); 
			$where = ' display_mode=0';
							
			$companies = $this->companyRepository->findAllFilterCompany($sort);
			$statesIds = $this->companyRepository->findAllPresentStates($where);	
			$companyNames = $this->companyRepository->findFirstLetterName($where);		
			
			foreach($companyNames as $key=>$value){
				$companyNames[$key]['name'] = strtoupper(substr(utf8_encode($value['name']),0,1));				
			}	
			
			$companyNames =array_unique($companyNames,SORT_REGULAR);
			
			
			$names = array();
			array_walk_recursive($companyNames, function($item) use (&$names) {
				$names[] = $item;
			});	
			
								
			foreach($statesIds as $key=>$value){	
				$state[] =$value['state_id'];				
			}						
			$stateUid = implode(',',$state);
			
			$stateNames = $this->companyRepository->findAllPresentStatesName($stateUid);
									
			$this->view->assignMultiple(array(
					'companies'  => $companies,	
					'states'	 => $stateNames,			
					'pageType'   => $pageType,
					'companyNames' =>$names,
					'stateNames' => $stateNames
			));				
			
		}
	}

	/**
	 * action show
	 *
	 * @param \TYPO3\CompanyManagement\Domain\Model\Company $company
	 * @return void
	 */
	public function showAction() {
		if(TYPO3_MODE === 'FE') {			
			$uriArr = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_companymanagement_fecompanymanagement');	
			if(!empty($uriArr['uid'])){
				$uid = $uriArr['uid'];
			}else{
				$uid = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('uid');
			}
		
		$company = $this->companyRepository->findByUid($uid);			
		$company_statement = $this->statementRepository->findStatementByUid($uid);	
		
		$meta = $this->companyRepository->findByUidForMeta($uid);
		$meta = $meta[0];
		$curUrl = $this->uriBuilder->getRequest()->getRequestUri();
		$baseUrl = $GLOBALS['TSFE']->baseUrl;
		//$this->response->addAdditionalHeaderData('<meta name="keywords" content="'.$seo[keywords].'"/>');
		
		$data = strip_tags($meta['company_profile']);
		$data = \TYPO3\CMS\Core\Utility\GeneralUtility::fixed_lgd_cs($data,500); 
		
		if(isset($uid)){
			$this->response->addAdditionalHeaderData('
					<meta property="og:title" content="'.$meta['name'].'" />
					<meta property="og:type" content="article" />
					<meta property="og:url" content="'.$curUrl.'" />
					<meta property="og:description" content="'.$data.'" />'
			);		
		}
			$this->view->assignMultiple(array(
					'company'  => $company,	
					'company_statement'	 => $company_statement[0],			
					'currentUrl'   => $curUrl,
					'baseUrl'  => $baseUrl
			));
			
		}
	}
	
	public function googlemapAction(){		 
		
		$arguments = $this->request->getArguments();
		
		
		$city = urlencode($arguments['city']);
		$street = urlencode($arguments['street']);
		$title = urlencode($arguments['title']);
		$plz = $arguments['plz'];
		
		$iframe_width = '324px'; 
		$iframe_height = '431px'; 
				
		$street = str_replace(" ", "+", $street);
		$city = str_replace(" ", "", $city);
		
		$address = $street.' '.$city.' '.$plz; 
		$address = str_replace(" ", "+", $address);
	
		$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=".$address."&sensor=true");
		$json = json_decode($json);					
				
		$lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
		$long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
		
	
		$iframe = '		
			<style>
				body{margin:0px !important;}		
			</style>	
			<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
			<script type="text/javascript">
			function initialize() {
				var loc, map, marker, infobox;
				
				loc = new google.maps.LatLng('.$lat.', '.$long.');
				
				map = new google.maps.Map(document.getElementById("map"), {
					 zoom: 14,
					 center: loc,
					 mapTypeId: google.maps.MapTypeId.ROADMAP
				});
				
				marker = new google.maps.Marker({
					map: map,
					position: loc,
					visible: true
				});
			}
			google.maps.event.addDomListener(window, \'load\', initialize);
			</script>
			<div id="map" style="width: 100%; height: 100%"></div>
			';

		echo $iframe;	exit;

	}
	
	public function newsAction() {
		if(TYPO3_MODE === 'FE') {			
			$newsCount = $this->settings['newsCount'];
			$news = $this->companyRepository->findAllNews();
			$companies = $this->companyRepository->findAllNewsCompanyWithDetailLink();
							
			$news_sort = array_merge($news,$companies);				
			function array_sort($array, $on, $order=SORT_ASC)
			{
				$new_array = array();
				$sortable_array = array();
			
				if (count($array) > 0) {
					foreach ($array as $k => $v) {
						if (is_array($v)) {
							foreach ($v as $k2 => $v2) {
								if ($k2 == $on) {
									$sortable_array[$k] = $v2;
								}
							}
						} else {
							$sortable_array[$k] = $v;
						}
					}
			
					switch ($order) {
						case SORT_ASC:
							asort($sortable_array);
						break;
						case SORT_DESC:
							arsort($sortable_array);
						break;
					}
			
					foreach ($sortable_array as $k => $v) {
						$new_array[$k] = $array[$k];
					}
				}
			
				return $new_array;
			}
			
			$news_sort = array_sort($news_sort, 'date', SORT_DESC);
			$news_sort = array_slice($news_sort, 0, $newsCount); 
			$this->view->assign('news_sort', $news_sort);		
		}
	}
	
	public function previewAction() {
		if(TYPO3_MODE === 'FE') {		
							
			$companies = $this->companyRepository->findAllPreviewCompany($sort);			
									
			$this->view->assignMultiple(array(
					'companies'  => $companies,					
			));			
			
		}
	}
	
	public function historicalListAction() {
		if(TYPO3_MODE === 'FE') {		
							
			$pageType = GeneralUtility::_GP('type'); 
			$g_stateId = GeneralUtility::_GP('stateId'); 			
			$sort = GeneralUtility::_GP('sort'); 
			$where = ' display_mode !=2';
			$f_stateId = $this->settings['stateId'];
			if(isset($g_stateId)){
				if($g_stateId=='0'){
					$stateId = '';
				}else{
					$stateId = $g_stateId;
					$where = ' display_mode !=2 AND state_id='.$stateId;
				}				
				
			}else{
				if($f_stateId){
					$stateId = $f_stateId;
					$where = ' display_mode !=2 AND state_id='.$stateId;
				}else{
					$stateId = '';
				}
				
			}
			$alpha = GeneralUtility::_GP('alpha'); 
						
			$companies = $this->companyRepository->findAllHistoricalCompany($sort,$stateId,$alpha);
			$statesIds = $this->companyRepository->findAllPresentStates($where);	
			$companyNames = $this->companyRepository->findFirstLetterName($where);
			
			foreach($companyNames as $key=>$value){
				$companyNames[$key]['name'] = strtoupper(substr(utf8_decode($value['name']),0,1));				
			}	
			
			$companyNames =array_unique($companyNames,SORT_REGULAR);
			
			
			$names = array();
			array_walk_recursive($companyNames, function($item) use (&$names) {
				$names[] = $item;
			});	
			
			if($stateId ==0){					
				foreach($statesIds as $key=>$value){	
					$state[] =$value['state_id'];				
				}						
				$stateUid = implode(',',$state);
				
				$stateNames = $this->companyRepository->findAllPresentStatesName($stateUid);
			}
			
			$this->view->assignMultiple(array(
					'companies'  => $companies,	
					'states'	 => $stateNames,			
					'pageType'   => $pageType,
					'companyNames' => $names,
					'stateNames' => $stateNames,
					'activeState' =>$stateId
			));	
			
		}
	}
	
	public function searchFormAction(){		
		if(TYPO3_MODE === 'FE') {												
			$this->view->assignMultiple(array(
					'companies'  => $companies,	
					'states'	 => $stateNames,			
					'pageType'   => $pageType,
					'companyNames' =>$companyNames,
					'stateNames' => $stateNames
			));				
		}		
	}
	
	public function searchListAction(){
		
		if(TYPO3_MODE === 'FE') {												
			
			$search_keyword = $_POST['search_keyword'];
			$results = array();
			if(!empty($search_keyword) && isset($_POST['search_keyword'])){
				$results = $this->companyRepository->findAllSearchResults($search_keyword);
				$totRecord = count($results);
			}else{
				$emptyKeyword = 'empty';
			}
			foreach($results as $key=>$value){
				$results[$key]['title'] =  strip_tags($value['title']);
				$results[$key]['description'] =  strip_tags($value['description']);
			}
			
			foreach($results as $key=>$value){
					$results[$key]['title'] =  str_ireplace($search_keyword,"<span class='highlight'>".$search_keyword."</span>",$value['title']);
					$results[$key]['description'] =  str_ireplace($search_keyword,"<span class='highlight'>".$search_keyword."</span>",$value['description']);				
			}
			
			$this->view->assignMultiple(array(
					'results'  => $results,
					'keywords'	=> $search_keyword,
					'emptyKeyword' => $emptyKeyword,
			));	
					
		}
			
			
	}
}