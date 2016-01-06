<?php
namespace Product\Product\Controller;


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
 * ProductController
 */
class ProductController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * productRepository
	 *
	 * @var \Product\Product\Domain\Repository\ProductRepository
	 * @inject
	 */
	protected $productRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		//$products = $this->productRepository->findAll();
		//$this->view->assign('products', $products);
		
		$id = $_GET[tx_product_product][category];
		$pro_id = $_GET[tx_product_product][category];
		$categories = $this->productRepository->findCategories($id);
		$this->view->assign('categories', $categories);
		
		if ($id) {
		    $subcategories = $this->productRepository->findsubcategoriesId($id);
		    if (strlen($subcategories[0]['sub_category']) > 0) {
		        $subcategories_name = $this->productRepository->findsubcategories($subcategories[0]['sub_category']);
		        $this->view->assign('subcategories', $subcategories_name);
		        $id = $subcategories[0]['sub_category'];
		    }
		
		    $final_product = array();
		    $product = $this->productRepository->findProduct($id);
		    $i=0;
		    $temp;
		    $main_caat = $this->productRepository->findCatid($pro_id);
		    
		    foreach ($main_caat as $key => $value) {
		        $m_id = $value['sub_category'];
		         
		        $m = $this->productRepository->findsubcategories($m_id);
		         
		        $main_caat[$key]['sub_cat'] = $m;
		    }
		  
		    $this->view->assign('cats', $main_caat);
		    foreach ($product as $key => $value) {
		
		        $temp = $value['category'];
		        
		        $final_product[$value['category']]['cat_name'] =$value['category_name'];
		        if(isset($final_product[$value['category']])){
		            $final_product[$value['category']]['main'][$i] = $value;
		            $i++;
		        }
		        else{
		            $final_product[$value['category']]['main'][$i] = $value;
		            if($temp != $value['category'] )
		            {
		                $i=0;
		                //$temp = $value['category'];
		            }else{
		                $i++;
		            }
		            // $i=0;
		        }
		
		        $product[$key]['main_cat'] = $pro_id;
		    }
		   
		    $this->view->assign('products', $product);
		    $this->view->assign('final_product', $final_product);
		}
		
	}

	/**
	 * action show
	 *
	 * @param \Product\Product\Domain\Model\Product $product
	 * @return void
	 */
	public function showAction(\Product\Product\Domain\Model\Product $product) {
		//$this->view->assign('product', $product);
		
	    $this->view->assign('product', $product);
	    
	    $pid = $_GET[tx_product_product][cat];
	    
	    $main_cat = $this->productRepository->findCatid($pid);
	    foreach ($main_cat as $key => $value) {
	        $mid = $value['sub_category'];
	    
	        $m = $this->productRepository->findsubcategories($mid);
	    
	        $main_cat[$key]['sub_cat'] = $m;
	    }
	    
	    $this->view->assign('main_cat', $main_cat);
	}

	/**
	 * action menu
	 *
	 * @return void
	 */
	public function menuAction() {
		
	    $main_categories = $this->productRepository->findMenucategory();
	    
	               foreach ($main_categories as $key => $value) {
	                   $mid = $value['sub_category'];
	    
	                   $m = $this->productRepository->findsubcategories($mid);
	    
	                   $main_categories[$key]['sub_cat'] = $m;
	               }
	    
	               $this->view->assign('main_categories', $main_categories);
	    
	               $first_menu = $this->productRepository->findMenu();
	               $this->view->assign('first_menu', $first_menu);
	    
	               $second_menu = $this->productRepository->findMenusecond();
	               $this->view->assign('second_menu', $second_menu);
	               
	               $menu_id = $_GET[tx_product_product][category];
	               $this->view->assign('menu_id', $menu_id);
	               
	               $page_id = $GLOBALS['TSFE']->id;
	               $this->view->assign('page_id', $page_id);
	               
	               $arr = $GLOBALS['TSFE']->rootLine; $titlArr = array_shift(array_values( $arr )); 
	               $page_title =  $titlArr['title'];
	               $this->view->assign('page_title', $page_title);
	    
	}
	
	public function featureAction() {
	

	               $featured_product = $this->productRepository->findFeatureProduct();
	    
	               $this->view->assign('featured_product', $featured_product);
	    
	}

}