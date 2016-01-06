<?php
namespace JS\JsClinik\Controller;

ini_set('display_errors', 1);
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
 * ClinikController
 */
class ClinikController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	protected $ceData = NULL;

	/**
	 * clinikRepository
	 *
	 * @var \JS\JsClinik\Domain\Repository\ClinikRepository
	 * @inject
	 */
	protected $clinikRepository = NULL;

	/**
	 * clinikService
	 *
	 * @var \JS\JsClinik\Service\ClinikService
	 * @inject
	 */
	protected $clinikService = NULL;

	public function initializeAction() {
		// store content element data to local property
		$this->ceData = $this->configurationManager->getContentObject()->data;
	}

	/**
	 * action clinikFinder
	 *
	 * @return void
	 */
	public function clinikFinderAction() {
		
		$getData	= \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_jsclinik_clinikfinder');
		
		$this->settings['fullURL']	=  \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_SITE_URL');
		
		$this->settings['cObject']	= \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tslib_cObj');
		
		$detail 	= 0;

		if(isset($getData['facilities']) && $getData['facilities']>0){
			$detail = intval($getData['facilities']);
		}
		
		$template = $this->clinikService->missingConfiguration($this->settings);
		
		if ($this->request->hasArgument('clinikFind')){
			
			$getData = $this->request->getArguments();
			
			$data = array();
			
			if(isset($getData['facility']) && is_array($getData['facility'])){
				$data = $this->clinikRepository->getClinks($this->settings,$getData);
			}
			
			$template = "clinik-location";
			
			if(count($data)==0){
				$template = 'clinik.no-record';
			}
		}else{
			$data = $this->clinikRepository->getFacilities($this->settings);
			
			
			if(count($data)==0){
				$template = 'facilities.no-record';
			}
		}
		
		
		$this->view->assign('facilities', $data);
		$this->view->assign('template', $template);
		//$this->view->assign('fileDetail', $detail);
		
		// Include Additional Data
		//$this->clinikService->includeAdditionalData($this->settings);

	}

	/**
	 * action footerMap
	 * 
	 * @return void
	 */
	public function footerMapAction() {
		
		$this->settings['fullURL']	= \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_SITE_URL');
		
		$this->settings['cObject']	= \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tslib_cObj');

		$template 		= $this->clinikService->missingConfiguration($this->settings);
		
		$data			= $this->clinikRepository->getClinks($this->settings);

		$dataFacility	= $this->clinikRepository->getClinksWithFacilities($this->settings);

		
		$this->view->assign('cliniks', $data);
		$this->view->assign('clinikFacility', $dataFacility);
		$this->view->assign('template', $template);
		
		
		// assign width and height of map
		if ($this->settings['mapWidth']!="")
			$width = $this->settings['mapWidth'];
		else 
			$width = $this->settings['display']['width'];
		$this->view->assign('width', $width);
		
		
		if ($this->settings['mapHeight']!="")
			$height = $this->settings['mapHeight'];
		else 
			$height = $this->settings['display']['height'];
			
		$this->view->assign('height', $height);

		// assign icon if given by constant and/or typoscript
		if (!empty($this->settings['display']['icon'])  && file_exists(PATH_site . $this->settings['display']['icon']))
			$icon = $this->settings['display']['icon'];
		else
			$icon = null;

		// assign deactivation of zooming by mousewheel			
		$useScrollwheel = ($this->settings['options']['useScrollwheel'] ? 'true' : 'false');

		// assign map zoom level to the view ,if given value is valid
		if (0 <= (int) $this->settings['scaleLevel'] && !empty($this->settings['scaleLevel']))	
			$mapZoom = (int) $this->settings['scaleLevel'];
		else 
			$mapZoom = $this->settings['display']['zoom'];	
			

		// assign map type to the view, if given value is valid
		if (in_array((string) $this->settings['mapType'], 
			preg_split("/[\s]*[,][\s]*/", $this->settings['valid']['mapTypes'])))
			$mapType = $this->settings['mapType'];
		else 
			$mapType = $this->settings['display']['mapType'];

		

		// assign navigation controls to the view
		if (in_array((string) $this->settings['navigationControl'], 
			preg_split("/[\s]*[,][\s]*/", $this->settings['valid']['navigationControl'])))
			$navigationControl = $this->settings['navigationControl'];
		else 
			$navigationControl = $this->settings['display']['navigationControl'];
			
		
		$set['setting'] = array('width'				=> $width,
								'height'			=> $height,
								'icon'				=> $icon,
								'useScrollwheel'	=> $useScrollwheel,
								'mapZoom'			=> $mapZoom,
								'mapType'			=> $mapType,
								'mapControl'		=> $navigationControl,
								'googleAPI'			=> $this->settings['googleapi']['uri']);
		
		$this->view->assign('map', $set);
		
		$this->view->assign('contentId', $this->ceData['uid']);
				
		// Include Additional Data
		$this->clinikService->includeAdditionalData($this->settings);
	}
}