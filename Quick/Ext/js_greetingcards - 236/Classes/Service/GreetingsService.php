<?php
namespace JS\JsGreetingcards\Service;

/*
 *  (c) 2015 Jainish Senjaliya <jainish.online@gmail.com>
 *  Jainish Senjaliya <jainish.online@gmail.com>
*/

class GreetingsService implements \TYPO3\CMS\Core\SingletonInterface {
	
	/**
	 * greetingsWishesRepository
	 * 
	 * @var \JS\JsGreetingcards\Domain\Repository\GreetingsWishesRepository
	 * @inject
	 */
	protected $greetingsWishesRepository = NULL;
	
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
		}else if($settings['main']['pid']=="" ){
			return 'pid';
		}else if($settings['main']['storagePID']=="" ){
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
		$additionalDataJS = $additionalDataCSS	= "";

		$additionalDataJS	.= '<script src="typo3conf/ext/js_greetingcards/Resources/Public/Script/textareaCounter.js" type="text/javascript"></script>';
		
		if(!empty($settings['uri']['javascript'])){
			$additionalDataJS	.= '<script src="'.$settings['uri']['javascript'].'" type="text/javascript"></script>';
		}
		

		if(!empty($settings['uri']['css'])){
			$additionalDataCSS	= '<link rel="stylesheet" href="'.$settings['uri']['css'].'" type="text/css" media="all" />';
		}

		if($settings['additional']['includeJSinFooter']==1){
			$GLOBALS['TSFE']->additionalFooterData['careerJS'] = $additionalDataJS;
		}else{
			$GLOBALS['TSFE']->additionalHeaderData['careerJS'] = $additionalDataJS;	
		}
		
		if($settings['additional']['includeCSSinFooter']==1){
			$GLOBALS['TSFE']->additionalFooterData['careerCSS'] = $additionalDataCSS;
		}else{
			$GLOBALS['TSFE']->additionalHeaderData['careerCSS'] = $additionalDataCSS;	
		}
	}
	
	
 	/**
	 * insertUserData
	 *
	 * @param $settings
	 * @param $pdfContent
	 * @return
	 */
	
	function insertUserData($settings,$pdfContent)
	{
		$path = "fileadmin/user_upload/tx_greetingcards";
		
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
		}

		set_time_limit(300);
		ini_set('memory_limit', '-1');

		//echo $pdfContent; die;
		
		$dompdf = new \DOMPDF();
		$dompdf->load_html($pdfContent);
		$dompdf->set_paper( 'A4' , 'portrait' );
		$dompdf->render();
		
		$dompdf->stream('sample.pdf'); die;

		$output = $dompdf->output();
		
		$basicFileFunctions = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('t3lib_basicFileFunctions');
		
		$file = strtolower(trim($_SESSION['greeting']['data']['name'])).".pdf";
		
		$name = $basicFileFunctions->cleanFileName($file);
		$uploadPath = $basicFileFunctions->cleanDirectoryName($path);
		$uniqueFileName = $basicFileFunctions->getUniqueName($name, $path);
		
		$_SESSION['greeting']['PDF'] = $uniqueFileName;
		
		file_put_contents($uniqueFileName, $output);
		
		$file = array();
		
		$file['name']		= $userData['resume']['name'];
		$file['type']		= $userData['resume']['type'];
		$file['tmp_name']	= $userData['resume']['tmp_name'];
		$file['size']		= $userData['resume']['size'];

		$insertArray = array(
						'pid' 			=> $settings['main']['storagePID'],
						'tstamp'		=> $GLOBALS['EXEC_TIME'],
						'crdate'		=> $GLOBALS['EXEC_TIME'],
						
						'name'			=> $_SESSION['greeting']['data']['name'],
						'patient_name'	=> $_SESSION['greeting']['data']['patient_name'],
						'room'			=> $_SESSION['greeting']['data']['room'],
						'description'	=> $_SESSION['greeting']['data']['description'],
						'header'        => $_SESSION['greeting']['data']['header'],
						'card'			=> $_SESSION['greeting']['card'],
						'generated_pdf'	=> basename($uniqueFileName),
						
						'admin_name'		=> $settings['flexform']['receiver']['name'],
						'admin_email'		=> $settings['flexform']['receiver']['email'],
						'mail_subject'		=> $settings['flexform']['receiver']['subject'],
						'creation_date'		=> $GLOBALS['EXEC_TIME'],
						'sender_ip'			=> $this->geIPAddress(),
						'user_agent'		=> \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('HTTP_USER_AGENT'),
						
						'marketing_referer_domain'		=> \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_SITE_URL'),
						'marketing_referer'				=> \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_REQUEST_URL'),
						'page'							=> $GLOBALS['TSFE']->id,
						'marketing_mobile_device'		=> $this->is_mobile(),
						'marketing_frontend_language'	=> $GLOBALS['TSFE']->sys_language_uid,
						'marketing_browser_language'	=> $this->browserLanguage(),
					);
					
		return $this->greetingsWishesRepository->insertUserData($insertArray);
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
	
 	/**
	 * unsetSession
	 *
	 * @return
	 */
	
	function unsetSession()
	{
		unset($_SESSION['STEP']);
		unset($_SESSION['greeting']);
	}
	
 	/**
	 * browserLanguage
	 *
	 * @return
	 */
	
	function browserLanguage()
	{
		$prefered_languages = array();
		
		if(preg_match_all("#([^;,]+)(;[^,0-9]*([0-9\.]+)[^,]*)?#i", $_SERVER["HTTP_ACCEPT_LANGUAGE"], $matches, PREG_SET_ORDER)) {

			$priority = 1.0;
			
			foreach($matches as $match) {
				if(!isset($match[3])) {
					$pr = $priority;
					$priority -= 0.001;
				} else {
					$pr = floatval($match[3]);
				}
				
				$prefered_languages[$match[1]] = $pr;
			}
		
			arsort($prefered_languages, SORT_NUMERIC);
			
			foreach($prefered_languages as $language => $priority) {
				return $language;
			}
		}
	}
	
 	/**
	 * is_mobile
	 *
	 * @return
	 */
	function is_mobile() {
	
		// Get the user agent
	
		$user_agent = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('HTTP_USER_AGENT');
	
	
		$mobile_agents = Array(
	
			"240x320",
			"acer",
			"acoon",
			"acs-",
			"abacho",
			"ahong",
			"airness",
			"alcatel",
			"amoi",	
			"android",
			"anywhereyougo.com",
			"applewebkit/525",
			"applewebkit/532",
			"asus",
			"audio",
			"au-mic",
			"avantogo",
			"becker",
			"benq",
			"bilbo",
			"bird",
			"blackberry",
			"blazer",
			"bleu",
			"cdm-",
			"compal",
			"coolpad",
			"danger",
			"dbtel",
			"dopod",
			"elaine",
			"eric",
			"etouch",
			"fly " ,
			"fly_",
			"fly-",
			"go.web",
			"goodaccess",
			"gradiente",
			"grundig",
			"haier",
			"hedy",
			"hitachi",
			"htc",
			"huawei",
			"hutchison",
			"inno",
			"ipad",
			"ipaq",
			"ipod",
			"jbrowser",
			"kddi",
			"kgt",
			"kwc",
			"lenovo",
			"lg ",
			"lg2",
			"lg3",
			"lg4",
			"lg5",
			"lg7",
			"lg8",
			"lg9",
			"lg-",
			"lge-",
			"lge9",
			"longcos",
			"maemo",
			"mercator",
			"meridian",
			"micromax",
			"midp",
			"mini",
			"mitsu",
			"mmm",
			"mmp",
			"mobi",
			"mot-",
			"moto",
			"nec-",
			"netfront",
			"newgen",
			"nexian",
			"nf-browser",
			"nintendo",
			"nitro",
			"nokia",
			"nook",
			"novarra",
			"obigo",
			"palm",
			"panasonic",
			"pantech",
			"philips",
			"phone",
			"pg-",
			"playstation",
			"pocket",
			"pt-",
			"qc-",
			"qtek",
			"rover",
			"sagem",
			"sama",
			"samu",
			"sanyo",
			"samsung",
			"sch-",
			"scooter",
			"sec-",
			"sendo",
			"sgh-",
			"sharp",
			"siemens",
			"sie-",
			"softbank",
			"sony",
			"spice",
			"sprint",
			"spv",
			"symbian",
			"tablet",
			"talkabout",
			"tcl-",
			"teleca",
			"telit",
			"tianyu",
			"tim-",
			"toshiba",
			"tsm",
			"up.browser",
			"utec",
			"utstar",
			"verykool",
			"virgin",
			"vk-",
			"voda",
			"voxtel",
			"vx",
			"wap",
			"wellco",
			"wig browser",
			"wii",
			"windows ce",
			"wireless",
			"xda",
			"xde",
			"zte"
		);
	
		// Pre-set $is_mobile to false.
	
		$is_mobile = false;
	
		// Cycle through the list in $mobile_agents to see if any of them
		// appear in $user_agent.
	
		foreach ($mobile_agents as $device) {
	
			// Check each element in $mobile_agents to see if it appears in
			// $user_agent.  If it does, set $is_mobile to true.
	
			if (stristr($user_agent, $device)) {
	
				$is_mobile = true;
	
				// break out of the foreach, we don't need to test
				// any more once we get a true value.
	
				break;
			}
		}
	
		return $is_mobile;
	}
	
	/**
	 * Get Subfolder of current TYPO3 Installation
	 *        and never return "//"
	 *
	 * @param bool $leadingSlash will be prepended
	 * @param bool $trailingSlash will be appended
	 * @param string $testHost can be used for a test
	 * @param string $testUrl can be used for a test
	 * @return string
	 */
	public static function getSubFolderOfCurrentUrl($leadingSlash = TRUE, $trailingSlash = TRUE, $testHost = NULL, $testUrl = NULL) {
		$subfolder = '';
		$typo3RequestHost = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_REQUEST_HOST');
		if ($testHost) {
			$typo3RequestHost = $testHost;
		}
		$typo3SiteUrl = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_SITE_URL');
		if ($testUrl) {
			$typo3SiteUrl = $testUrl;
		}

		// if subfolder
		if ($typo3RequestHost . '/' !== $typo3SiteUrl) {
			$subfolder = substr(str_replace($typo3RequestHost . '/', '', $typo3SiteUrl), 0, -1);
		}
		if ($trailingSlash && substr($subfolder, 0, -1) !== '/') {
			$subfolder .= '/';
		}
		if ($leadingSlash && $subfolder[0] !== '/') {
			$subfolder = '/' . $subfolder;
		}
		return $subfolder;
	}

}

require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('js_greetingcards') . 'Classes/Utility/Dompdf/dompdf.php');

?>
