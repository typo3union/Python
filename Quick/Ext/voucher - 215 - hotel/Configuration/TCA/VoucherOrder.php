<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_voucher_domain_model_voucherorder'] = array(
	'ctrl' => $TCA['tx_voucher_domain_model_voucherorder']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, de_active, voucher_name, voucher_number, payment_type, voucher_price, spend_amount, reaming_amount,customer',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, de_active, voucher_name, voucher_number, payment_type, voucher_price, spend_amount, reaming_amount,customer,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_voucher_domain_model_voucherorder',
				'foreign_table_where' => 'AND tx_voucher_domain_model_voucherorder.pid=###CURRENT_PID### AND tx_voucher_domain_model_voucherorder.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'de_active' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_voucherorder.de_active',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'voucher_name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_voucherorder.voucher_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'voucher_number' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_voucherorder.voucher_number',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'payment_type' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_voucherorder.payment_type',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('PayPal', 0),
					array('Offline (Cash)', 1),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		'voucher_price' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_voucherorder.voucher_price',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'paid_price' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_voucherorder.paid_price',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'spend_amount' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_voucherorder.spend_amount',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'reaming_amount' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_voucherorder.reaming_amount',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'customer' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_voucherorder.customer',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'customer_id' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_voucherorder.customer_id',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_voucher_domain_model_vouchercustomer',
				'minitems' => 0,
				'maxitems' => 1,
				'appearance' => array(
					'collapseAll' => 1,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
	),
);

?>