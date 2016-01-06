<?php

namespace TYPO3\Property\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Martin Galler <martin.galler@weboffice.co.at>, Weboffice
 *           Pooja Patel <pooja.patel@webofficeindia.com>, Weboffice
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
 * PropertyController
 */
class PropertyController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * propertyRepository
	 *
	 * @var \TYPO3\Property\Domain\Repository\PropertyRepository
	 * @inject
	 */
	protected $propertyRepository = NULL;
	
	public function initializeAction() {
		// Set Storage folder id by request id
		if(TYPO3_MODE === 'BE') {
	 			$this->settings['storageFolder'] = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('id');
		}
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		if(TYPO3_MODE === 'FE') {
			
			$searchArr = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_property_property');
			
			if(!empty($searchArr['uid'])){
				$search = $searchArr['uid'];
			}else{
				$search = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('search');
			}

			if(isset($search)){
				$price_id = array();
				$price_val = array();
				
				$type = $_REQUEST['property_type'];
				$price = $_REQUEST['property_price'];
				$city = $_REQUEST['property_city'];								
				$cat = $_REQUEST['property_cat'];
				
				$where = '';
				$where .= ($type !='') ? ' AND property_type='.$type: '';
				$where .= ($city !='') ? ' AND city="'.$city.'" ' : '';
				$where .= ($cat !='') ? ' AND object_type='.$cat : '';	
				if($price !=''){
					$pr = explode("-",$price);
					if(count($pr)>0){
						$allPrice = $this->propertyRepository->findAllPrice();						
						foreach($allPrice as $key=>$value){				
							$temp=$this->remove_non_numerics($value['price']);	
							if($temp>=$pr[0] && $temp<=$pr[1]){
								$price_id[$key] = $value['uid'];
								$price_val[$key] =$temp;
							}													
						}												
						$uidArr = implode(",",$price_id);
						$where .= ($uidArr !='') ? ' AND uid IN ('.$uidArr.')' : ' AND uid=0';
					}					
				}
							
			}else{
				$where='';
			}		
			
			$properties = $this->propertyRepository->findAllData($where);
			
			foreach($properties as $key => $value){
				$imgGallery = explode(',',$value['images']);
				$properties[$key]['images'] = $imgGallery;
				$properties[$key]['title'] = \TYPO3\CMS\Core\Utility\GeneralUtility::fixed_lgd_cs($properties[$key]['title'],'30');
				$properties[$key]['subtitle'] = \TYPO3\CMS\Core\Utility\GeneralUtility::fixed_lgd_cs($properties[$key]['subtitle'],'150');
			}
			$this->view->assign('properties', $properties);			
		}		
	}
	
	public function remove_non_numerics($str)
	{ 
		$temp = trim($str);		
		$string = str_replace('$', '', $temp);
		$string = str_replace('/', '', $string);
		$string = str_replace('€', '', $string);
		$string = str_replace('-', '', $string);
		$string = str_replace('.0000', '', $string);
		$string = str_replace('.000', '', $string);
		$string = str_replace('.00', '', $string);
		$string = str_replace('.0', '', $string);		
		$string = str_replace('.', '', $string);
		$string = str_replace(',', '.', $string);
		//$string = number_format($string, 0, ',', '.');
		$string = round($string);		
		return $string;
	}
	
	public function showAction() { 
		//echo "showaction"; exit;
		if(TYPO3_MODE === 'FE') {
			
			$uriArr = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_property_property');
			
			if(!empty($uriArr['uid'])){
				$uid = $uriArr['uid'];
			}else{
				$uid = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('uid');
			}
			
			$property = $this->propertyRepository->findDataByUid($uid);
			
			if($property[0]['images']){
				$imgGallery = explode(',',$property[0]['images']);
				$property[0]['images'] = $imgGallery;
			}
			if($property[0]['pdf']){
				$pdf = explode(',',$property[0]['pdf']);
				$property[0]['pdf'] = $pdf;
			}
			
			$property_cat =$property[0]['object_type'];
			$property[0]['object_type'] = $property[0]['object_type'] == '0' ? 'Miete' : 'Kauf';
			
			$property_type = $this->propertyRepository->findPropertTypeByUid($property[0]['property_type']);
			$property[0]['property_type'] = $property_type[0]['title'];
			
			$building_type = $this->propertyRepository->findBuildingtTypeByUid($property[0]['building_type']);
			$property[0]['building_type'] = $building_type[0]['title'];
			
			$nextPageId = $this->propertyRepository->findNextPageId($uid);
			$nextPageId = (!empty($nextPageId))? $nextPageId[0]['uid'] : 0;
			
			$previousPageId = $this->propertyRepository->findPreviousPageId($uid);
			$previousPageId = (!empty($previousPageId))? $previousPageId[0]['uid'] : 0;
		}
		
		$currentUrl = $this->uriBuilder->getRequest()->getRequestUri();
		$baseUrl =  $GLOBALS['TSFE']->baseUrl;
		
		$this->view->assignMultiple(array(
			'baseUrl' => $baseUrl,
			'currentUrl' => $currentUrl,
			'property' => $property[0],
			'nextPageId' => $nextPageId,
			'previousPageId' => $previousPageId,
		));		
			
		$this->view->assign('properties', $property[0]);
	}

	public function googlemapAction(){
		 
		
		$arguments = $this->request->getArguments();
		
		$city = $arguments['city'];
		$street = $arguments['street'];
		$title = $arguments['title'];
		$plz = $arguments['plz'];
		
		$iframe_width = '400px'; 
		$iframe_height = '400px'; 
		
		
		$address = $street.' '.$city.' '.$plz; 
		$address = str_replace(" ", "+", $address);

		$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region");
		$json = json_decode($json);
				
		$lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
		$long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
	
		$iframe = '		
			<style>
				.infotext {font-size:14px; padding:10px; color:#fff;float:left; }
				.infotext:after, .infotext:before {top: 100%;left: 50%;border: solid transparent;content: " ";height: 0;width: 0;position: absolute;pointer-events: none;}
				.infotext:after {border-color: rgba(136, 183, 213, 0);border-top-color: #cb3725;border-width: 20px;	margin-left: -31px;}
				.infotext:before {border-color: rgba(194, 225, 245, 0);border-top-color: #cb3725;}
				.infoBox { margin-top:-99px;text-align:center;}			
			</style>	
			<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
			<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"></script>
			<script type="text/javascript">
			function initialize() {
				var loc, map, marker, infobox;
				
				loc = new google.maps.LatLng('.$lat.', '.$long.');
				
				map = new google.maps.Map(document.getElementById("map"), {
					 zoom: 13,
					 center: loc,
					 mapTypeId: google.maps.MapTypeId.ROADMAP
				});
				
				marker = new google.maps.Marker({
					map: map,
					position: loc,
					visible: true
				});
			
				infobox = new InfoBox({
				  content:\'<div class="infotext">'.trim($title).'</div>\',
					 disableAutoPan: false,
					 pixelOffset: new google.maps.Size(-140, 0),
					 zIndex: null,
					 boxStyle: {
						background: "#cb3725",
						 width: "300px",
						 
					
					},
					closeBoxMargin: "12px 4px 2px 2px",
					closeBoxURL: "http://www.google.com/intl/en_us/mapfiles/close.gif",
					infoBoxClearance: new google.maps.Size(1, 1)
				});
				
				google.maps.event.addListener(marker, \'click\', function() {
					infobox.open(map, this);
					map.panTo(loc);
				});
			}
			google.maps.event.addDomListener(window, \'load\', initialize);
			</script>
			<div id="map" style="width: 100%; height: 100%"></div>
					';

		echo $iframe;	exit;

	}
	public function latestAction() {
		if(TYPO3_MODE === 'FE') {
			$propertyOrder = $this->settings['propertyOrder'];
			$propertyCount = $this->settings['propertyCount'];			
			$properties = $this->propertyRepository->findAllLatestData($propertyOrder,$propertyCount);
			foreach($properties as $key => $value){
				$imgGallery = explode(',',$value['images']);
				$properties[$key]['images'] = $imgGallery;
			}
			$this->view->assign('properties', $properties);			
		}		

	}
	
}