<?php
namespace JS\JsGreetingcards\Controller;

session_start();

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
 * GreetingsWishesController
 */
class GreetingsWishesController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * greetingsService
	 * 
	 * @var \JS\JsGreetingcards\Service\GreetingsService
	 * @inject
	 */
	protected $greetingsService = NULL;

	/**
	 * greetingsWishesRepository
	 * 
	 * @var \JS\JsGreetingcards\Domain\Repository\GreetingsWishesRepository
	 * @inject
	 */
	protected $greetingsWishesRepository = NULL;
	
	/**
	 * greetingCardsRepository
	 * 
	 * @var \JS\JsGreetingcards\Domain\Repository\GreetingCardsRepository
	 * @inject
	 */
	protected $greetingCardsRepository = NULL;

	/**
	 * action greetingsWishes
	 * 
	 * @return void
	 */
	public function greetingsWishesAction() {
		
		$suc = 0;

		if(isset($_SESSION['success'])){
			$suc = $_SESSION['success'];
			unset($_SESSION['success']);
		}
		
		$this->settings['fullURL'] = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_SITE_URL');
		$this->settings['cObject'] = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tslib_cObj');
		
		$uriParams = \TYPO3\CMS\Core\Utility\GeneralUtility::_GET();
		
		$template = $this->greetingsService->missingConfiguration($this->settings);
		
		$_SESSION['STEP'] = 1;

		

		if ($this->request->hasArgument('step1Submit')){

			$arr = $this->request->getArguments();
			$_SESSION['STEP'] = 2;
			$_SESSION['greeting']['card'] = $arr['card'];
			$greeting = $this->greetingCardsRepository->findByUid($arr['card']);


			
		}else if ($this->request->hasArgument('step2Submit')){

			$arr = $this->request->getArguments();

			$data = $this->greetingCardsRepository->findAllCardData($_SESSION['greeting']['card']);	
			
			$_SESSION['greeting']['data'] = array('bottom_text'=> $data['image_bottom_text'] ,'name'=>$arr['name'],'patient_name'=>$arr['patient_name'],'room'=>$arr['room'],'description'=>$arr['description'],'header'=>$arr['header']);
			
			$_SESSION['STEP'] = 3;

			$greeting = $this->greetingCardsRepository->findByUid($_SESSION['greeting']['card']);
			
		}else if ($this->request->hasArgument('backeStep2Submit')){
			$_SESSION['STEP'] = 2;
			$greeting = $this->greetingCardsRepository->findByUid($_SESSION['greeting']['card']);			
		}
		else if ($this->request->hasArgument('step3Submit')){

			if(isset($_SESSION['greeting']['data']['name'])){
				
				$greeting['greeting'] = $this->greetingCardsRepository->findByUid($_SESSION['greeting']['card']);
				
				$arr		=  $_SESSION['greeting']['data'];
				
				$arr1 = array('baseURL'	=> $this->settings['fullURL']);	
				
				foreach ($arr as $key => $value) {
				
					if($value!=""){
						$mailFields['mail'][] = array('field'=>$key,'value'=>$value); 
					}
				}
				
				$pdfView = $this->objectManager->get('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
				$templateName = 'Pdf/pdf.html';
				$extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
				$templateRootPath = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration['view']['templateRootPath']);
				$templatePathAndFilename = $templateRootPath.$templateName;
				$pdfView->setTemplatePathAndFilename($templatePathAndFilename);
				$pdfView->assignMultiple($mailFields);
				$pdfView->assignMultiple($arr1);
				$pdfView->assignMultiple($arr);
				$pdfView->assignMultiple($greeting);
				$pdfContent = $pdfView->render();  
				// echo '<pre>';
				// print_r($pdfContent);
				// exit;
				$insert = $this->greetingsService->insertUserData($this->settings,$pdfContent); 

				if($insert==1){

					$returnPath 	= $attachements = $plain =  $bccName = $bccEmail = "";
					
					
					$TSsenderName	= $this->settings['receiver']['senderName']['value'];
					$FFsenderName	= $this->settings['flexform']['receiver']['senderName'];
					
					$senderName		=  trim($FFsenderName)==""?$TSsenderName:$FFsenderName;
					
					$TSsenderEmail	= $this->settings['receiver']['senderEmail']['value'];
					$FFsenderEmail	= $this->settings['flexform']['receiver']['senderEmail'];
					
					$senderEmail	=  trim($FFsenderEmail)==""?$TSsenderEmail:$FFsenderEmail;
									
					$TSreplyToEmail	= $this->settings['receiver']['replyToEmail']['value'];
					$FFreplyToEmail	= $this->settings['flexform']['receiver']['replyToEmail'];
					
					$replyToEmail	=  trim($FFreplyToEmail)==""?$TSreplyToEmail:$FFreplyToEmail;
									
					$TSreplyToName	= $this->settings['receiver']['replyToName']['value'];
					$FFreplyToName	= $this->settings['flexform']['receiver']['replyToName'];
					
					$replyToName	=  trim($FFreplyToName)==""?$TSreplyToName:$FFreplyToName;
					
					$name			=  $this->settings['flexform']['receiver']['name'];
					$email			=  $this->settings['flexform']['receiver']['email'];
					$subject		=  $this->settings['flexform']['receiver']['subject'];
	
					$emailView = $this->objectManager->get('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
					$templateName = 'Email/admin.html';
					$extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
					$templateRootPath = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration['view']['templateRootPath']);
					$templatePathAndFilename = $templateRootPath.$templateName;
					$emailView->setTemplatePathAndFilename($templatePathAndFilename);
					$emailView->assignMultiple($mailFields);
					$emailView->assignMultiple($arr1);
					$emailBody = $emailView->render(); 
					
					$path =  str_replace("//","/",$_SERVER['DOCUMENT_ROOT'].$this->greetingsService->getSubFolderOfCurrentUrl().$_SESSION['greeting']['PDF']); 

					$attachements[$path]	= basename($path);
					
					if($email!=""){
						$toArr = array(0=>array("name"=>$name,"email"=>$email));
						$res = $this->greetingsService->sendMail($toArr, $subject, $emailBody, $plain, $senderEmail, $senderName, $replyToEmail, $replyToName, $bccName, $bccEmail, $returnPath, $attachements);
					}

					$this->greetingsService->unsetSession();

					if(trim($this->settings['thanks']['redirect'])!=""){
						$this->redirectURL($this->settings['cObject'],$this->settings['thanks']['redirect'],$this->settings['fullURL']);
					}else{
						$_SESSION['success'] = 1;
						$this->redirectURL($this->settings['cObject'],$GLOBALS['TSFE']->id,$this->settings['fullURL']);	
					}
				}
			}else{
				$this->greetingsService->unsetSession();
				$this->redirectURL($this->settings['cObject'],$GLOBALS['TSFE']->id,$this->settings['fullURL']);	
			}
			
			
		}else{

			if(isset($this->settings['main']['pid'])){
				
				$querySettings = $this->greetingCardsRepository->createQuery()->getQuerySettings();
				$querySettings->setStoragePageIds(array($this->settings['main']['pid']));
				$this->greetingCardsRepository->setDefaultQuerySettings($querySettings);
				
				$greeting = $this->greetingCardsRepository->findAll();
			}
		}
		
		$sucArr = array('message'=> $suc,
						'successMessage'=> $this->settings['thanks']['body']
						);
		
		$greetingData = array();
		
		if(isset($_SESSION['greeting']['data'])){
			$greetingData = $_SESSION['greeting']['data'];
		}
		

		$greetingArr = array('cards'=>$greeting,'data'=>$greetingData,'uriParams'=>$uriParams,'selectCard'=>$_SESSION['greeting']['card']);
		
		$this->view->assign('success', $sucArr);
		
		$this->view->assign('greeting', $greetingArr);

		$this->view->assign('template', $template);
		
		$this->view->assign('step',$_SESSION['STEP']);
		
		// Include Additional Data
		$this->greetingsService->includeAdditionalData($this->settings);
	}

	/**
	 * redirectURL
	 * 
	 * @param $cObject
	 * @param $pid
	 * @param $fullURL
	 * @param $additionalParams
	 * @return
	 */
	public function redirectURL($cObject, $pid, $fullURL, $additionalParams = '') {
		
		$configurations['additionalParams'] = $additionalParams;
		$configurations['returnLast'] = 'url';
		$configurations['parameter'] = $pid;
		$url = $fullURL . $cObject->typolink(NULL, $configurations);
		header('Location:' . $url);
		die;
	}

}
