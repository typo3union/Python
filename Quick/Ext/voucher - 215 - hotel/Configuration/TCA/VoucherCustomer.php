<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_voucher_domain_model_vouchercustomer'] = array(
	'ctrl' => $TCA['tx_voucher_domain_model_vouchercustomer']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, is_admin, de_active, gender, email, username, password, firstname, lastname, company,invoice, address, zip, location, country, phone',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, is_admin, de_active, gender, email, username, password, firstname, lastname, company, invoice,address, zip, location, country, phone,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
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
				'foreign_table' => 'tx_voucher_domain_model_vouchercustomer',
				'foreign_table_where' => 'AND tx_voucher_domain_model_vouchercustomer.pid=###CURRENT_PID### AND tx_voucher_domain_model_vouchercustomer.sys_language_uid IN (-1,0)',
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
		'is_admin' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_vouchercustomer.is_admin',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'de_active' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_vouchercustomer.de_active',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'gender' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_vouchercustomer.gender',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('Herr', 0),
					array('Frau', 1),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		'email' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_vouchercustomer.email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'username' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_vouchercustomer.username',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'password' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_vouchercustomer.password',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'firstname' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_vouchercustomer.firstname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'lastname' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_vouchercustomer.lastname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'company' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_vouchercustomer.company',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'invoice' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_vouchercustomer.invoice',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'address' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_vouchercustomer.address',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'zip' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_vouchercustomer.zip',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'location' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_vouchercustomer.location',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'country' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_vouchercustomer.country',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'phone' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_vouchercustomer.phone',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
	),
);

?>