<?php
namespace JS\JsCareer\Controller;

ini_set('display_errors', 1);
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
 * JobController
 */
class JobController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * careerService
	 *
	 * @var \JS\JsCareer\Service\CareerService
	 * @inject
	 */
	protected $careerService = NULL;

	/**
	 * jobRepository
	 *
	 * @var \JS\JsCareer\Domain\Repository\JobRepository
	 * @inject
	 */
	protected $jobRepository = NULL;

	/**
	 * action job
	 *
	 * @return void
	 */
	public function jobAction() {
		
		$detail 	= "";
		
		$this->settings['fullURL']	= \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_SITE_URL');
		
		$this->settings['cObject']	= \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tslib_cObj');
		
		$uriParams	= \TYPO3\CMS\Core\Utility\GeneralUtility::_GET();
		
		unset($uriParams['id']);
		unset($_SESSION['tempFile']);
		
		if(isset($_SESSION['successMessage'])){
			$success = $_SESSION['successMessage'];
			unset($_SESSION['successMessage']);
		}

		$template = $this->careerService->missingConfiguration($this->settings);

		$paginate  = 0;
		
		if(isset($this->settings['paginate'])){
			$paginate	= $this->settings['paginate'];
		}
		
		if(isset($this->settings['recordPerPage'])){
			$recordPerPage	= $this->settings['recordPerPage'];
		}else{
			$recordPerPage	= $this->settings['perpage'];
		}

		$order = $orderType = "desc";
		$orderClass = "";
		
		if ($this->request->hasArgument('order')){
			
			$arg = $this->request->getArguments();
			
			$orderClass = "asc";
			
			if($arg['order']=="desc"){
				$orderType = $orderClass = "asc";
				$order = "desc";
			}else{
				$order = "asc";
			}
		}
		
		$search = "";
		$klinik = "";
		
		if ($this->request->hasArgument('searchSubmit')){
			
			$arg = $this->request->getArguments();				
			//$additionalParams = "&tx_jscareer_career[search]=".$arg['search'];
			$additionalParams = "&tx_jscareer_career[search]=".$arg['search']."&tx_jscareer_career[klinik]=".$arg['klinik'];
			$this->redirectURL($this->settings['cObject'],$GLOBALS['TSFE']->id,$this->settings['fullURL'],$additionalParams);	
		}

		
		if ($this->request->hasArgument('search')){
			$arg	= $this->request->getArguments();
			$search = $arg['search'];
		} 
		if ($this->request->hasArgument('klinik')){
			$arg	= $this->request->getArguments();
			if($arg['klinik'] !=0){
				$klinik = $arg['klinik'];
			}
		} 

		
		$orderArr = array('type'=>$orderType,'class'=>$orderClass);
		$searchArr = array('uriParams'=>$uriParams,'text'=>$search);
		
		if ($this->request->hasArgument('jobApplied')){
			
			$job = $uriParams['tx_jscareer_career']['apply'];
			
			$formFields = $this->request->getArguments();
			
			$error = $this->careerService->validate($formFields);
			
			if(count($error)>0){
				$errors = $error;
			}else{
				$_SESSION['successMessage'] = $this->careerService->insertUserData($formFields,$this->settings['storagePID'],$job);
				
				//$_SESSION['successMessage'] = 1;
				
				if($_SESSION['successMessage']==1){
					
					
					$arr = array('name'		=> $formFields['name'],
						         'email'	=> $formFields['email'],
					         	 'phone'	=> $formFields['phone'],
					        );
							
					foreach ($arr as $key => $value) {
					
						if($value!=""){
							$mailFields['mail'][] = array('field'=>$key,'value'=>$value); 
						}
					}
					
					$attachements = array();
					
					if(isset($_SESSION['tempFile'])){
						$image	= $_SERVER['DOCUMENT_ROOT'] ."/fileadmin/user_upload/career/".$_SESSION['tempFile'];
						$attachements[$image]	= basename($image);	
					}
					
					$sendMailUser	=  $this->settings['sendMailUser'];
					
					if($sendMailUser==1){
					
						$emailView = $this->objectManager->get('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
						$templateName = 'Email/user.html';
						$extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
						$templateRootPath = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration['view']['templateRootPath']);
						$templatePathAndFilename = $templateRootPath . $templateName;
						$emailView->setTemplatePathAndFilename($templatePathAndFilename);
						$emailView->assignMultiple($mailFields);
						$emailView->assignMultiple($arr);
						$userEmailContent = $emailView->render();
		
						$to				= $formFields['email'];
						
						$subject		=  $this->settings['subjectUser'];
						
						$returnPath 	= $plain =  $bccName = $bccEmail = "";
						
						$fromName		=  $this->settings['senderName'];
						$fromEmail		=  $this->settings['senderEmail'];
						
						$replyToEmail	=  $this->settings['noreply'];
						$replyToName	=  $this->settings['noreplyEmail'];
						
						if($to!=""){
							
							$toArr = array(0=>array("name"=>$formFields['name'],"email"=>$to));
							$res = $this->careerService->sendMail($toArr, $subject, $userEmailContent, $plain, $fromEmail, $fromName, $replyToEmail, $replyToName, $bccName, $bccEmail, $returnPath, $attachements);
						}
					}

					$sendMailAdmin	=  $this->settings['sendMailAdmin'];
					
					if($sendMailAdmin==1){

						$emailView = $this->objectManager->get('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
						$templateName 	= 'Email/admin.html';
						$extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
						$templateRootPath	= \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration['view']['templateRootPath']);
						$templatePathAndFilename	= $templateRootPath . $templateName;
						$emailView->setTemplatePathAndFilename($templatePathAndFilename);
						$emailView->assignMultiple($mailFields);
						$adminEmailContent	= $emailView->render();
						
						$to			=  $this->settings['adminEmail'];
						$subject	=  $this->settings['subjectAdmin'];
						
						$fromName		=  $formFields['name'];
						$fromEmail		=  $formFields['email'];
						
						$fromName		=  $this->settings['senderName'];
						$fromEmail		=  $this->settings['senderEmail'];

						$toArr = $this->jobRepository->getManagerEmails($job);
						
						if(is_array($toArr)){
							
							$res = $this->careerService->sendMail($toArr, $subject, $adminEmailContent, $plain, $fromEmail, $fromName, $replyToEmail, $replyToName, $bccName, $bccEmail, $returnPath, $attachements);
	
						}
					}

					$additionalParams = "&tx_jscareer_career[job]=".$job;
					$this->redirectURL($this->settings['cObject'],$GLOBALS['TSFE']->id,$this->settings['fullURL'],$additionalParams);	
				}
			}
		}

		if ($this->request->hasArgument('job')){
			
			$arg = $this->request->getArguments();
			
			$jobId = intval($arg['job']);
			
			if($jobId>0){
				$detail = 1;
			}

		}else if ($this->request->hasArgument('apply')){
			
			$arg = $this->request->getArguments();
			
			$jobId = intval($arg['apply']);

			$detail = 2;
		}
		
		if($jobId>0){
			$data = $this->jobRepository->getJobsDetail($this->settings,$jobId);
		}else{
			$data = $this->jobRepository->getJobsList($this->settings,$order,$search,$klinik);
		}
		
			
		if(count($data)==0){
			$template = 'no-record';
		}
		
		$clinikData = $this->jobRepository->getClinikList($this->settings);
		$array[0] = "Alle Kliniken";
		foreach($clinikData as $key=>$value){
			$array[$value['uid']] = $value['title'];
		}
		
		
		$this->view->assign('jobDetail', $detail);

		$this->view->assign('template', $template);
		$this->view->assign('paginate', $paginate);
		$this->view->assign('recordPerPage',$recordPerPage);
		
		$this->view->assign('order',$orderArr);
		$this->view->assign('search',$searchArr);
		
		$this->view->assign('errors', $errors);
		$this->view->assign('success', $success);
		
		$this->view->assign('job',$data);
		
		$this->view->assign('uriParams',$uriParams);
		$this->view->assign('clinikData',$array);
		$this->view->assign('activeClinik',$klinik);

		
		// Include Additional Data
		$this->careerService->includeAdditionalData($this->settings);
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
	public function redirectURL($cObject, $pid, $fullURL, $additionalParams = "") {
			
		$configurations['additionalParams'] = $additionalParams;
		$configurations['returnLast'] = 'url'; // get it as URL
		$configurations['parameter'] = $pid;
		$url  = $fullURL.$cObject->typolink(NULL, $configurations);

		header("Location:".$url);
		die;
	}
}
