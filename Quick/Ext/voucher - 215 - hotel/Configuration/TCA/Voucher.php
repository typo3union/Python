<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_voucher_domain_model_voucher'] = array(
	'ctrl' => $TCA['tx_voucher_domain_model_voucher']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, price,tax, valid_till_date, image, short_description, long_descption',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, price, tax, valid_till_date, image, short_description, long_descption, --div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
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
				'foreign_table' => 'tx_voucher_domain_model_voucher',
				'foreign_table_where' => 'AND tx_voucher_domain_model_voucher.pid=###CURRENT_PID### AND tx_voucher_domain_model_voucher.sys_language_uid IN (-1,0)',
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
		'title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_voucher.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'price' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_voucher.price',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
                            
			),
		),
		'tax' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_voucher.tax',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
                                'default' => '19%',
                            'value' => '19%'
			),
		),
		'valid_till_date' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_voucher.valid_till_date',
			'config' => array(
				'type' => 'input',
				'size' => 7,
				'eval' => 'date',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'image' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_voucher.image',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_voucher',
				'show_thumbs' => 1,
				'size' => 5,
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'disallowed' => '',
			),
		),
		'short_description' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_voucher.short_description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'long_descption' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_voucher.long_descption',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'script' => 'wizard_rte.php',
						'title' => 'LLL:EXT:cms/locallang_ttc.xml:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
			'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]',
		),
		'voucher_category' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:voucher/Resources/Private/Language/locallang_db.xml:tx_voucher_domain_model_voucher.voucher_category',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
	),
);

?>