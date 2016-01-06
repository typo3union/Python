<?php
namespace TYPO3\Property\Controller;
session_start();

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
 * InquirerController
 */
class InquirerController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * inquirerRepository
	 *
	 * @var \TYPO3\Property\Domain\Repository\InquirerRepository
	 * @inject
	 */
	protected $inquirerRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		if(TYPO3_MODE === 'FE') {
			
					
			$uriArr = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_property_property');
			
			if(!empty($uriArr['uid'])){
				$uid = $uriArr['uid'];
			}else{
				$uid = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('uid');
			}
			
			$n_uid = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('n_uid');
			
			if(isset($uid)){
				$inquirers = $this->inquirerRepository->findPropertyByUid($uid);
				$inquirers[0]['inq_id'] = '0';
				$this->view->assign('inquirers', $inquirers[0]);
			}else if($n_uid !=''){
				$inquirers = $this->inquirerRepository->findNewsByUid($n_uid);	
				$inquirers[0]['inq_id'] = '1';
				$this->view->assign('inquirers', $inquirers[0]);
			}else{
				if(isset($_REQUEST['email'])){
					$array['name'] = $_REQUEST['name'];
					$array['email'] = $_REQUEST['email'];
					$array['address'] = $_REQUEST['address'];
					$array['telephone'] = $_REQUEST['telephone'];
					$array['message'] = $_REQUEST['message'];
					$array['property'] = $_REQUEST['property'];
					$array['ip'] = $this->geIPAddress();
					$inq_id = $_REQUEST['inq_id'];
					
					$array['pid'] = ($inq_id ==0) ? $this->settings['inquiererstorageFolder']: $this->settings['newsiInquiererStorageFolder'];
					
					$inquirersLastId = $this->inquirerRepository->saveDetails($array);
					
					if($inquirersLastId){							
						$adminName = $this->settings['senderName'];
						$adminEmail = $this->settings['senderEmail'];
						$adminSubject = $this->settings['senderSubject'];
						$mailBody = $this->settings['mailBody'];			
						//$receiverEmail = $this->settings['receiverEmail'];						
						$receiverEmail  = array(0 => array('email' => $this->settings['receiverEmail'], 'name' => $adminName), 1 => array('email' => $_REQUEST['email'], 'name' => $_REQUEST['name'])) ;
										
						$search = array('{property}','{name}','{email}','{number}','{place}','{message}','{ip}');
						$replace = array($array['property'],$array['name'],$array['email'],$array['telephone'],$array['address'],$array['message'],$array['ip']);
						$mailBody = str_replace($search,$replace,$mailBody);
						$mailBodyFinal = '<style>
										.fonts {font-family: "Open Sans",sans-serif !important;}
										.fonts table{background:  #f7f7f7 !important;border: 1px solid #666666;}
										table tr td {font-family: "Open Sans",sans-serif !important;}
									</style>
									<div class="fonts" style="font-family: "Open Sans",sans-serif !important;" >'.$mailBody.'</div>';
						
						$this->sendMail($receiverEmail,$adminSubject,$mailBodyFinal,'',$adminEmail,$adminName,'','','','');
						$this->redirect('save');
					}
				}	
			
			}			
	
		}
	}

	public function saveAction() {
		if(TYPO3_MODE === 'FE') {			
				$this->view->assign('inquirers', $inquirers);
		}
	}
	
	
	public static function sendMail($to, $subject, $html, $plain, $fromEmail = '', $fromName = '', $replyToEmail = '', $replyToName = '', $returnPath = '', $attachements = array()) {
		
		 $emailLogo =$GLOBALS['TSFE']->tmpl->flatSetup['config.emailLogo'];
		 $baseURL = $GLOBALS['TSFE']->baseUrl;
			
		  // Make instance of swiftmailer
		  $message = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Mail\\MailMessage');
		   
		  // From
		  if ($fromEmail) {
			$message->setFrom(array($fromEmail => $fromName));
		  }
		 
		  // To
		  $recipients = array();
		  if (is_array($to)) {
			foreach ($to as $pair) {
			  if (\TYPO3\CMS\Core\Utility\GeneralUtility::validEmail($pair['email'], false)) {
				if (trim($pair['name'])) {
				  $recipients[$pair['email']] = $pair['name'];
				} else {
				  $recipients[] = $pair['email'];
				}
			  }
			}
		  } else {
			$recipients[] = $to;
		  }
		 
		  if (!count($recipients)) {
			return false;
		  }
		 
		  $message->setTo($recipients);
		 
		  // Subject
		  $message->setSubject($subject);
		 
		  // HTML
		  $mail_html =  '<img src="'.$baseURL.$emailLogo.'" alt="Logo"  /><br/><br/>';
		  $mail_html .= $html;
		  
		  $message->setBody($mail_html, 'text/html', 'utf-8');
		 
		  // Plain
		  if ($plain) {
			$message->addPart($plain, 'text/plain', 'utf-8');
		  }
		 
		  // Return Path
		  if (trim($returnPath)) {
			$message->setReturnPath($returnPath);
		  }
		 
		  // Reply To
		  if (trim($replyToEmail) && \TYPO3\CMS\Core\Utility\GeneralUtility::validEmail($replyToEmail)) {
			if (trim($replyToName)) {
			  $message->setReplyTo(array($replyToEmail => $replyToName));
			} else {
			  $message->setReplyTo(array($replyToEmail));
			}
		  }
		 
		  // Attachements
		  if (count($attachements)) {
			foreach ($attachements as $file => $name) {
			  if (file_exists($file)) {
				if (trim($name)) {
				  $message->attach(\Swift_Attachment::fromPath($file)->setFilename($name));
				} else {
				  $message->attach(Swift_Attachment::fromPath($file));
				}
			  }
			}
		  }
		 
		  // Mail Send
		  $message->send();
		 
		  return true;
		}
							
			
			
	function  geIPAddress()
	{	
		  if(!empty($_SERVER['TYPO3_DB'])){
				$ip=$_SERVER['HTTP_CLIENT_IP'];            // Check ip from share internet
		  }elseif(!empty($_SERVER[HTTP_X_FORWARDED_FOR])){
			  	$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];      //to check ip is pass from proxy
		  }else{
				$ip=$_SERVER['REMOTE_ADDR'];
		  }
		  return $ip;
	}
}