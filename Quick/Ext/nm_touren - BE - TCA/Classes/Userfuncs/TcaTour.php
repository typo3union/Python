<?php
namespace TYPO3\NmTouren\Userfuncs;
//ini_set("display_errors",1);

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
/**
 * Class that implements many examples related to TCA or TCEform manipulations
 *
 * @author Francois Suter <francois@typo3.org>
 * @package TYPO3
 * @subpackage tx_examples
 */
class TcaTour  {

	/**
	 * This method renders a user-defined field
	 *
	 * @param	array	$PA: parameters of the field
	 * @param	object	$fObj: calling object (TCEform)
	 * @return	string	HTML for the field
	 */
	public function addTour($config, $fObj) {

		$tourID    = $config['row']['uid'];
		$storageID = $config['row']['pid'];
		$baseURL = "http://" . $_SERVER['SERVER_NAME']; 
					
		$fiedset  =  '<style>.hidden {display:none;} .cbgm_preview { position: relative; } .cbgm_preview .input-wrap { height: 24px; position: absolute; width: 92px; } .cbgm_preview .input-wrap .c-inputButton { width: 91px; outline:0 }.cbgm_preview .input-wrap .c-inputButton:focus{box-shadow: none;} 
</style><div class="cbgm_preview">';
				
		if($config['row']['name'] ==''){
			$fiedset .= '<span class="input-wrap">
							<input type="image" name="_savedok" class="c-inputButton" src="clear.gif" title="Save document" value="Add Termine">
						</span><input type="button" value="Add Termine" class="firstBtn">';
			$style = 'style="display:none"';	
					
		}else{
			if($tourID !=''){
		 		$savedDate = $this->getSavedDate($tourID); 
		 	}
		 	$count = count($savedDate);
			if($count>0){
				
				$fiedset .= '<input type="button" onclick="displayPreview(\''. $config['row']['uid'].'\')" '. 'value="Add Termine">';
				$style = 'style="display:none"';
			}else{
				$style = '';				
			}
							  	
			$fiedset .= '
			 <script src="'.$baseURL.'/typo3conf/ext/nm_touren/Classes/Userfuncs/Js/datum.js" type="text/javascript"></script>
			<link rel="stylesheet" type="text/css" href="'.$baseURL.'/typo3conf/ext/nm_touren/Classes/Userfuncs/Css/datum.css" media="all">		
			<script>
				function displayPreview(uid){
					document.getElementById("dateList").style.display = "block";							
					var domain = document.domain;
				}
			</script>';
		}
				
		$data	  = $this->data($tourID,$storageID,$config);
		$fiedset .= '<div id="dateList" '.$style.'>'.$data.'</div>';
		$fiedset .= '</div>';
		return $fiedset;
	}

	public function data($tourID,$storageID,$config) {	

		$baseURL = "http://" . $_SERVER['SERVER_NAME']; 
		$c_year = date("Y");
	 	$n_year = date('Y', strtotime('+1 year'));
	 	$w_days = array(
			'1' => 'Montag',
			'2' => 'Dienstag',
			'3' => 'Mittwoch',    
			'4' => 'Donnerstag',
			'5' => 'Freitag',
			'6' => 'Samstag',
			'7' => 'Sonntag'
	 );
	 
		
	    $c_month= date('m');
	    $mainList= array();
	    for($i=$c_month;$i<=12;$i++){
		   $mainList['total_month'][] = sprintf("%02d", $i).'.'.$c_year;
		   $mainList['month'][] = sprintf("%02d", $i);
		   $mainList['year'][] = $c_year;
	    }
	    for($i=1;$i<=12;$i++){
		   $mainList['total_month'][] = sprintf("%02d", $i).'.'.$n_year;
		   $mainList['month'][] = sprintf("%02d", $i);
		   $mainList['year'][] = $n_year;
	    } 
	    if(isset($_REQUEST['dateSave'])){
			// $GLOBALS['TYPO3_DB']->exec_DELETEquery ('tx_nmtouren_domain_model_termine','tour = '.$tourID);
			$insertFields = array (
				'tstamp'	=> time(),
				'crdate'	=> time(),
				'deleted'	=> 1, 
				'hidden'	=> 0
			 );
			
			 $GLOBALS['TYPO3_DB']->exec_UPDATEquery ('tx_nmtouren_domain_model_termine','tour = '.$tourID,$insertFields, TRUE);

			   if(isset($_REQUEST['termine'])){				   
					    $this->saveData($_REQUEST);	
					echo '<script>$(document).ready(function() {$(".check_id").val("1");});</script>'; 
					header('Location: '.$_SERVER['REQUEST_URI']); 					
			   }else{					
					echo '<script>$(document).ready(function() {
							if($(".check_id").val()==0){
								alert("Bitte wählen Datum");
							}						
					});</script>';
			   }		   		
		 }   
		 
		 if($tourID !=''){
		 	$savedDate = $this->getSavedDate($tourID); 
		 }
					
		$data .= '
		 		  <form name="neueReise" action="" method="POST" id="calendarForm">
				  <input name="tour_id" value="'.$tourID.'" type="hidden">
				  <input name="storage_id" value="'.$storageID.'" type="hidden">
				  <input name="check_id" value="0" type="hidden" class="check_id">
				  <div class="mainDiv">
					  <table style="border:1px solid #afa6a0;" bgcolor="#fff" cellpadding="0" cellspacing="0" id="mainTable">
					  <tbody>
						<tr>
						  <td align="left"><input value="&nbsp;&nbsp;&nbsp; Speichern &nbsp;&nbsp;&nbsp;" type="submit" name="dateSave" class="dateSave"></td>
						  <td align="right">&nbsp;</td>
						</tr>
						<tr>
						  <td colspan="2" style="font-weight:bold;color:#ffffff;padding:2px;" bgcolor="#afa6a0" width="200">&nbsp;</td>
						</tr>  
						<tr>
						  <td class="tableRows"><h4>Quicklink-auswahl</h4></td>
						  <td class="tableRows radioYear">
							<input value="'.$c_year.'" name="jahresauswahl" checked="" type="radio" class="jahresauswahl" id="jahresauswahl" onclick="handleClick(this)">
							<label>'.$c_year.' &nbsp;</label>
							<input value="'.$n_year.'" name="jahresauswahl" type="radio" class="jahresauswahl" id="jahresauswahl" onclick="handleClick(this)">
						   <label>'.$n_year.'&nbsp;</label>
							<input value="all" name="jahresauswahl" type="radio" class="jahresauswahl" id="jahresauswahl" onclick="handleClick(this)">
							<label>'.$c_year.'/'.$n_year.'</label></td>
						</tr>
						<tr>
						  <td class="tableRows"><h4>Quicklink-wochentage</h4></td>
						  <td class="tableRows dayList">
							<a href="JavaScript:selectFields(1);" class=""><b><u>Montag</u></b></a> &nbsp; 
							<a href="JavaScript:selectFields(2);"><b><u>Dienstag</u></b></a> &nbsp; 
							<a href="JavaScript:selectFields(3);"><b><u>Mittwoch</u></b></a> &nbsp; 
							<a href="JavaScript:selectFields(4);"><b><u>Donnerstag</u></b></a> &nbsp; 
							<a href="JavaScript:selectFields(5);"><b><u>Freitag</u></b></a> &nbsp; 
							<a href="JavaScript:selectFields(6);"><b><u>Samstag</u></b></a> &nbsp; 
							<a href="JavaScript:selectFields(0);"><b><u>Sonntag</u></b></a> &nbsp; 
						   </td>
						</tr>
						<tr>
						  <td align="left">&nbsp;</td>
						  <td>
						  	<span class="checkAllDates"><input onclick="selectAll(this)" type="button" class="selectAllDates" value="Wählen  Sie alle Termine"></span>
							  <span class="uncheckAllDates"><input  onclick="deSelectAll(this)"  type="button" class="deselectAllDates" value="Auswahl zurücksetzen" ></span>
						  </td>
						 
						</tr>
						<tr>
						  <td class="tableRows" valign="top"><h4>Termin-auswahl</h4></td>
						  <td class="tableRows"><table cellpadding="2" cellspacing="0" >
							  <tbody>
								<tr>
								  <td style="border:none;"><table bgcolor="#ffffff" cellpadding="0" cellspacing="1" id="dateTable">
									  <tbody>';									   
										foreach($mainList['month'] as $key=>$value){
											if($key%5 ==0){
												$data .= $this->getTotalDaysTD();
												$data .= $this->getCheckBoxList($value,$mainList['year'][$key],$savedDate,$config);					
											 }else{
												$data .= $this->getCheckBoxList($value,$mainList['year'][$key],$savedDate,$config);
											 }		
										}														   
									 $data .=' </tbody>
									</table></td>
								</tr>
							  </tbody>
							</table></td>
						</tr>       
						
						<tr>
						  <td colspan="2" style="font-weight:bold;color:#ffffff;padding:2px;" bgcolor="#afa6a0" width="200">&nbsp;</td>         
						</tr>
						<tr>
						  <td align="left"><input  value="&nbsp;&nbsp;&nbsp;Speichern&nbsp;&nbsp;&nbsp;"  name="dateSave" class="dateSave" type="submit"></td>
						  <td align="right">&nbsp;</td>
						</tr>
					  </tbody>
					</table>
				  </div>
				</form>';

		return $data;

	}
	
	function getTotalDaysTD(){
	 	  $a = '<td style="font-weight:bold;color:#ffffff;padding:2px;" bgcolor="#afa6a0">&nbsp;</td>';
			  for($i=1;$i<=31;$i++){
				  if($i%7 ==0){
					 $style = 'style="font-weight:bold;color:#ffffff;padding:2px;border-right:5px solid #ffffff;"';
				  }else{
					  $style = 'style="font-weight:bold;color:#ffffff;padding:2px;"';
				  }		
				   $a .= '<td '.$style.' bgcolor="#afa6a0">'.sprintf("%02d", $i).'</td>';				  	
			  }
			  return  $a;
  }  
 	function getCheckBoxList($month,$year,$savedDate,$config){

 	
	$startDate1 = $config['fieldConf']['config']['parameters']['startDate'];
	$endDate1 = $config['fieldConf']['config']['parameters']['endDate'];


	$dayDateList = $this->getDayDateList($month,$year);
	$dayList = $this->getDayList($month,$year);	
	$num_of_days = end(array_keys($dayDateList));
					  
		  for($i=1;$i<=31;$i++){

			  	if($i==1){
			  		if(isset($startDate1) && isset($endDate1)){				 	
					 
					 	$startDate = $startDate1.'.'.$year;				
					 	$endDate = $endDate1.'.'.$year;

					 	 if(strtotime($dayDateList[$i]) >= strtotime($startDate) && strtotime($dayDateList[$i]) <= strtotime($endDate)){
						 	$a = ' <tr class="'.$year.' t_'.$year.'"><td style="font-weight:bold;color:#ffffff;padding:2px;" bgcolor="#afa6a0">'.$month.'.'.$year.'</td>';
						 }else{
						 	$a = ' <tr><td style="font-weight:bold;color:#ffffff;padding:2px;" bgcolor="#afa6a0">'.$month.'.'.$year.'</td>';	 
						 }
					 }else{
					 		$a = ' <tr class="'.$year.' t_'.$year.'"><td style="font-weight:bold;color:#ffffff;padding:2px;" bgcolor="#afa6a0">'.$month.'.'.$year.'</td>';
					 }
			  	}

			  if($i%7 ==0){
				 $style = 'style="border-right:5px solid #ffffff;"';					
			  }else{
				  $style = '';
			  }	
			  if($i>$num_of_days){
				 $a .= '<td '.$style.' bgcolor="#edebea">&nbsp;</td>';	
			  }else{
				 if (in_array($dayDateList[$i], $savedDate)){
				 	$check = 'checked="true"';	
				 }else{
				  	$check = '';
				 }

				/* $startDate = '01.04.'.$year;				
				 $endDate = '31.10.'.$year;*/

				 if(isset($startDate1) && isset($endDate1)){				 	
				 
				 	$startDate = $startDate1.'.'.$year;				
				 	$endDate = $endDate1.'.'.$year;

				 	 if(strtotime($dayDateList[$i]) >= strtotime($startDate) && strtotime($dayDateList[$i]) <= strtotime($endDate)){
					 	$a .= '<td '.$style.' bgcolor="#edebea"><input class="'.$dayList[$i].' t_'.$dayList[$i].'" id="Term_'.$i.'" value="'.$dayDateList[$i].'" name="termine[]" type="checkbox" '.$check.'></td>';	 
					 }else{
					 	$a .= '<td '.$style.' bgcolor="#edebea"><input class="'.$dayList[$i].'" id="Term_'.$i.'" value="'.$dayDateList[$i].'" name="termine[]" type="checkbox" '.$check.'></td>';	 
					 }
				 }else{
				 	$a .= '<td '.$style.' bgcolor="#edebea"><input class="'.$dayList[$i].' t_'.$dayList[$i].'" id="Term_'.$i.'" value="'.$dayDateList[$i].'" name="termine[]" type="checkbox" '.$check.'></td>';	 				 	
				 }
				 
			  }		  	
		  }
		  return  $a.'</tr>';
  }
 	function getDayDateList($month,$year){
	  	 $list=array();
		  for($d=1; $d<=31; $d++)
			{
				$time=mktime(12, 0, 0, $month, $d, $year);          
				if (date('m', $time)==$month)       
					$list[]=date('d.m.Y', $time);
			}
			array_unshift($list,"");
		    unset($list[0]);
		return $list;
  }
 	function getDayList($month,$year){
	  	 $list=array();
		  for($d=1; $d<=31; $d++)
			{
				$time=mktime(12, 0, 0, $month, $d, $year);          
				if (date('m', $time)==$month)       
					$list[]=date('w', $time);
			}
			array_unshift($list,"");
		    unset($list[0]);
		return $list;
  }
 	function saveData($data){  
	 $tourID    = $data['tour_id'];
	 $storageId = $data['storage_id'];
  	 $totalTermine = count($data['termine']);
		
	if(isset($data['termine'])){
	 	$updateArray = array ('termine' =>$totalTermine); 
  	 	$GLOBALS['TYPO3_DB']->exec_UPDATEquery ('tx_nmtouren_domain_model_tour','uid = '.$tourID,$updateArray, TRUE);		
		
		 foreach($data['termine'] as $key=>$value){			 
			$m_date = date("Y-m-d", strtotime($value));	
			$insertFields = array (
				'pid'		=> $storageId,
				'tour'		=> $tourID,
				'datum'		=> $m_date,
				'tstamp'	=> time(),
				'crdate'	=> time(),
				'deleted'	=> 0, 
				'hidden'	=> 0
			 );			 
			 $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('uid', 'tx_nmtouren_domain_model_termine','hidden = 0 AND datum="'.$m_date.'" AND tour='.$tourID,'','',''); 
   		 	 $total = $GLOBALS['TYPO3_DB']->sql_num_rows($res);
			 $row  = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);
			
	 		 if($total>0){
				$GLOBALS['TYPO3_DB']->exec_UPDATEquery ('tx_nmtouren_domain_model_termine','uid = '.$row['uid'],$insertFields, TRUE);
			 }else{
				$GLOBALS['TYPO3_DB']->exec_INSERTquery('tx_nmtouren_domain_model_termine', $insertFields);
			 }			 
			 $GLOBALS['TYPO3_DB']->sql_insert_id();		 	 
		 } 	 
	}
		  
	  return 'Daten Erfolgreich Gespeichert';
  } 
  	function addTtitle (&$parameters, $parentObject) {		
		$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);				 
		$newTitle = $record['datum'];
		$newTitle = date("d.m.Y", strtotime($newTitle));				
		$parameters['title'] = $newTitle;
	}
	function getSavedDate ($tourID){
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('datum', 'tx_nmtouren_domain_model_termine','hidden = 0 and deleted = 0 AND tour="'.$tourID.'"','','','');
		$total = $GLOBALS['TYPO3_DB']->sql_num_rows($res);
		$i=0;
		while($row  = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)){
			$data[$i] = date('d.m.Y',strtotime($row['datum']));
			$i++;
		}
		return $data;
	}
	
}



?>
