<?php
namespace Product\Product\Controller;

/**
 * *************************************************************
 *
 * Copyright notice
 *
 * (c) 2015
 *
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 * *************************************************************
 */

/**
 * ProductController
 */
class ProductController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * productRepository
     *
     * @var \Product\Product\Domain\Repository\ProductRepository @inject
     */
    protected $productRepository = NULL;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
	
	 //$categories = $this->productRepository->findCategories();
       $where1 = 'deleted=0 AND hidden=0 AND sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid;
	   $categories = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*','tx_product_domain_model_category',$where1);
        $this->view->assign('categories', $categories);
        
        $where = 'deleted=0 AND featured_product=1 AND hidden=0 AND sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid;
	   $featureproduct = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*','tx_product_domain_model_product',$where);

         foreach ($featureproduct as $key => $value) {
            
            if ($value['images']) {
                $imgGallery = explode(',', $value['images']);
                
                $featureproduct[$key]['first_img'] = $imgGallery[0];
            }
        }
        $this->view->assign('featureproduct', $featureproduct);
        $id = $_GET[tx_product_product][category];
       
        if (isset($id)) {
            
			 if($id){
              $where2 = 'uid_foreign = '.$id.'';
                }else{
                    $where2 = '';
                }
			
			//$where1 = 'deleted=0 AND hidden=0 AND sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid;
	        $cate = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*','tx_product_product_category_mm',$where2);
            //$cate = $this->productRepository->findCatbyID($id);
            
            foreach ($cate as $key => $value) {
                $p_id = $value['uid_local'];
                
				  if($p_id){
                    $where = 'AND uid = '.$p_id.'';
                }else{
                    $where = '';
                }
				$where3 = 'deleted=0 '.$where.' AND hidden=0 AND sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid;
	           $cate = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*','tx_product_domain_model_product',$where3);
				//echo $GLOBALS['TYPO3_DB']->SELECTquery('*','tx_product_domain_model_product',$where3);die;
                //$cate = $this->productRepository->findshowProduct($p_id);

				
	          
                foreach ($cate as $key => $value) {
                    
                    if ($value['images']) {
                        $imgGallery = explode(',', $value['images']);
                        
                        //$cate[$key]['first_img'] = $imgGallery[0];
                        if(is_array($cate)){
                            $res[$value['uid']] = $cate[0];
                            $res[$value['uid']]['first_img'] = $imgGallery[0];
                        }
                    }
                }

				/* echo '<pre>';
				print_r($res);
				*/ 
            }
            
            $this->view->assign('products', $res);
        } else {
            
            $where4 = 'deleted=0 AND hidden=0 AND sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid;
            $products = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*','tx_product_domain_model_product',$where4);
            //$products = $this->productRepository->findProducts();
            foreach ($products as $key => $value) {
                
                if ($value['images']) {
                    $imgGallery = explode(',', $value['images']);
                    
                    $products[$key]['first_img'] = $imgGallery[0];
                }
            }
            
            $this->view->assign('products', $products);
        }
		
     
    

        
   }
    /**
     * action show
     *
     * @param \Product\Product\Domain\Model\Product $product            
     * @return void
     */
    public function showAction()
    {
        $fullURL = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_SITE_URL');
        
        $cObject = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tslib_cObj');
        
        $uriParams = \TYPO3\CMS\Core\Utility\GeneralUtility::_GET();
        
        if ($this->request->hasArgument('submit')) {
            
            $arg = $this->request->getArguments();
            
            $productid = $arg['product'];
            if($productid){
                $where = 'AND uid = '.$productid.'';
            }else{
                $where = '';
            }
            $where5 = 'deleted=0 '.$where.' AND hidden=0 AND sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid;
            $product_name = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*','tx_product_domain_model_product',$where5);
            //$product_name = $this->productRepository->findshowProduct($productid);
            
            $storage_id = $this->settings['flexform']['main']['productform'];
            
            $insertFields = array(
                'pid' => $storage_id,
                'company' => $arg['firma'],
                'firstname' => $arg['Vorname'],
                'lastname' => $arg['Nachname'],
                'address' => $arg['Adresse'],
                'postal' => $arg['Postleitzahl'],
                'ort' => $arg['Ort'],
                'land' => $arg['Land'],
                'email' => $arg['mail'],
                'mobile' => $arg['Telefon'],
                'product' => $product_name[0]['name'],
                'tstamp' => time(),
                'crdate' => time(),
                'deleted' => 0,
                'hidden' => 0
            );
          
            $GLOBALS['TYPO3_DB']->exec_INSERTquery('tx_product_domain_model_inquiryform', $insertFields);
            
            $adminName = $this->settings['flexform']['order']['senderName'];
            $adminEmail = $this->settings['flexform']['order']['senderEmail'];
            $adminSubject = $this->settings['flexform']['order']['senderSubject'];
            $mailBody = $this->settings['flexform']['order']['mailBody'];
            $mailBodyAdmin = $this->settings['flexform']['order']['mailBodyAdmin'];
            $receiverEmail = array(
                0 => array(
                    'email' => $arg['mail'],
                    'name' => $arg['Vorname']
                )
            );
            $receiverEmail1 = array(
                0 => array(
                    'email' => $this->settings['flexform']['order']['recieverEmail'],
                    'name' => $adminName
                )
            );
        
        
        $mailBody1 .= '<br/><br/><table border="1" cellpadding="5" cellspacing="2" style="border: 1px solid rgb(102, 102, 102); background: rgb(247, 247, 247); ">
						<tbody>
							<tr>
								<th>Company</th>
								<td>' . $arg['firma'] . '</td>
							</tr>
							<tr>
								<th>Vorname</th>
								<td>' . $arg['Vorname'] . '</td>
							</tr>
							<tr>
								<th>Nachname</th>
								<td>' . $arg['Nachname'] . '</td>
							</tr>
							<tr>
								<th>Adresse</th>
								<td>' . $arg['Adresse'] . '</td>
							</tr>
							<tr>
								<th>Postleitzahl</th>
								<td>' . $arg['Postleitzahl'] . '</td>
							</tr>
							<tr>
								<th>Ort</th>
								<td>' . $arg['Ort'] . '</td>
							</tr>
							<tr>
								<th>Land</th>
								<td>' . $arg['Land'] . '</td>
							</tr>
							<tr>
								<th>Email</th>
								<td>' . $arg['mail'] . '</td>
							</tr>
							<tr>
								<th>Telefon</th>
								<td>' . $arg['Telefon'] . '</td>
							</tr>
							<tr>
								<th>Product Name</th>
								<td>' . $product_name[0]['name'] . '</td>
							</tr>
							
				';
        $mailBody1 .= '</tbody></table><br/><br/>';
        $mailBody2 = str_replace('{all}', $mailBody1, $mailBodyAdmin);
        
        
        
        $search = array(
            '{firstname}',
            '{lastname}'
        );
        $replace = array(
            $arg['Vorname'],
            $arg['Nachname']
        );
        $new_mailBody = str_replace($search, $replace, $mailBody);
        
        $send = $this->sendMail($receiverEmail, $adminSubject, $new_mailBody, '', $adminEmail, $adminName, '', '', '', '', $this->settings);
        $send1 = $this->sendMail($receiverEmail1, $adminSubject, $mailBody2, '', $adminEmail, $adminName, '', '', '', '', $this->settings);
        
        $adword = $course[0]['bookingadwords'];
        $GLOBALS['TSFE']->additionalFooterData['bookingJavascript'] = html_entity_decode($adword);
        
        $satus = 'Mail Sent';
      
        //$additionalParams = "&tx_product_product[product]=".$arg['product']."&tx_product_product[action]=show&tx_product_product[controller]=Product";
       // $this->redirectURL($cObject,$GLOBALS['TSFE']->id,$fullURL,$additionalParams);
        }  
        
        $id2 = $_GET[tx_product_product][product];
        if($id2){
            $where = 'AND uid = '.$id2.'';
        }else{
            $where = '';
        }
        $where6 = 'deleted=0 '.$where.' AND hidden=0 AND sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid;
        $product = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*','tx_product_domain_model_product',$where6);
        
       // $product = $this->productRepository->findshowProduct($id2);
        
        foreach ($product as $key => $value) {
            $cid = $value['category'];
            
             if($cid){
                $where = 'AND uid = '.$cid.'';
            }else{
                $where = '';
            }
            $where7 = 'deleted=0 '.$where.' AND hidden=0 AND sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid;
            $cat = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*','tx_product_domain_model_category',$where7);
            
            //$cat = $this->productRepository->findCat($cid);
            
            $product[$key]['category_name'] = $cat[$key]['name'];
        }
        
        if ($product[0]['images']) {
            $imgGallery = explode(',', $product[0]['images']);
            
            $product[0]['first_img'] = $imgGallery;
        }
        
        $this->view->assign('product', $product);
        $where8 = 'deleted=0 AND hidden=0 AND sys_language_uid =' . $GLOBALS['TSFE']->sys_language_uid;
        $categories = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*','tx_product_domain_model_category',$where8);
       // $categories = $this->productRepository->findCategories();
       
        $this->view->assign('categories', $categories);
        $this->view->assign('uriParams', $uriParams);
        $this->view->assign('satus', $satus);
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
}