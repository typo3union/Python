<?php
namespace JS\JsCareer\Service;

/*
 *  (c) 2015 Jainish Senjaliya <jainish.online@gmail.com>
 *  Jainish Senjaliya <jainish.online@gmail.com>
*/

class CareerService implements \TYPO3\CMS\Core\SingletonInterface {

	/**
	 * jobRepository
	 * 
	 * @var \JS\JsCareer\Domain\Repository\JobRepository
	 * @inject
	 */
	protected $jobRepository = NULL;
	
	/**
	 * missingConfiguration
	 *
	 * @param $settings
	 * @return
	 */
	 
	function missingConfiguration($settings)
	{
		if($settings['configuration']!=1){
			return 'include_template';
		}else if($settings['storagePID']=="" ){
			return 'storagePID';
		}
		
		return 1;
	}

 	/**
	 * includeAdditionalData
	 *
	 * @param $settings
	 * @return
	 */
	
	function includeAdditionalData($settings)
	{
		
		$settings['includeJSinFooter']	= 1;
		$settings['includeCSSinFooter']	= 1;
		
		$additionalDataJS = $additionalDataCSS	= "";
		
	/*	$additionalDataJS	.= '<script src="typo3conf/ext/js_career/Resources/Public/Script/jquery-ui.js" type="text/javascript"></script>';
	*/
		
		if(!empty($settings['uri']['javascript'])){
			$additionalDataJS	.= '<script src="'.$settings['uri']['javascript'].'" type="text/javascript"></script>';
		}

		if(!empty($settings['uri']['css'])){
			$additionalDataCSS	= '<link rel="stylesheet" href="'.$settings['uri']['css'].'" type="text/css" media="all" />';
		}

		if($settings['includeJSinFooter']==1){
			$GLOBALS['TSFE']->additionalFooterData['careerJS'] = $additionalDataJS;
		}else{
			$GLOBALS['TSFE']->additionalHeaderData['careerJS'] = $additionalDataJS;	
		}
		
		if($settings['includeCSSinFooter']==1){
			$GLOBALS['TSFE']->additionalFooterData['careerCSS'] = $additionalDataCSS;
		}else{
			$GLOBALS['TSFE']->additionalHeaderData['careerCSS'] = $additionalDataCSS;	
		}
	}
	
	/**
	 * validate
	 *
	 * @param $formFields
	 * @param $arg
	 * @return
	 */
	 
	function validate($formFields)
	{
		$error = array();
		
		$require = array("name","email","phone","resume");

		foreach ($require as $key => $value) {
			
			
			if($value=="resume"){
				if($formFields[$value]['type']!="application/pdf" && $formFields[$value]['error']!=0){
					$error[$value.".valid"] = $value;
				}
			}else{
				if($formFields[$value]==""){
					
					$error[$value.".blank"] = $value;
					
				}else if($value=="email"){
					
					if (!filter_var($formFields[$value], FILTER_VALIDATE_EMAIL)) {
						$error[$value.".valid"] = $value;
					}
				}
			}
		}
		
		return $error;
	}
	
	
 	/**
	 * insertUserData
	 *
	 * @param $userData
	 * @param $storagePID
	 * @param $job
	 * @return
	 */
	
	function insertUserData($userData,$storagePID,$job)
	{
		$file = array();
		
		$file['name']		= $userData['resume']['name'];
		$file['type']		= $userData['resume']['type'];
		$file['tmp_name']	= $userData['resume']['tmp_name'];
		$file['size']		= $userData['resume']['size'];

		$insertArray = array(
						'pid' 			=> $storagePID,
						'tstamp'		=> $GLOBALS['EXEC_TIME'],
						'crdate'		=> $GLOBALS['EXEC_TIME'],
						'name'			=> $userData['name']==""?"":$userData['name'],
						'email'			=> $userData['email']==""?"":$userData['email'],
						'phone'			=> $userData['phone']==""?"":$userData['phone'],
						'resume'		=> 1,
						'job'			=> $job,
						'contact_date'	=> time(),
						'ip'			=> $this->geIPAddress(),
						'useragent'		=> \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('HTTP_USER_AGENT'),
					);
					
		$uid = $this->jobRepository->insertUserData($insertArray);
		
		
		if ($file['name']) {
			unset($_SESSION['tempFile']);
			$files = $this->uploadFile($file['name'], $file['type'], $file['tmp_name'], $file['size']);
			$_SESSION['tempFile'] = $files;
			return $sysFileCreate = $this->jobRepository->myFileOperationsFal($files, $file['type'], $file['size'], $uid, $storagePID);
		}
	}

	/**
	 * uploadFile
	 * @param $name
	 * @param $type
	 * @param $temp
	 * @param $size
	 * @return
	*/
		
	protected function uploadFile($name, $type, $temp, $size) {
		
		if($size > 0) {
			$basicFileFunctions = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('t3lib_basicFileFunctions');
			
			$uploadPath = 'fileadmin/user_upload/career';
			
			$name = $basicFileFunctions->cleanFileName($name);
			$uploadPath = $basicFileFunctions->cleanDirectoryName($uploadPath);
			$uniqueFileName = $basicFileFunctions->getUniqueName($name, $uploadPath);
			$fileStored = move_uploaded_file($temp, $uniqueFileName);
			
			$returnValue = basename($uniqueFileName);
		}
		
		return $returnValue;
	}
		
	
	/**
	 * geIPAddress
	 *
	 * @return
	*/
	function geIPAddress()
	{
	      if(!empty($_SERVER['TYPO3_DB']))
	      {
	            $ip = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('HTTP_CLIENT_IP');	        // Check ip from share internet
	            
	      }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	      	
	            $ip = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('HTTP_X_FORWARDED_FOR');    //to check ip is pass from proxy
	            
	      }else{
	            $ip = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('REMOTE_ADDR');
	      }
	      return $ip;
	}
	
	/**
	 * noAccess
	 *
	 * @return
	 */
	public function noAccess() {
		die('<h1>Sorry</h1><p>You do not have the right to download this file.');
	}
	
	/**
	 * getTrim
	 *
	 * @param $val
	 * @return
	 */
	
	public function getTrim($val){
		return trim($val);
	}
	
	
 	/**
	 * sendMail
	 *
	 * @param $to
	 * @param $subject
	 * @param $html
	 * @param $plain
	 * @param $fromEmail
	 * @param $fromName
	 * @param $replyToEmail
	 * @param $replyToName
	 * @param $bccName
	 * @param $bccEmail
	 * @param $returnPath
	 * @param $attachements
	 * @return
	 */
	
 	public static function sendMail($to, $subject, $html, $plain, $fromEmail = '', $fromName = '', $replyToEmail = '', $replyToName = '', $bccName = '', $bccEmail = '', $returnPath = '', $attachements = array()) {
	  		
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
		$message->setBody($html, 'text/html', 'utf-8');
		 
		// Plain
		if ($plain) {
			$message->addPart($plain, 'text/plain', 'utf-8');
		}
		 
		// Return Path
		if (trim($returnPath)) {
			$message->setReturnPath($returnPath);
		}

		// Bcc
		if ($bccEmail) {
			$message->setBcc(array($bccEmail => $bccName));
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
		if (count($attachements)>0 && is_array($attachements)) {
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
		
//		print_r($message);
		 
		// Mail Send
		return  $message->send();
	}
}

?>