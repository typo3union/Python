<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Voucher',
	'Voucher'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Voucher');

// FlexForm start
$extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);
$pluginSignature = strtolower($extensionName).'_voucher';

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/FlexForm.xml');
// FlexForm end

// Wizard pi1 start
if (TYPO3_MODE == 'BE') {
	$TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses'][$_EXTKEY . '_wizicon'] =
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Resources/Private/Php/class.' . $_EXTKEY . '_wizicon.php';
}
// Wizard pi1 end


t3lib_extMgm::addLLrefForTCAdescr('tx_voucher_domain_model_voucher', 'EXT:voucher/Resources/Private/Language/locallang_csh_tx_voucher_domain_model_voucher.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_voucher_domain_model_voucher');
$TCA['tx_voucher_domain_model_voucher'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_voucher',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'thumbnail'=>'image',
		'searchFields' => 'title,price,tax,valid_till_date,image,short_description,long_descption,voucher_category,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Voucher.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_voucher_domain_model_voucher.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_voucher_domain_model_vouchercustomer', 'EXT:voucher/Resources/Private/Language/locallang_csh_tx_voucher_domain_model_vouchercustomer.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_voucher_domain_model_vouchercustomer');
$TCA['tx_voucher_domain_model_vouchercustomer'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_vouchercustomer',
		'label' => 'email',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'is_admin,de_active,gender,email,username,password,firstname,lastname,company,address,zip,location,country,phone,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/VoucherCustomer.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_voucher_domain_model_vouchercustomer.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_voucher_domain_model_voucherorder', 'EXT:voucher/Resources/Private/Language/locallang_csh_tx_voucher_domain_model_voucherorder.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_voucher_domain_model_voucherorder');
$TCA['tx_voucher_domain_model_voucherorder'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_voucherorder',
		'label' => 'voucher_number',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'de_active,voucher_name,voucher_number,payment_type,voucher_price,paid_price,spend_amount,reaming_amount,customer_id,customer,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/VoucherOrder.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_voucher_domain_model_voucherorder.gif'
	),
);


t3lib_extMgm::addLLrefForTCAdescr('tx_voucher_domain_model_tempstorage', 'EXT:voucher/Resources/Private/Language/locallang_csh_tx_voucher_domain_model_tempstorage.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_voucher_domain_model_tempstorage');
$TCA['tx_voucher_domain_model_tempstorage'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_tempstorage',
		'label' => 'username',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'username,password,userid,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/TempStorage.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_voucher_domain_model_tempstorage.gif'
	),
);

?>