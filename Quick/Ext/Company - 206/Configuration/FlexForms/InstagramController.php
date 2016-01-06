<?php
namespace TYPO3\Instagram\Controller;
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
 * InstagramController
 */
class InstagramController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * instagramRepository
	 *
	 * @var \TYPO3\Instagram\Domain\Repository\InstagramRepository
	 * @inject
	 */
	protected $instagramRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		
		$tag = $this->settings['hashTag'];
		//$tag = 'ostern';
		$num = $this->settings['num'];
		//$num = 3;

		$client_id = $this->settings['clientId'];

		$url = 'https://api.instagram.com/v1/tags/aldiana/media/recent?client_id='.$client_id.'&count=1000';
		
		$content = '';
		$i=1;
		$j=0;	
		$search_tags = explode(',',$tag);		
		
		$_SESSION['data'] = '';

 
		$test = $this->recursiveFunction1($url,$i,$num,$search_tags,$content,$j);
		if($test!=''){
			$content1 = $this->recursiveFunction($url,$i,$num,$search_tags,$content,$j);		
			$content = $_SESSION['data'];		
		}else{
			$content='';
		}
		
		$this->view->assign('instagrams', $content);
		$this->view->assign('settings', $this->settings);
	}

	public function recursiveFunction($url,$i,$num,$search_tags,$content,$j) {
		$inst_stream = $this->callInstagram($url);
		$results = json_decode($inst_stream, true);

		foreach($results['data'] as $key=>$item){
			if (count(array_intersect($search_tags, $item[tags])) > 0){
			//if(count($search_tags) == count(array_intersect($search_tags, $item['tags']))){		
				$instagrams = $item['images']['low_resolution']['url'];
				$content .= '<div class="insta-img"><img src="'.$instagrams.'" alt="insta_image"></div>';		
			  	
				if($i==$num){
					$_SESSION['data'] = $content;
			   		return $content;
			   	}
			   	$i++;			 
			    
			}else{
				$url = $results['pagination']['next_url'];
				$j++;
			}
		}		

		//if($j<30){
			if($i<$num){
			//if($i<5){
				/*if($j>10){
					//$content = '';
					$_SESSION['data'] = $content;
					return $content;
				}else{*/
					$this->recursiveFunction($url,$i,$num,$search_tags,$content,$j);								
				//}
			}
			else{
				//$content = '';
				$_SESSION['data'] = $content;
				return $content;
			}
		//}
	}

	public function postAction() {
		
		$tag = $this->settings['hashTag'];
		$client_id = $this->settings['clientId'];
		$access_id = $this->settings['access_id'];

		//$url = 'https://api.instagram.com/v1/users/'.$client_id.'/media/recent?access_token='.$access_id.'&count=2';
		$url = 'https://api.instagram.com/v1/tags/'.$tag.'/media/recent?client_id='.$client_id.'&count=2';

		$inst_stream = $this->callInstagram($url);
		$results = json_decode($inst_stream, true);

		$content = '';	
		$tag = '';
		$i=0;
		foreach($results['data'] as $item){			
		   $instagrams = $item['images']['thumbnail']['url'];
		   $test[] =  $item['images']['thumbnail']['url'];
		   $tag = '<ul>';
		   foreach($item['tags'] as $tags){
		   	$tag .= '<li>#'.$tags.'</li>';
		   	if($i>2){
		   		break;
		   	}
		   	 $i++;
		   }
		   $tag .= '</ul>';
		   $content .= ' <div class="footer-link-group">                 
		                  <p><img src="'.$instagrams.'" alt="instaImage"></p>
		                  '.$tag.'
		                </div>';
		     $i=0;
		}	
		
		
		$this->view->assign('instagrams', $content);		
		$this->view->assign('settings', $this->settings);
		$this->view->assign('test', $test);
	}


	function callInstagram($url)
	{
		$ch = curl_init();
		curl_setopt_array($ch, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_SSL_VERIFYHOST => 2
		));

		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}

	public function recursiveFunction1($url,$i,$num,$search_tags,$content,$j) {
		$inst_stream = $this->callInstagram($url);
		$results = json_decode($inst_stream, true);

		foreach($results['data'] as $key=>$item){
			if (count(array_intersect($search_tags, $item[tags])) > 0){
			//if(count($search_tags) == count(array_intersect($search_tags, $item['tags']))){		
				$instagrams = $item['images']['low_resolution']['url'];
				$content .= '<div class="insta-img"><img src="'.$instagrams.'" alt="insta_image"></div>';		
			  	
				if($i==$num){
					$_SESSION['data'] = $content;
			   		return $content;
			   	}
			   	$i++;			 
			    
			}else{
				$url = $results['pagination']['next_url'];
				$j++;
			}
		}		

		if($j<15){
			if($i<3){
			//if($i<5){
				/*if($j>10){
					//$content = '';
					$_SESSION['data'] = $content;
					return $content;
				}else{*/
					$this->recursiveFunction1($url,$i,$num,$search_tags,$content,$j);								
				//}
			}
			else{
				//$content = '';
				$_SESSION['data'] = $content;
				return $content;
			}
		}
	}
}