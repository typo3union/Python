<?php
namespace Typo3\Course\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Ajay Gohel <shared_user@webofficeindia.com>, WOI
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
 * CourseController
 */
class CourseController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * courseRepository
	 * 
	 * @var \Typo3\Course\Domain\Repository\CourseRepository
	 * @inject
	 */
	protected $courseRepository = NULL;
	

	/**
	 * action list
	 * 
	 * @return void
	 */
	public function listAction() {
		$storageFolder = $this->settings['storagePid'];
		$course = $this->courseRepository->findAlldata($storageFolder);
		
		foreach($course as $key=>$value){
					$imgArray = explode(",",$course[$key]['images']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$course[$key]['imgArray'] = $imgArray;												
		}
		
		$this->view->assign('courses', $course);
		
		
	}
	
	function lastMinuteAction(){
		$courseUid = $_GET['tx_course_course']['course'];
		
		$storageFolder = $this->settings['storagePid'];
		$lastMinuteDays = $this->settings['lastMinuteDays'];
		
		$courses = $this->courseRepository->findAll();	
		$this->view->assign('courses', $courses);
		
		$singlecourse  = $this->courseRepository->findDetailUId($storageFolder,$courseUid);
		$this->view->assign('singlecourse', $singlecourse);
		
		
		$course  = $this->courseRepository->findDetailUId($storageFolder,$courseUid);
		foreach($course as $key=>$value){
					$imgArray = explode(",",$course[$key]['images']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$course[$key]['imgArray'] = $imgArray;												
		}
		$related_courses  = $this->courseRepository->findRelatedCourses($storageFolder,$courseUid);
		
		foreach($related_courses as $key=>$value){
					$imgArray = explode(",",$related_courses[$key]['bannerimages']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$related_courses[$key]['imgArray'] = $imgArray;	
					$imgArray2 = explode(",",$related_courses[$key]['images']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$related_courses[$key]['imgArray2'] = $imgArray2;												
		} 
		
		$courses_lastday = $this->courseRepository->findLastDay($lastMinuteDays);	
		$this->view->assign('courses_lastday', $courses_lastday);
		$this->view->assign('related_courses', $related_courses);
		
		$this->view->assign('courseList', $course);
	}

	/**
	 * action show
	 * 
	 * @param \Typo3\Course\Domain\Model\Course $course
	 * @return void
	 */
	public function showAction() {
		$courseUid = $_GET['tx_course_course']['course'];
		$storageFolder = $this->settings['storagePid'];
		$course  = $this->courseRepository->findDetailUId($storageFolder,$courseUid);
		foreach($course as $key=>$value){
					$imgArray = explode(",",$course[$key]['images']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$course[$key]['imgArray'] = $imgArray;												
		}
		$related_courses  = $this->courseRepository->findRelatedCourses($storageFolder,$courseUid);
			
		foreach($related_courses as $key=>$value){
					$imgArray = explode(",",$related_courses[$key]['bannerimages']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$related_courses[$key]['imgArray'] = $imgArray;		
					$imgArray2 = explode(",",$related_courses[$key]['images']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$related_courses[$key]['imgArray2'] = $imgArray2;											
		} 
		
		if($course[0]['metaTitle']){
			$GLOBALS['TSFE']->additionalHeaderData['meta'] = html_entity_decode('<meta name="keywords" content="'.$course[0]['metaTitle'].'">'); 
		}
		if($course[0]['metaDesc']){
			$GLOBALS['TSFE']->additionalHeaderData['meta1'] = html_entity_decode('<meta name="description" content="'.$course[0]['metaDesc'].'">'); 
		}
		
		$this->view->assign('related_courses', $related_courses);
		
		$this->view->assign('courses', $course);
	}
	
	public function categoryShowAction() {
		if(isset($_GET['category_id'])){
			$course  = $this->courseRepository->findCatUId($_GET['category_id']);
			$this->view->assign('category', $category);
		}
		
	}
	
		
	public function bannerAction() {
		$courseUid = $_GET['tx_course_course']['course'];
		$storageFolder = $this->settings['storagePid'];
		$course  = $this->courseRepository->findDetailUId($storageFolder,$courseUid);
		foreach($course as $key=>$value){
					$imgArray = explode(",",$course[$key]['bannerimages']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$course[$key]['imgArray'] = $imgArray;												
		}
		$this->view->assign('courses', $course);
	}
	
	
	
	public function kursinformationenAction() {
		$courseUid = $_GET['tx_course_course']['course'];
		$storageFolder = $this->settings['storagePid'];
		$course  = $this->courseRepository->findDetailUId($storageFolder,$courseUid);
		$related_courses  = $this->courseRepository->findRelatedCourses($storageFolder,$courseUid);
		foreach($related_courses as $key=>$value){
					$imgArray = explode(",",$related_courses[$key]['bannerimages']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$related_courses[$key]['imgArray'] = $imgArray;	
					$imgArray2 = explode(",",$related_courses[$key]['images']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$related_courses[$key]['imgArray2'] = $imgArray2;												
		} 
		foreach($course as $key=>$value){
					$imgArray = explode(",",$course[$key]['images']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$course[$key]['imgArray'] = $imgArray;												
		}
		$this->view->assign('courses', $course);
		$this->view->assign('related_courses', $related_courses);
	}
	
	public function kursinhalteAction() {
		$courseUid = $_GET['tx_course_course']['course'];
		$storageFolder = $this->settings['storagePid'];
		//$courses = $this->courseRepository->findDetailUId($storageFolder,$courseUid);
		$courses = $this->courseRepository->findByUid($courseUid);	
		$course = $this->courseRepository->findDetailUId($storageFolder,$courseUid);
		foreach($course as $key=>$value){
					$imgArray = explode(",",$course[$key]['images']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$course[$key]['imgArray'] = $imgArray;												
		}
		$related_courses  = $this->courseRepository->findRelatedCourses($storageFolder,$courseUid);
		foreach($related_courses as $key=>$value){
					$imgArray = explode(",",$related_courses[$key]['bannerimages']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$related_courses[$key]['imgArray'] = $imgArray;	
					$imgArray2 = explode(",",$related_courses[$key]['images']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$related_courses[$key]['imgArray2'] = $imgArray2;												
		} 
		if(isset($_GET['tx_course_course']['file'])){
			$this->download($_GET['tx_course_course']['file']);
		}
		
		$this->view->assign('courseList', $course);
		$this->view->assign('courses', $courses);
		$this->view->assign('related_courses', $related_courses);

	}
	public function contactFormAction() {
		$courseUid = $_GET['tx_course_course']['course'];
		$storageFolder = $this->settings['storagePid'];
		//$courses = $this->courseRepository->findDetailUId($storageFolder,$courseUid);
		$courses = $this->courseRepository->findByUid($courseUid);	
		$course = $this->courseRepository->findDetailUId($storageFolder,$courseUid);
		foreach($course as $key=>$value){
					$imgArray = explode(",",$course[$key]['images']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$course[$key]['imgArray'] = $imgArray;												
		}
		
		$related_courses  = $this->courseRepository->findRelatedCourses($storageFolder,$courseUid);
		foreach($related_courses as $key=>$value){
					$imgArray = explode(",",$related_courses[$key]['bannerimages']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$related_courses[$key]['imgArray'] = $imgArray;	
					$imgArray2 = explode(",",$related_courses[$key]['images']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$related_courses[$key]['imgArray2'] = $imgArray2;												
		} 
		if(isset($_GET['tx_course_course']['file'])){
			$this->download($_GET['tx_course_course']['file']);
		}
		
		$this->view->assign('courseList', $course);
		$this->view->assign('courses', $courses);	
		$this->view->assign('related_courses', $related_courses);
	}
	
	public function weitereInformationenAction() {
		$courseUid = $_GET['tx_course_course']['course'];
		$storageFolder = $this->settings['storagePid'];
		//$courses = $this->courseRepository->findByUid($courseUid);
		$courses  = $this->courseRepository->findDetailUId($storageFolder,$courseUid);	
		foreach($courses as $key=>$value){
					$imgArray = explode(",",$courses[$key]['images']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$courses[$key]['imgArray'] = $imgArray;												
		}
		$related_courses  = $this->courseRepository->findRelatedCourses($storageFolder,$courseUid);
		foreach($related_courses as $key=>$value){
					$imgArray = explode(",",$related_courses[$key]['bannerimages']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$related_courses[$key]['imgArray'] = $imgArray;	
					$imgArray2 = explode(",",$related_courses[$key]['images']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$related_courses[$key]['imgArray2'] = $imgArray2;												
		} 
		if(isset($_GET['tx_course_course']['file'])){
			$this->download($_GET['tx_course_course']['file']);
		}
		
		$this->view->assign('courses', $courses);	
		$this->view->assign('related_courses', $related_courses);

	}
	
	
	
	
	
	public function anmeldungAction(){
		$courseUid = $_GET['tx_course_course']['course'];
		$storageFolder = $this->settings['storagePid'];
		$course  = $this->courseRepository->findDetailUId($storageFolder,$courseUid);
		foreach($course as $key=>$value){
					$imgArray = explode(",",$course[$key]['images']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$course[$key]['imgArray'] = $imgArray;												
		}
		$this->view->assign('courses', $course);
	}
	
	public function termineundAnmeldungAction(){
		$courseUid = $_GET['tx_course_course']['course'];
		$storageFolder = $this->settings['storagePid'];
		//$courses = $this->courseRepository->findDetailUId($storageFolder,$courseUid);
		$courses = $this->courseRepository->findByUid($courseUid);	
		$course = $this->courseRepository->findDetailUId($storageFolder,$courseUid);
		foreach($course as $key=>$value){
					$imgArray = explode(",",$course[$key]['images']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$course[$key]['imgArray'] = $imgArray;												
		}
		
		$coursesArray = $this->courseRepository->findDates($storageFolder,$courseUid);	
		$coursesArray_0 = $this->courseRepository->findTypeDates($storageFolder,$courseUid,0);	
		$coursesArray_1 = $this->courseRepository->findTypeDates($storageFolder,$courseUid,1);	
		
		
		$related_courses  = $this->courseRepository->findRelatedCourses($storageFolder,$courseUid);
		foreach($related_courses as $key=>$value){
					$imgArray = explode(",",$related_courses[$key]['bannerimages']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$related_courses[$key]['imgArray'] = $imgArray;												
		} 
		foreach($coursesArray as $key=>$value){
			$coursesArray[$key]['durationtiming'] = $this->courseRepository->findallDates($value['uid_foreign']);		
		}	
		
		$findMonth = $this->courseRepository->findFirstMonth($courseUid);
			
		$start_date = $findMonth[0]['startdate'];
		$start = strtotime($start_date);
		$month = date('m',$start);
		$year = date('Y',$start);
		
		$month_1 = date("m", strtotime('+1 month', $start));
		$month_2 = date("m", strtotime('+2 month', $start));
		
		$coursesMonth1 = $this->showMonth($month, $year);
		$coursesMonth2 = $this->showMonth($month_1, $year);
		$coursesMonth3 = $this->showMonth($month_2, $year);
		
		$this->view->assign('coursesMonth1', $coursesMonth1);
		$this->view->assign('coursesMonth2', $coursesMonth2);
		$this->view->assign('coursesMonth3', $coursesMonth3);
		$GLOBALS['TSFE']->additionalFooterData[1000] = '<script type="text/javascript" src="/typo3conf/ext/course/Resources/Public/res/ajaxFunction.js"></script>
			<script src="/typo3conf/ext/course/Resources/Public/res/bootstrap-transition.js"></script> 
			<script src="/typo3conf/ext/course/Resources/Public/res/bootstrap-carousel.js"></script>
			<script src="/typo3conf/ext/course/Resources/Public/res/script.js"></script>
		';
		
		$this->view->assign('courses', $courses);
		$this->view->assign('courseList', $course);
		$this->view->assign('coursesArray', $coursesArray);
		$this->view->assign('related_courses', $related_courses);
		$this->view->assign('coursesArray_0', $coursesArray_0);
		$this->view->assign('coursesArray_1', $coursesArray_1);
		
		
	}
	
	public function priceAction(){
		$courseUid = $_GET['tx_course_course']['course'];
		$storageFolder = $this->settings['storagePid'];
		//$courses = $this->courseRepository->findDetailUId($storageFolder,$courseUid);
		
		if(isset($_GET['tx_course_course']['cUid'])){
			$priceUid = $_GET['tx_course_course']['cUid'];
			$courses_innerPrice = $this->courseRepository->findByPrice($courseUid,$priceUid);	
			if($courses_innerPrice[0] != ""){
				$this->view->assign('courses_innerPrice', $courses_innerPrice);
			}
		}else{
			$courses = $this->courseRepository->findByUid($courseUid);	
		    $this->view->assign('courses', $courses);
		}
	}
	
	public function ajaxAction(){
		$courseUid = $_GET['tx_course_course']['course'];
		$storageFolder = $this->settings['storagePid'];
		//$courses = $this->courseRepository->findDetailUId($storageFolder,$courseUid);
		$courses = $this->courseRepository->findByUid($courseUid);	
		$month = $_GET['month'];
		$year = $_GET['year']; 
		
		$month_1 = str_pad($month+1, 2, '0', STR_PAD_LEFT); 
		$month_2 = str_pad($month+2, 2, '0', STR_PAD_LEFT); 
		
		$coursesMonth1 = $this->showMonth($month, $year);
		$coursesMonth2 = $this->showMonth($month_1, $year);
		$coursesMonth3 = $this->showMonth($month_2, $year);
		
		$this->view->assign('coursesMonth1', $coursesMonth1);
		$this->view->assign('coursesMonth2', $coursesMonth2);
		$this->view->assign('coursesMonth3', $coursesMonth3);
		
		$this->view->assign('courses', $courses);
	}
	
	public function download($file_name){
		
		// grab the requested file's name
			$file_name; 
			
			// make sure it's a file before doing anything!
			if(is_file($file_name)) {

				/*
					Do any processing you'd like here:
					1.  Increment a counter
					2.  Do something with the DB
					3.  Check user permissions
					4.  Anything you want!
				*/

				// required for IE
				if(ini_get('zlib.output_compression')) { ini_set('zlib.output_compression', 'Off');	}

				// get the file mime type using the file extension
				switch(strtolower(substr(strrchr($file_name, '.'), 1))) {
					case 'pdf': $mime = 'application/pdf'; break;
					case 'zip': $mime = 'application/zip'; break;
					case 'jpeg':
					case 'jpg': $mime = 'image/jpg'; break;
					default: $mime = 'application/force-download';
				}
				header('Pragma: public'); 	// required
				header('Expires: 0');		// no cache
				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
				header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($file_name)).' GMT');
				header('Cache-Control: private',false);
				header('Content-Type: '.$mime);
				header('Content-Disposition: attachment; filename="'.basename($file_name).'"');
				header('Content-Transfer-Encoding: binary');
				header('Content-Length: '.filesize($file_name));	// provide file size
				header('Connection: close');
				readfile($file_name);		// push it out
				exit();

			}
		}
		
	function showMonth($month, $year)
			{
			
			$loc_de = setlocale(LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge');
				
			$date = mktime(12, 0, 0, $month, 1, $year);
			$daysInMonth = date("t", $date);
			// calculate the position of the first day in the calendar (sunday = 1st column, etc)
			$offset = date("w", $date); 
			$offset = $offset-1;
			$rows = 1;
			$div .= "<thead>
                            <tr class='month'>
                               <th colspan='7'>".strftime("%B %Y", $date)."</th>
                            </tr>
                            <tr>
								<th>Mo</th>
                                <th>Di</th>
                                <th>Mi</th>
                                <th>Do</th>
                                <th>Fr</th>
                                <th>Sa</th>                               
								<th>So</th>
                            </tr>
                        </thead>";
			$div .= "<tbody><tr>";			 
			for($i = 1; $i <= $offset; $i++)
			{
				$div .= "<td></td>";
			}
			
			for($day = 1; $day <= $daysInMonth; $day++)
			{

				$day = str_pad($day, 2, '0', STR_PAD_LEFT); 
							
				if( ($day + $offset - 1 ) % 7 == 0 && $day != 1) //if( ($day + $offset - 1) % 7 == 0 && $day != 1)
				{
				$div .= "</tr><tr>";
				$rows++;
				}
				 
				$div .= "<td class='clday tm_".$day."-".$month."-".$year."' data-day=".$day."-".$month."-".$year.">" . $day . "</td>";
			}
			while( ($day + $offset) <= $rows * 7)
			{
				$div .= "<td></td>";
				$day++;
			}
			$div .= "</tr></tbody>";
			
			return $div;
			}	
	
	
	public function bookingFormAction() {
		
		$courseUid = $_GET['tx_course_course']['course'];
		$storageFolder = $this->settings['storagePid'];
		$course  = $this->courseRepository->findDetailUId($storageFolder,$courseUid);
	
		if(isset($_POST['booking_submit'])){
			$data = $_POST['tx_powermail_pi1']['field'];	
		
			$insertFields = array (
					'pid'			=> 41,
					'firstname'		=> $data['name'],
					'lastname'		=> $data['vorname'],
					'state'			=> $data['straehausnummer'],
					'ort'			=> $data['ort'],
					'postal'		=> $data['postleitzahl'],
					'email'			=> $data['e_mail'],
					'mobile'		=> $data['mobiltelefon'],
					'dob'			=> $data['geburtsdatum'],
					'reduction'		=> $data['ermigung'],
					'message'		=> $data['nachricht'],
					'course'		=> $data['coursetitle'],
					'coursedate'	=> $data['cursdate'],
					'couseprice'	=> $data['coursePrice'],
					'tstamp'		=> time(),
					'crdate'		=> time(),
					'deleted'		=> 0, 
					'hidden'		=> 0
				 );
			 	$GLOBALS['TYPO3_DB']->exec_INSERTquery('tx_course_domain_model_courseBooking', $insertFields);
				
				$adminName 		= $this->settings['flexform']['order']['senderName'];
				$adminEmail 	= $this->settings['flexform']['order']['senderEmail'];
				$adminSubject 	= $this->settings['flexform']['order']['senderSubject'];
				$mailBody 		= $this->settings['flexform']['order']['mailBody'];		
				$mailBodyAdmin	= $this->settings['flexform']['order']['mailBodyAdmin'];
				$receiverEmail  = array(
						 0 => array(
								'email' => $data['e_mail'],
								'name' => $data['name']
							)
				);
				$receiverEmail1  = array(
					0 => array(
								'email' => $this->settings['flexform']['order']['recieverEmail'],
								'name' => $adminName
							)
				);					
							
				$mailBody1 .= '<br/><br/><table border="1" cellpadding="5" cellspacing="2" style="border: 1px solid rgb(102, 102, 102); background: rgb(247, 247, 247); ">
						<tbody>
							<tr>
								<th>Name</th>
								<td>'.$data['name'].'</td>
							</tr>
							<tr>
								<th>Vorname</th>
								<td>'.$data['vorname'].'</td>
							</tr>
							<tr>
								<th>Straße, Hausnummer</th>
								<td>'.$data['straehausnummer'].'</td>
							</tr>
							<tr>
								<th>Ort</th>
								<td>'.$data['ort'].'</td>
							</tr>
							<tr>
								<th>Postleitzahl</th>
								<td>'.$data['postleitzahl'].'</td>
							</tr>
							<tr>
								<th>E-mail</th>
								<td>'.$data['e_mail'].'</td>
							</tr>
							<tr>
								<th>Mobiltelefon</th>
								<td>'.$data['mobiltelefon'].'</td>
							</tr>
							<tr>
								<th>Geburtsdatum</th>
								<td>'.$data['geburtsdatum'].'</td>
							</tr>
							<tr>
								<th>Ermäßigung</th>								
								<td>'.$data['ermigung'].'</td>
							</tr>
							<tr>
								<th>Nachricht</th>
								<td>'.$data['nachricht'].'</td>
							</tr>
							<tr>
								<th>Kurs</th>
								<td>'.$data['coursetitle'].'</td>
							</tr>
							<tr>
								<th>Kurs Datum</th>
								<td>'.$data['cursdate'].'</td>
							</tr>
							<tr>
								<th>Kurs Preis</th>
								<td>'.$data['coursePrice'].'</td>
							</tr>		
							
				';
				$mailBody1 .= '</tbody></table><br/><br/>';
				$mailBody2 = str_replace('{all}',$mailBody1,$mailBodyAdmin);
				
				$search = array('{firstname}','{lastname}');
				$replace = array($data['vorname'],$data['name']);
				$new_mailBody = str_replace($search,$replace,$mailBody);
		
							
				$send = $this->sendMail($receiverEmail,$adminSubject,$new_mailBody,'',$adminEmail,$adminName,'','','','',$this->settings);
				$send1 = $this->sendMail($receiverEmail1,$adminSubject,$mailBody2,'',$adminEmail,$adminName,'','','','',$this->settings);
									
				$adword = $course[0]['bookingadwords'];
                $GLOBALS['TSFE']->additionalFooterData['bookingJavascript'] = html_entity_decode($adword); 
				
				$satus= 'Mail Sent';
			}  
		
		
		 		
		
		$this->view->assign('courses', $course[0]);
		$this->view->assign('satus', $satus);
	}
	
	public function courseContactFormAction() {			
		$courseUid = $_GET['tx_course_course']['course'];
		$storageFolder = $this->settings['storagePid'];
		$course  = $this->courseRepository->findDetailUId($storageFolder,$courseUid);
	
		if(isset($_POST['course_kontakt_form'])){
			$data = $_POST['tx_powermail_pi1']['field'];		
			$insertFields = array (
					'pid'			=> 59,
					'firstname'		=> $data['name'],
					'lastname'		=> $data['vorname'],					
					'email'			=> $data['e_mail'],
					'mobile'		=> $data['mobiltelefon'],					
					'message'		=> $data['nachricht'],
					'course'		=> $course[0]['name'],
					'tstamp'		=> time(),
					'crdate'		=> time(),
					'deleted'		=> 0, 
					'hidden'		=> 0
				 );
				 
				$check = $GLOBALS['TYPO3_DB']->exec_INSERTquery('tx_course_domain_model_courseKontakt', $insertFields);
						
			 	$adminName 		= $this->settings['flexform']['order']['senderName'];
				$adminEmail 	= $this->settings['flexform']['order']['senderEmail'];
				$adminSubject 	= $this->settings['flexform']['order']['senderSubject'];
				$mailBody 		= $this->settings['flexform']['order']['mailBody'];		
				$mailBodyAdmin	= $this->settings['flexform']['order']['mailBodyAdmin'];
				$receiverEmail  = array(
						 0 => array(
								'email' => $data['e_mail'],
								'name' => $data['name']
							)
				);
				$receiverEmail1  = array(
					0 => array(
								'email' => $this->settings['flexform']['order']['recieverEmail'],
								'name' => $adminName
							)
				);													
				$mailBody1 .= '<table border="1" cellpadding="5" cellspacing="2" style="border: 1px solid rgb(102, 102, 102); background: rgb(247, 247, 247); ">
						<tbody>
							<tr>
								<th>Name</th>
								<td>'.$data['name'].'</td>
							</tr>
							<tr>
								<th>Vorname</th>
								<td>'.$data['vorname'].'</td>
							</tr>
							<tr>
								<th>E_mail</th>
								<td>'.$data['e_mail'].'</td>
							</tr>
							<tr>
								<th>Mobiltelefon</th>
								<td>'.$data['mobiltelefon'].'</td>
							</tr>
							<tr>
								<th>Nachricht</th>
								<td>'.$data['nachricht'].'</td>
							</tr>
							<tr>
								<th>Kurs</th>
								<td>'.$course[0]['name'].'</td>
							</tr>		
							
				';
				$mailBody1 .= '</tbody></table>';				
				$mailBody2 = str_replace('{all}',$mailBody1,$mailBodyAdmin);
				
				$search = array('{firstname}','{lastname}');
				$replace = array($data['vorname'],$data['name']);
				$mailBody = str_replace($search,$replace,$mailBody);
							
				$send = $this->sendMail($receiverEmail,$adminSubject,$mailBody,'',$adminEmail,$adminName,'','','','',$this->settings);
				$send1 = $this->sendMail($receiverEmail1,$adminSubject,$mailBody2,'',$adminEmail,$adminName,'','','','',$this->settings);
				$adword = $course[0]['contactadwords'];
                $GLOBALS['TSFE']->additionalFooterData['contactJavascript'] = html_entity_decode($adword); 
				
				$satus= 'Mail Sent';
			}  
		$this->view->assign('courses', $course[0]);
		$this->view->assign('satus', $satus);
	
	}
	public function sendMail($to, $subject, $html, $plain, $fromEmail = '', $fromName = '', $replyToEmail = '', $replyToName = '', $returnPath = '', $attachements = array(),$settings) {  			      							
		 $emailLogo = 'typo3conf/ext/fluxtemplate/Resources/Public/img/small-logo.png'; 
		 $baseURL = $GLOBALS['TSFE']->baseUrl;
			
		 $message = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Mail\\MailMessage');
		  
		 if ($fromEmail) {
			$message->setFrom(array($fromEmail => $fromName));
		 }
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
		  $message->setSubject($subject);
		  
		  $mail_html  = $html;
		  $mail_html .=  '<br/><img src="'.$baseURL.$emailLogo.'" alt="Logo"  /><br/><br/>';
		  $message->setBody($mail_html, 'text/html', 'utf-8');
		 
		  if ($plain) {
			$message->addPart($plain, 'text/plain', 'utf-8');
		  }
		  
		  if (trim($returnPath)) {
			$message->setReturnPath($returnPath);
		  }
		 
		  if (trim($replyToEmail) && \TYPO3\CMS\Core\Utility\GeneralUtility::validEmail($replyToEmail)) {
			if (trim($replyToName)) {
			  $message->setReplyTo(array($replyToEmail => $replyToName));
			} else {
			  $message->setReplyTo(array($replyToEmail));
			}
		  }
		  if (count($attachements)) {
			foreach ($attachements as $name => $file) {
			  if (file_exists($file)) {
				if (trim($name)) {
				  $message->attach(\Swift_Attachment::fromPath($file)->setFilename($name));
				} else {
				  $message->attach(Swift_Attachment::fromPath($file));
				}
			  }
			}
		  }
		  $message->send();
		 
		  return true;		
	}
	
		
	function breadcrumAction(){
		$storageFolder = $this->settings['storagePid'];
			
		$courseDates = $this->courseRepository->getActiveDates();
		$curDate = strtotime(date("Y-m-d"));
		$updateArray = array(
			'deleted' => 1,
			'hidden'  => 1
 		);
		
		foreach($courseDates as $key=>$value){		
			$courseDates[$key]['strtotime'] = strtotime($value['startdate']);
			if($curDate> strtotime($value['startdate'])){
				$GLOBALS['TYPO3_DB']->exec_UPDATEquery ('tx_course_domain_model_datestartend','uid = '.$value['uid'],$updateArray, TRUE);
			}
		}
		
		
			
		if($_GET){
			if($_GET['tx_course_course']['course']){
				$courseId = $_GET['tx_course_course']['course'];
				$courseData = $this->courseRepository->findDetailUId($storageFolder,$courseId); 
				$catDataMain  = $this->courseRepository->findCatUId($courseData[0]['cat']);			
				$catDataParent  = $this->courseRepository->findParentCat($catDataMain[0]['uid']);
								
				$this->view->assign('courseId', $courseId);			
				$this->view->assign('courseData', $courseData[0]);
				$this->view->assign('catData', $catDataMain[0]);
				$this->view->assign('catDataParent', $catDataParent[0]);
										
			}
			if($_GET['category_id']){
				$catId = $_GET['category_id'];
				$catDataMain  = $this->courseRepository->findCatUId($catId);				
				$catDataParent  = $this->courseRepository->findParentCat($catDataMain[0]['uid']);
				
				$this->view->assign('catId', $catId);
				$this->view->assign('catData', $catDataMain[0]);
				$this->view->assign('catDataParent', $catDataParent[0]);
				
			}		
		}else{
			$pageId = $GLOBALS['TSFE']->id;
			$pageData1 = $this->courseRepository->findPageData($pageId);
			$pageData2 = $this->courseRepository->findPageData($pageData1[0]['pid']);
			$pageData3 = $this->courseRepository->findPageData($pageData2[0]['pid']);
			$pageData4 = $this->courseRepository->findPageData($pageData3[0]['pid']);			
			
			$this->view->assign('pageId', $pageId);
			$this->view->assign('pageData1', $pageData1[0]);
			$this->view->assign('pageData2', $pageData2[0]);
			$this->view->assign('pageData3', $pageData3[0]);
			$this->view->assign('pageData4', $pageData4[0]);
		}
		
	}
}