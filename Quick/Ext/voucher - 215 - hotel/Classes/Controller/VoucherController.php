<?php

ini_set('display_errors', 1);

require('fpdf.php');
/* * *************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Martin <martin.galler@weboffice.co.at>, Weboffice
 *  Pooja <pooja.patel@webofficeindia.com>, Weboffice
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
 * ************************************************************* */

/**
 *
 *
 * @package voucher
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_Voucher_Controller_VoucherController extends Tx_Extbase_MVC_Controller_ActionController {

    /**
     * voucherRepository
     *
     * @var Tx_Voucher_Domain_Repository_VoucherRepository
     */
    protected $voucherRepository;

    /**
     * injectVoucherRepository
     *
     * @param Tx_Voucher_Domain_Repository_VoucherRepository $voucherRepository
     * @return void
     */
    public function injectVoucherRepository(Tx_Voucher_Domain_Repository_VoucherRepository $voucherRepository) {
        $this->voucherRepository = $voucherRepository;
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction() {
        $GLOBALS['TSFE']->set_no_cache();
        $url = $this->getURL($GLOBALS['TSFE']->id, '');


        if (strlen(strstr($url, '//')) > 2) {
            $u = split('//', $url);
            $url = $u[0] . '//' . $u[1] . '/' . $u[2];
        }

        $loginUsername = $GLOBALS["TSFE"]->fe_user->getKey("ses", "username");
        $loginUserUid = $GLOBALS["TSFE"]->fe_user->getKey("ses", "loginUserid");
        $paymnetStage = $GLOBALS["TSFE"]->fe_user->getKey("ses", "paymnetCheck");
        $sessionQvoucher = $GLOBALS['TSFE']->fe_user->getKey("ses", "quantityVoucher");
        $sessionUser = $GLOBALS['TSFE']->fe_user->getKey("ses", "loginUser");

        $paymentSuccess = t3lib_div::_GP('pay');
        $logout = t3lib_div::_GP('logout');

        $vouchers = $this->voucherRepository->findAllVoucher();
        $postData = $this->request->getArguments();
        $noprice = $this->voucherRepository->Getnoprice();
        $settings = $this->settings;
        $loginUser = array();
        $status = '';
        $save = '';
        $voucherTemplateData = array();
        $taxdata = array();
        $taxprice = $this->voucherRepository->getTotalprice();

        foreach ($taxprice as $key => $value) {

            $taxdata[$key]['uid'] = $value['uid'];
            $taxdata[$key]['tax'] = preg_replace("/[^A-Za-z0-9 ]/", '', $value['tax']);
            $taxdata[$key]['price'] = str_replace(",", '.', $value['price']);
            $taxdata[$key]['taxprice'] = ( $taxdata[$key]['price'] * $taxdata[$key]['tax']) / 100;
            $taxdata[$key]['finalprice'] = ($taxdata[$key]['price'] + $taxdata[$key]['taxprice'] );
            $taxdata[$key]['finalprice'] = number_format($taxdata[$key]['finalprice'], 2);
            $taxdata[$key]['finalprice'] = str_replace(".", ',', $taxdata[$key]['finalprice']);
        }


        if (isset($loginUserUid)) {
            $registerUserData = $this->voucherRepository->checkRegisterUserData($loginUsername);
            if ($registerUserData[0]['gender'] == 0) {
                $registerUserData[0]['gender'] = 'Herr';
            } else {
                $registerUserData[0]['gender'] = 'Frau';
            }
        }
        if (isset($postData)) {
            if (isset($postData['notUserForm'])) {

                unset($postData['notUserForm']['repeatpassword']);

                $status = $this->registerUser($postData['notUserForm']);
            }
            if (isset($postData['alreadyUserForm'])) {
                $checkLoginUser = $this->voucherRepository->checkLoginUser($postData['alreadyUserForm']);
                $count_checkLoginUser = count($checkLoginUser);
                if ($count_checkLoginUser >= 1) {
                    $GLOBALS['TSFE']->fe_user->setKey("ses", "username", $postData['alreadyUserForm']['username']);
                    $GLOBALS['TSFE']->fe_user->setKey("ses", "loginUserid", $checkLoginUser[0]['uid']);

                    $loginUser['user']['name'] = $postData['alreadyUserForm']['username'];
                    $loginUser['user']['id'] = $checkLoginUser[0]['uid'];
                    $GLOBALS['TSFE']->fe_user->setKey("ses", "loginUser", $loginUser);

                    header("location:" . $url);
                } else {
                    $status = 'InvalidLogin';
                }
            }

            if (isset($postData['voucherForm'])) {
                $GLOBALS['TSFE']->fe_user->setKey('ses', 'paymnetCheck', NULL);
                $status = 'paymentPreview';
                $paymentPreviewData = $postData['voucherForm'];

                $GLOBALS['TSFE']->fe_user->setKey("ses", "message", $paymentPreviewData['message']);
                $GLOBALS['TSFE']->fe_user->setKey("ses", "price_hide", $paymentPreviewData['price_hide']);
                $GLOBALS['TSFE']->fe_user->setKey("ses", "order_type", $paymentPreviewData['order_type']);


                $pricedata = array();
                foreach ($noprice as $key => $value) {
                    $pricedata[$value['uid']]['price'] = $value['price'];
                    $pricedata[$value['uid']]['tax'] = $value['tax'];
                }


                foreach ($paymentPreviewData['voucherQuantity'] as $key => $value) {

                    if (!empty($value)) {

                        $voucherTemplateData['voucher'][$key] = $this->voucherRepository->getVoucherTemplate($key, 'list');

                        $voucherTemplateData['voucher'][$key]['singleFormatedPrice'] = (trim(str_replace("€", '', $paymentPreviewData['voucherPrice'][$key])));
                        $voucherTemplateData['voucher'][$key]['newsingleFormatedPrice'] = str_replace(",", '.', $voucherTemplateData['voucher'][$key]['singleFormatedPrice']);
                        $voucherTemplateData['voucher'][$key]['formatedPrice'] = $value * (trim(str_replace("€", '', $voucherTemplateData['voucher'][$key]['newsingleFormatedPrice'])));

                        $voucherTemplateData['voucher'][$key]['formatedTax'] = preg_replace("/[^A-Za-z0-9 ]/", '', $pricedata[$key]['tax']);

                        $voucherTemplateData['voucher'][$key]['quantity'] = $value;

                        $voucherTemplateData['voucher'][$key]['Tax'] = $voucherTemplateData['voucher'][$key]['formatedTax'] / 100;
                        $voucherTemplateData['voucher'][$key]['countTax'] = 1 + $voucherTemplateData['voucher'][$key]['Tax'];

                        $voucherTemplateData['voucher'][$key]['total_paid'] = $voucherTemplateData['voucher'][$key]['formatedPrice'];

                        $voucherTemplateData['total']['price'] += $voucherTemplateData['voucher'][$key]['formatedPrice'] / $voucherTemplateData['voucher'][$key]['countTax'];
                       // $voucherTemplateData['total']['price'] = str_replace(",", '.', $voucherTemplateData['total']['price']);
                        $voucherTemplateData['total']['tax'] += $voucherTemplateData['total']['price'] * $voucherTemplateData['voucher'][$key]['Tax'];
                        $voucherTemplateData['voucher'][$key]['taxamt'] += $voucherTemplateData['total']['price'] * $voucherTemplateData['voucher'][$key]['Tax'];
                        $voucherTemplateData['voucher'][$key]['total_paid'] = number_format($voucherTemplateData['voucher'][$key]['total_paid'], 2);
                        $voucherTemplateData['voucher'][$key]['total_paid'] = str_replace(".", ',', $voucherTemplateData['voucher'][$key]['total_paid']);

                        // $voucherTemplateData['voucher'][$key]['formatedPrice'] = number_format($voucherTemplateData['voucher'][$key]['formatedPrice'], 2);
                        // $voucherTemplateData['voucher'][$key]['formatedPrice'] = str_replace(".", ',', $voucherTemplateData['voucher'][$key]['formatedPrice']);


                        $voucherTemplateData['total']['total_paid'] = number_format($voucherTemplateData['voucher'][$key]['formatedPrice'], 2);
                        $voucherTemplateData['total']['total_paid'] = str_replace(".", ',', $voucherTemplateData['total']['total_paid']);

                       
                        $voucherTemplateData['total']['price'] = number_format($voucherTemplateData['total']['price'], 2);
                        $voucherTemplateData['total']['newprice'] = $voucherTemplateData['total']['price'];
                        $voucherTemplateData['total']['price'] = str_replace(".", ',', $voucherTemplateData['total']['price']);
                        $voucherTemplateData['voucher'][$key]['taxamt'] = number_format($voucherTemplateData['voucher'][$key]['taxamt'], 2);
                        $voucherTemplateData['total']['tax']= number_format($voucherTemplateData['total']['tax'], 2);
                        
                    }
                }
//                echo '<pre>';
//                print_r($voucherTemplateData);
                $voucherTemplateData['payment'] = $paymentPreviewData;


                $GLOBALS['TSFE']->fe_user->setKey("ses", "quantityVoucher", $voucherTemplateData);
            }
        }
        if (isset($paymentSuccess)) {
            if ($paymentSuccess == 0 || $paymentSuccess == 1) {
                if ($sessionQvoucher['voucher'] == '') {
                    $status = '';
                } else {
                    if ($paymnetStage != 'firstTime') {
                        $status = 'paymentSuccess';

                        foreach ($sessionQvoucher['voucher'] as $key => $value) {
                            for ($i = 1; $i <= $value['quantity']; $i++) {
                                //$voucherNumber = strtoupper($this->random_string(2) . substr(str_shuffle(MD5(microtime())), 0, 5) . $this->random_string(2));
                                $voucherNumber = mt_rand();
                                $sessionQvoucher['voucher'][$key]['voucherNumer'][$i] = $voucherNumber;
                                if ($sessionQvoucher['payment']['order_type'] == 'pdf') {
                                    $sessionQvoucher['voucher'][$key]['file'][$i] = "uploads/tx_voucher/voucher/" . md5($voucherNumber) . ".pdf";
                                }

                                $sessionQvoucher['voucher'][$key]['voucherPrice'] = $sessionQvoucher['voucher'][$key]['newsingleFormatedPrice'];


                                //$sessionQvoucher['voucher'][$key]['voucherPrice'] = $sessionQvoucher['voucher'][$key]['newsingleFormatedPrice'] + $sessionQvoucher['voucher'][$key]['countTax'];

                                $totalprice = number_format($sessionQvoucher['voucher'][$key]['voucherPrice'], 2);

                                $sessionQvoucher['voucher'][$key]['price'] = str_replace('.', ',', $totalprice);
                                //$sessionQvoucher['voucher'][$key]['price'] = $sessionQvoucher['payment']['voucherPrice'][$key];

                                $o_data = array(
                                    'de_active' => 0,
                                    'voucher_name' => $value['title'],
                                    'voucher_number' => $voucherNumber,
                                    'payment_type' => $paymentSuccess,
                                    'voucher_price' => $sessionQvoucher['voucher'][$key]['price'] . ' €',
                                    'spend_amount' => '0 €',
                                    'reaming_amount' => $value['singleFormatedPrice'] . ' €',
                                    'customer_id' => $sessionUser['user']['id'],
                                    'customer' => $sessionUser['user']['name'],
                                    'crdate' => time(),
                                    'tstamp' => time(),
                                    'pid' => $this->settings['flexform']['main']['voucherStorage'],
                                );


                                $addArrayData = array(
                                    'voucherMessage' => $sessionQvoucher['payment']['message'],
                                    'voucherPriceHide' => $sessionQvoucher['payment']['price_hide'],
                                    'voucherNumber' => $voucherNumber,
                                    'voucherOrderType' => $sessionQvoucher['payment']['order_type']
                                );

                                $voucherTemplateImagePath = 'uploads/tx_voucher/' . $value['image'];
                                $path = 'uploads/tx_voucher/original/' . $value['image'];
                                $tmp_img = $this->imageResize('550', '770', $voucherTemplateImagePath);

                                $src = $_SERVER['DOCUMENT_ROOT'] . '/' . $tmp_img;

                                if (!copy($_SERVER['DOCUMENT_ROOT'] . '/' . $tmp_img, $_SERVER['DOCUMENT_ROOT'] . '/' . $path)) {
                                    $path = 'uploads/tx_voucher/' . $value['image'];
                                }
                                $mainVoucherData = $this->generateArray($sessionQvoucher['voucher'][$key] + $addArrayData, '');
                                $filename = $this->create_image($mainVoucherData, $path, $pdf = 1, $voucherNumber);


                                $lastInserId = $this->voucherRepository->saveOrderData($o_data);
                                $GLOBALS['TSFE']->fe_user->setKey("ses", "paymnetCheck", 'firstTime');
                            }
                        }

                        $this->sendMailOrder($sessionQvoucher, $registerUserData, $sessionUser);
                        $status = 'OrderMailSent';
                    } else {
                        $status = '';
                    }
                }
            } else {

                $status = 'paymentFail';
            }
        }


        if ($logout == 1) {

            $GLOBALS['TSFE']->fe_user->removeSessionData();

            echo '{}';
            setcookie('fe_typo_user', '', time() - 999999, 'http://www.hotel-schwedi.de//gutscheine/');
            setcookie('fe_typo_user', '', time() - 3600, 'http://www.hotel-schwedi.de//gutscheine/');
            setcookie("fe_typo_user", "", 1, '/gutscheine');

            session_start();


            $_SESSION = array();

            // If it's desired to kill the session, also delete the session cookie.
            // Note: This will destroy the session, and not just the session data!
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
                );
            }

            // Finally, destroy the session.
            session_destroy();

            setcookie("fe_typo_user", "", time() - 24 * 60 * 60, "/");
        }

        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($vouchers);
        $this->view->assignMultiple(array(
            'vouchers' => $vouchers,
            'taxdata' => $taxdata,
            'status' => $status,
            'settings' => $this->settings,
            'url' => $url,
            'registerUserData' => $registerUserData[0],
            'voucherTemplateData' => $voucherTemplateData,
            'sessionUser' => $sessionUser,
            'sessionQvoucher' => $sessionQvoucher
        ));
    }

    function getURL($id, $additionalParams) {
        $this->flURL = t3lib_div::getIndpEnv('TYPO3_SITE_URL');
        $cObject = t3lib_div::makeInstance('tslib_cObj');
        $configurations['additionalParams'] = $additionalParams;
        $configurations['returnLast'] = 'url'; // get it as URL
        $configurations['parameter'] = $id;

        return $this->flURL . $cObject->typolink(NULL, $configurations);
    }

    function generateArray($data, $watermark) {

        if (!file_exists('uploads/tx_voucher/voucher')) {
            mkdir('uploads/tx_voucher/voucher', 0777, true);
        }
        $mainVoucherData = array(
            array(
                'name' => 'Gutscheinnummer: ' . $data['voucherNumber'],
                'font-size' => '10',
                'color' => 'grey',
                'field' => 'number'
            ),
            array(
                'name' => wordwrap($data['title'], 55, "\n"),
                'font-size' => '15',
                'color' => 'blue',
                'field' => 'name'),
        );

        $message = array('name' => wordwrap($data['voucherMessage'], 60, "\n"), 'font-size' => '10', 'color' => 'grey', 'field' => 'message');
        $price = array('name' => 'Preis : ' . $data['price'] . ' €', 'font-size' => '12', 'color' => 'grey', 'field' => 'price');
        $validDate = array('name' => $date_title, 'font-size' => '8', 'color' => 'blue', 'field' => 'date');
        $watermarkText = array('name' => 'Gutschein-Vorschau', 'font-size' => '8', 'color' => 'blue', 'field' => 'watermark');


        if ($data['voucherPriceHide'] == 0) {
            array_push($mainVoucherData, $price);
        }
        if ($data['valid_till_date'] != 0) {
            $date_title = 'G�ltig bis : ' . (date('d.m.Y', $data['valid_till_date']));
            $validDate = array('name' => $date_title, 'font-size' => '12', 'color' => 'blue', 'field' => 'date');
            array_push($mainVoucherData, $validDate);
        }
        if ($watermark != '') {
            array_push($mainVoucherData, $watermarkText);
        }
        if ($data['voucherMessage'] != '') {
            array_push($mainVoucherData, $message);
        }

        return $mainVoucherData;
    }

    function registerUser($data) {

        $checkRegisterUserData = $this->voucherRepository->checkRegisterUserData($data['email']);


        $count_checkRegisterUserData = count($checkRegisterUserData);


        if ($count_checkRegisterUserData >= 1) {
            $save = 'AlreadyRegister';
        } else {

            $data_save = array(
                'is_admin' => 0,
                'de_active' => 0,
                'username' => $data['email'],
                'crdate' => time(),
                'tstamp' => time(),
                'pid' => $this->settings['flexform']['main']['voucherStorage'],
            );
            $data = $data + $data_save;
            $lastInserId = $this->voucherRepository->saveRegisterUserData($data);

            if (isset($lastInserId)) {
                $this->sendMailPassword($data);
                $save = 'MailSent';
            }
        }
        return $save;
    }

    function sendMailPassword($data) {
        $adminName = $this->settings['flexform']['register']['senderName'];
        $adminEmail = $this->settings['flexform']['register']['senderEmail'];
        $adminSubject = $this->settings['flexform']['register']['senderSubject'];
        $mailBody = $this->settings['flexform']['register']['mailBody'];
        //$receiverEmail = $this->settings['receiverEmail'];
        $receiverEmail = array(0 => array('email' => $data['email'], 'name' => $data['firstname']));
        $BccEmail = array(0 => array('email' => $this->settings['flexform']['register']['receiverEmail'], 'name' => $adminName));
        //$search = array('{property}','{name}','{email}','{number}','{place}','{message}','{ip}');
        //$replace = array($array['property'],$array['name'],$array['email'],$array['telephone'],$array['address'],$array['message'],$array['ip']);

        if ($data['gender'] == '1') {
            $gender_mail = 'Frau';
        } else {
            $gender_mail = 'Herr';
        }

        $search = array('{username}', '{password}', '{name}', '{gender}');
        $replace = array($data['email'], $data['password'], $data['firstname'], $gender_mail);

        $mailBody = str_replace($search, $replace, $mailBody);
        $mailBodyFinal = '<style>
						.fonts {font-family: "Open Sans",sans-serif !important;}
						.fonts table{background:  #f7f7f7 !important;border: 1px solid #666666;}
						table tr td {font-family: "Open Sans",sans-serif !important;}
					</style>
					<div class="fonts" style="font-family: "Open Sans",sans-serif !important;" >' . $mailBody . '</div>';


        $send = $this->sendMail($BccEmail, $receiverEmail, $adminSubject, $mailBodyFinal, '', $adminEmail, $adminName, '', '', '', '', $this->settings);


        return $send;
    }

    function sendMailOrder($voucherData, $firstname, $loginUserData) {

        $attachment = '';
        $adminName = $this->settings['flexform']['order']['senderName'];
        $adminEmail = $this->settings['flexform']['order']['senderEmail'];
        $adminSubject = $this->settings['flexform']['order']['senderSubject'];
        $mailBody = $this->settings['flexform']['order']['mailBody'];
        $receiverEmail = array(
            0 => array(
                'email' => $loginUserData['user']['name'],
                'name' => $firstname[0]['firstname']
            )
        );

        $BccEmail = array(0 => array('email' => $this->settings['flexform']['register']['receiverEmail'], 'name' => $adminName));

        $bodyVoucherData .= '<table border="1" cellpadding="5" cellspacing="2" style="border: 1px solid rgb(102, 102, 102); background: rgb(247, 247, 247); ">
						<tbody>
							<tr>

								<th>Gutschein</th>
								<th>Nummer</th>
								<th>Preis</th>
							</tr>';
        foreach ($voucherData['voucher'] as $key => $value) {
            for ($i = 1; $i <= $value['quantity']; $i++) {
                $bodyVoucherData .='
						<tr>
							<td>' . $value['title'] . '</td>
							<td>' . $value['voucherNumer'][$i] . '</td>
							<td>' . $value['price'] . ' €</td>
						</tr>
				';

                if ($voucherData['payment']['order_type'] == 'mail') {
                    $attchment['attachment']['Voucher_' . $value['voucherNumer'][$i] . '.pdf'] = "uploads/tx_voucher/voucher/" . md5($value['voucherNumer'][$i]) . ".pdf";
                }
            }
        }
        $bodyVoucherData .= '</tbody></table>';
        $search = array('{voucher_data}');
        $replace = array($bodyVoucherData);
        $mailBody = str_replace($search, $replace, $mailBody);

        $mailBodyFinal = '<style>.fonts {font-family: "Open Sans",sans-serif !important;}.fonts table{background:  #f7f7f7 !important;border: 1px solid #666666;}table tr td {font-family: "Open Sans",sans-serif !important;}</style><div class="fonts" style="font-family: "Open Sans",sans-serif !important;" >' . $mailBody . '</div>';

        $send = $this->sendMail($BccEmail, $receiverEmail, $adminSubject, $mailBodyFinal, '', $adminEmail, $adminName, '', '', '', $attchment['attachment'], $this->settings);
        return $send;
    }

    public function sendMail($BccEmail, $to, $subject, $html, $plain, $fromEmail = '', $fromName = '', $replyToEmail = '', $replyToName = '', $returnPath = '', $attachements = array(), $settings) {
        //$emailLogo =$GLOBALS['TSFE']->tmpl->flatSetup['config.emailLogo'];
        $emailLogo = 'uploads/tx_voucher/' . $settings['flexform']['main']['emailLogo'];
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

        $mail_html = $html;
        $mail_html .= '<img src="' . $baseURL . $emailLogo . '" alt="Logo"  /><br/><br/>';

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

        foreach ($BccEmail as $bcc) {
            $message->addBCC($bcc['email']);
        }
        // Attachements

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



        // Mail Send
        $message->send();

        return true;
    }

    public function showAction() {
        $GLOBALS['TSFE']->set_no_cache();
        $curr_url = t3lib_div::getIndpEnv('TYPO3_REQUEST_URL');

        $allVoucherTemplate = $this->voucherRepository->getAllVoucherTemplate();
        $this->deleteImageFile($allVoucherTemplate);
        $pageType = t3lib_div::_GP('type');
        $voucherTemplate = t3lib_div::_GP('v');
        $message = t3lib_div::_GP('m');
        $show_price = t3lib_div::_GP('p');
        $v_price = t3lib_div::_GP('price');

        //$voucherNumber = strtoupper($this->random_string(2) . substr(str_shuffle(MD5(microtime())), 0, 5) . $this->random_string(2));
        $voucherNumber = mt_rand();
        ;

        if (isset($voucherTemplate)) {
            $voucherTemplateData = $this->voucherRepository->getVoucherTemplate($voucherTemplate, 'show');

            $voucherTemplateImagePath = 'uploads/tx_voucher/' . $voucherTemplateData[0]['image'];
            $path = 'uploads/tx_voucher/original/' . $voucherTemplateData[0]['image'];
            $tmp_img = $this->imageResize('600', '800', $voucherTemplateImagePath);

            $src = $_SERVER['DOCUMENT_ROOT'] . '/' . $tmp_img;

            if (!copy($_SERVER['DOCUMENT_ROOT'] . '/' . $tmp_img, $_SERVER['DOCUMENT_ROOT'] . '/' . $path)) {
                $path = 'uploads/tx_voucher/' . $voucherTemplateData[0]['image'];
            }

            $data = array(
                'voucherNumber' => $voucherNumber,
                'title' => $voucherTemplateData[0]['title'],
                'voucherMessage' => $message,
                'voucherPriceHide' => $show_price,
                'price' => $v_price,
                'valid_till_date' => $voucherTemplateData[0]['valid_till_date']
            );
            $previewVoucherData = $this->generateArray($data, 'watermark');


            //$filename = $this->create_image($previewVoucherData,$voucherTemplateImagePath,$pdf=0,'');
            $filename = $this->create_image($previewVoucherData, $path, $pdf = 0, $voucherNumber);
            // $filename = $this->imageResize('550','770',$filename);
        }
        $this->view->assign('voucherImage', $filename);
    }

    public function imageResize($width, $height, $file) {
        $cObject = t3lib_div::makeInstance('tslib_cObj');
        $lConf['img'] = 'IMAGE';
        $lConf['img.']['file'] = $file;
        $lConf['img.']['file.']['width'] = $width;
        $lConf['img.']['file.']['height'] = $height;
        $lConf['img.']['file.']['params'] = '-quality 100';
        $images = $cObject->IMG_RESOURCE($lConf['img.']);
        return $images;
    }

    function random_string($length) {
        $key = '';
        //$keys = array_merge(range(0, 9), range('A', 'Z'));
        $keys = array_merge(range(0, 9), range(1, 7));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

    function create_image($array, $voucherTemplate, $pdf, $voucherNumber) {
        $fontname = 'typo3conf/ext/voucher/Resources/Public/Font/Marcellus-Regular.ttf';
        //$fontname = 'typo3conf/ext/voucher/Resources/Public/Font/Rochester-Regular.ttf';
        $i = 22;
        $quality = 100;

        $randNumber = rand(0, 1292938);
        if ($pdf == 1) {
            $file = "uploads/tx_voucher/voucher/" . md5($voucherNumber) . ".jpg";
            $targetCopy = "uploads/tx_voucher/voucher/" . md5($voucherNumber) . ".pdf";
        } else {
            $file = "uploads/tx_voucher/voucher/" . md5($voucherNumber) . ".jpg";
        }

        $im = imagecreatefromjpeg($voucherTemplate);

        $color['red'] = imagecolorallocate($im, 232, 0, 0);
        $color['grey'] = imagecolorallocate($im, 54, 56, 60);
        $color['green'] = imagecolorallocate($im, 110, 195, 0);
        $color['blue'] = imagecolorallocate($im, 0, 41, 81);

        $y = imagesy($im) - $height - 500;

        foreach ($array as $key => $value) {

            if ($value['field'] == 'number') {
                $i = $i + 32;
            } elseif ($value['field'] == 'name') {
                $words = explode(" ", $value['name']);
                $i = $i + 32;
            } elseif ($value['field'] == 'message') {
                $words = explode(" ", $value['message']);
                $wnum = count($words);
                if ($wnum >= 25) {
                    $i = $i + 120;
                } elseif ($wnum >= 20) {
                    $i = $i + 85;
                } elseif ($wnum >= 15) {
                    $i = $i + 70;
                } elseif ($wnum >= 10) {
                    $i = $i + 60;
                } elseif ($wnum >= 5) {
                    $i = $i + 55;
                } else {
                    $i = $i + 32;
                }
            } else {
                $i = $i + 32;
            }
            $x = $this->center_text($value['name'], $value['font-size']);
            imagettftext($im, $value['font-size'], 0, $x, $y + $i, $color[$value['color']], $fontname, $value['name'] . "\n");
        }
        //imagecopyresampled ($im, $file, $quality);
        header('Content-Type: image/jpeg');
        imagejpeg($im, $file, $quality);

        if ($pdf == 1) {

            $img = new imagick($file);

            $img->readImage();
            //$img->scaleImage(0,300);
            // $img->setImageResolution(550,778);

            $img->setImageCompressionQuality(100);
            $img->setImageResolution(100, 100);
            $img->setImageDepth(8);
            $img->sharpenimage(0.1, 75);
            $success = $img->writeImages($targetCopy, false);
        } else {
            header('Content-Type: image/jpeg');
            imagejpeg($im, $file, $quality);
        }

        return $file;
    }

    function center_text($string, $font_size) {
        //$fontname = 'typo3conf/ext/voucher/Resources/Public/Font/Rochester-Regular.ttf';
        $fontname = 'typo3conf/ext/voucher/Resources/Public/Font/Marcellus-Regular.ttf';
        $image_width = 450;
        $dimensions = imagettfbbox($font_size, 0, $fontname, $string);
        return ceil((($image_width + 120) - $dimensions[4]) / 2);
    }

    function deleteImageFile($voucherTemplateData) {
        foreach ($voucherTemplateData as $key => $value) {
            $deleteFile = "uploads/tx_voucher/" . md5($voucherTemplateData[$key]['title']) . ".jpg";
            @unlink($deleteFile);
        }
    }

}

?>