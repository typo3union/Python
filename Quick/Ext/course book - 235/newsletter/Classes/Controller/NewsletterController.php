<?php
namespace TYPO3\Newsletter\Controller;


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
		
	
		$arguments = $this->request->getArguments();
		$email = $arguments['email']; 
		$check_val=0;	
			if(isset($email)){
                            
				if($check_val==0){
					$uid = $this->newsletterRepository->findUid();
					if($uid ==''){
						$array['uid'] 	 = 1;
					}else{
						$array['uid']   = $uid[0]['uid']+1;
					}
					$array['name']   = $email;
					$array['email']  = $email;
					$array['pid']    = $this->settings['newsletterStorage'];
					$array['tstamp'] = time();
					
                                        
					$email_check = $this->newsletterRepository->findEmail($email);		
					
					if($email_check[0]['email']==''){
						$newslettersSave= $this->newsletterRepository->saveDetails($array);
						$check_val=1;	
						$newsletters['thankyou_message'] = '1';
                                             
						$to = $email;
						$subject = $this->settings['senderSubject'];
						$txt = $this->settings['senderMessage'];
						$header_email =  $this->settings['senderemail'];
					   $headers  = 'MIME-Version: 1.0' . "\r\n";
					   $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
					   $headers .= "From: $header_email";
					   
					   mail($to, $subject, $txt, $headers); 
					   					   
					   $to1 = $this->settings['adminemail'];
					   $subject1 = $this->settings['adminSubject'];
					   $txt1 = $this->settings['adminMessage'];
					   $txt1 = str_replace('{newsletter_user}',$email,$txt1);
					   $header_email1 =  $this->settings['senderemail'];
					   $headers1  = 'MIME-Version: 1.0' . "\r\n";
					   $headers1 .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
					   $headers1 .= "From: $header_email1";	
					   mail($to1, $subject1, $txt1, $headers1); 								                   
                                                
					}else{
						$newsletters['alreadyRegister_message'] = '1';
					}					
					$this->view->assign('newsletters', $newsletters);
					$this->view->assign('settings', $this->settings);
				}else{
					$check_val=0;	
				}
                               
                                
		}
		
	}
 }