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
 * PropertyTypeController
 */
class PropertyTypeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * propertyTypeRepository
	 *
	 * @var \TYPO3\Property\Domain\Repository\PropertyTypeRepository
	 * @inject
	 */
	protected $propertyTypeRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	
	public function listAction() {
		if(TYPO3_MODE === 'FE') {
			$propertyTypes['propertyType'] = $this->propertyTypeRepository->findPropertyType();
			$propertyTypes['city'] = $this->propertyTypeRepository->findPropertyCity();
			
			/*echo '<pre>';
			print_r($propertyTypes);
			echo '</pre>';*/
			foreach($propertyTypes['propertyType'] as $key=>$value){				
				$type_id[] = $value['uid'];
				$type_title[] = $value['title'];				
			}
			$type = array_combine($type_id,$type_title);
			
			$city = array();
			array_walk_recursive($propertyTypes['city'], function($item) use (&$city) {
				$city[] = $item;
			});	
							
			$propertyTypes['propertyType'] = $type;
			$propertyTypes['city'] = $city;
			$propertyTypes['price'] = array(
						  "200-500"=>"200-500",
						  "500-1000"=>"500-1000",
						  "1000-5000"=>"1000-5000",
						  "5000-10000"=>"5000-10000",
						  "10000-20000"=>"10000-20000",
						  "20000-50000"=>"20000-50000",
						  "50000-100000"=>"50000-100000",
						   "100000-500000"=>"100000-500000",
						    "500000-1000000"=>"500000-1000000");
			
			$this->view->assign('propertyTypes', $propertyTypes);			
		}		
	}

}