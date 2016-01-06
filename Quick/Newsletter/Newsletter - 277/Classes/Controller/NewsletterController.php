<?php
namespace TYPO3\Newsletter\Controller;
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
 * NewsletterController
 */
  
use \TYPO3\CMS\Core\Utility\GeneralUtility;

class NewsletterController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * newsletterRepository
	 *
	 * @var \TYPO3\Newsletter\Domain\Repository\NewsletterRepository
	 * @inject
	 */
	protected $newsletterRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		
		$this->fullURL = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_SITE_URL');
 		$this->cObject = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tslib_cObj');
		
		$suc = 1;

		if(isset($_SESSION['contactMessage'])){
			$suc = $_SESSION['contactMessage'];
			unset($_SESSION['contactMessage']);
		}

		$arguments	= $this->request->getArguments();
		$email		= $arguments['email']; 
		$status		= $arguments['status']; 
		$firma		= $arguments['firma']; 
		$Vorname	= $arguments['Vorname']; 
		$name		= $arguments['name']; 
		
		$save = 0;
		
		if(isset($email)){

			if($save==0){							
			
				$uid = $this->newsletterRepository->findUid();

				if($uid ==''){
					$array['uid'] 	 = 1;
				}else{
					$array['uid']   = $uid[0]['uid']+1;
				}

				$array['first_name'] = trim($Vorname);
                $array['email']   	 = trim($email);
				$array['pid']        = $this->settings['newsletterStorage'];
				$array['tstamp']     = time();

				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$suc = '3';
				}else{
					                    
					$email_check = $this->newsletterRepository->findEmail($email);		
					
					if($email_check[0]['email']==''){
						
						$newslettersSave= $this->newsletterRepository->saveDetails($array);
						$save=1;

						$to = $email;
						$subject = $this->settings['subject'];
						$txt = $this->settings['Message'];
						$msg = html_entity_decode($txt, ENT_QUOTES);
						$header_email =  $this->settings['adminemail'];													
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=UTF-8\nContent-Transfer-Encoding: 8bit' . "\r\n";
						$headers .= "From: $header_email";
						
						mail($to, $subject, $msg, $headers); 
						$_SESSION['contactMessage'] = '1';

						$this->redirectURL($this->cObject,$GLOBALS['TSFE']->id,$this->fullURL); 
	                                          
					}else{
						$suc = '2';
					}
				}					
				
				$this->view->assign('settings', $this->settings);
			}else{
				$save=0;	
			}
		}

		$this->view->assign('message', $suc);
		
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