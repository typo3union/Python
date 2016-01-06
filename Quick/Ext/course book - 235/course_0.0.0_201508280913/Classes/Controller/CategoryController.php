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
 * CategoryController
 */
class CategoryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * categoryRepository
	 * 
	 * @var \Typo3\Course\Domain\Repository\CategoryRepository
	 * @inject
	 */
	protected $categoryRepository = NULL;
	protected $courseRepository = NULL;
	/**
	 * action list
	 * 
	 * @return void
	 */
	public function listAction() {
		$storageFolder = $this->settings['storagePid'];
		$categories = $this->categoryRepository->findAllCourses();
		
		foreach ($categories as $key=>$value){	
			if($value['parentcategory']){
				$categories[$key]['subCat'] = explode(',',$value['parentcategory']);
			}			
		}
		$this->view->assign('categories', $categories);
		
		$courses = $this->categoryRepository->coursesfindAll($storageFolder);
		
		$parentCat = $this->categoryRepository->findAllSubCourses();
		
		$courseParent = $this->categoryRepository->coursesfindAll($storageFolder);
				
		$categories_new = $this->categoryRepository->findAllCAtegoryList_new();
		$courses_new = $this->categoryRepository->coursesfindAll_new();
		
		$c = array_merge($categories_new,$courses_new);
		
		$sort = array();
		foreach ($c as $key => $row)
		{
			$sort[$key] = $row['sort'];
		}
		array_multisort($sort, SORT_ASC, $c);
		
		
		
		$this->view->assignMultiple(array(
			'courseParent'  => $courseParent,
			'parentCat'		=> $parentCat,
			'courses'  		=> $courses,
			'mainCatArr'  	=> $mainCatArr,
			'finalArray'  	=> $c			
		));			
		
	}
	
	public function categoryShowAction(){
		$category_id = $_GET['category_id']; 
		$storageFolder = $this->settings['storagePid'];
		$course_category = $this->categoryRepository->categoryByUid($storageFolder,$category_id);
                $adword = $this->categoryRepository->adword($storageFolder,$category_id);
                $GLOBALS['TSFE']->additionalFooterData['funkyJavascript'] = html_entity_decode($adword[0]['adword']); 
                 
		$this->view->assign('course_category', $course_category);
                 
	}
	
	public function bannerAction() {
		$category_id = $_GET['category_id']; 
		$storageFolder = $this->settings['storagePid'];
		$category  = $this->categoryRepository->findDetailUId($storageFolder,$category_id);
		
		foreach($category as $key=>$value){
					$imgArray = explode(",",$category[$key]['bannerimages']); //$this->courseRepository->getImageGallery($course[$key]['images']);
					$category[$key]['imgArray'] = $imgArray;												
		}
		$this->view->assign('categories', $category);
	}
	
	public function sitemapAction() {
		$storageFolder = $this->settings['storagePid'];
		$categories = $this->categoryRepository->findAllCourses();
		
		foreach ($categories as $key=>$value){	
			if($value['parentcategory']){
				$categories[$key]['subCat'] = explode(',',$value['parentcategory']);
			}			
		}
		$this->view->assign('categories', $categories);
		$this->view->assign('mainCatArr', $mainCatArr);
		
		$courses = $this->categoryRepository->coursesfindAll($storageFolder);
		$this->view->assign('courses', $courses);
		
		//$parentCat = $this->categoryRepository->findAll();
		$parentCat = $this->categoryRepository->findAllSubCourses();
		
		$this->view->assign('parentCat', $parentCat);
		
		$courseParent = $this->categoryRepository->coursesfindAll($storageFolder);
		$this->view->assign('courseParent', $courseParent);
	}
	
	
	public function footerMenuAction(){
			$category_id = $_GET['category_id']; 
			$storageFolder = $this->settings['storagePid'];
			if(isset($category_id ))
			{
				$footer_category = $this->categoryRepository->findByUid($category_id);			
				$this->view->assign('footer_category', $footer_category);
				
				$all_category = $this->categoryRepository->findAllCAtegoryList($storageFolder);
				
				foreach($all_category as $key=>$value){
					$imgArray = explode(",",$all_category[$key]['bannerimages']);
					$all_category[$key]['imgArray'] = $imgArray;											
				} 
							
				$this->view->assign('all_category', $all_category);
				
				$course_category = $this->categoryRepository->coursesfindAll($storageFolder);
				foreach($course_category as $key=>$value){
					$imgArray = explode(",",$course_category[$key]['bannerimages']);
					$course_category[$key]['imgArray'] = $imgArray;	
					//$imgArray2 = explode(",",$course_category[$key]['images']);
					//$course_category[$key]['imgArray2'] = $imgArray2;												
				} 
					
				$this->view->assign('course_category', $course_category);
			}else{
				$pageid = intval($GLOBALS['TSFE']->id);				
				$subPages = $this->categoryRepository->subpages($pageid);					
				$this->view->assign('subPages', $subPages);
			
			}
			
			
			
	}

	

}