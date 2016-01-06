<?php
namespace TYPO3\Events\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 pooja <pooja.patel@webofficeindia.com>, Weboffice
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
 * LocationController
 */
class LocationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * locationRepository
	 *
	 * @var \TYPO3\Events\Domain\Repository\LocationRepository
	 * @inject
	 */
	protected $locationRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$locations = $this->locationRepository->findAll();
		$user =  $GLOBALS['TSFE']->fe_user->user['username'];
		$user_locationsIDs =  $GLOBALS['TSFE']->fe_user->user['locations']; 	
		$user_locations = $this->locationRepository->findAllLocations($user_locationsIDs);
		$all_user_locations = $this->locationRepository->findAllLocations();
		
		foreach($user_locations as $key=>$value){
			$location_Id[] = $value['uid'];
		}
		
		foreach($all_user_locations as $key=>$value){
			if (in_array($value['uid'], $location_Id)) {
					$temp[$key] = 1;
			}else{
					$temp[$key] = 0;
			}
			$final_Id[$value['uid']] = $temp[$key];
			$locations['loc'][$value['uid']] = $temp[$key];
		}
		
		
		
		$this->view->assignMultiple(array(
				'locations'      => $locations,
				'user_locations' => $user_locations,
				'locationIds'    => $final_Id
		));	
		
	}

}