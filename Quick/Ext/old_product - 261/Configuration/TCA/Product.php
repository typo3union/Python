<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_product_domain_model_product'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_product_domain_model_product']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, featured_product, name, images, description, machine_no, location, year, rating, category',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, featured_product, name, images, description;;;richtext:rte_transform[mode=ts_links], machine_no, location, year, rating, category, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_product_domain_model_product',
				'foreign_table_where' => 'AND tx_product_domain_model_product.pid=###CURRENT_PID### AND tx_product_domain_model_product.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
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
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
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

		'featured_product' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:product/Resources/Private/Language/locallang_db.xlf:tx_product_domain_model_product.featured_product',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:product/Resources/Private/Language/locallang_db.xlf:tx_product_domain_model_product.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'images' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:product/Resources/Private/Language/locallang_db.xlf:tx_product_domain_model_product.images',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
				'uploadfolder' => 'uploads/tx_product',
				'show_thumbs' => 1,
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 100,
			), 	
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:product/Resources/Private/Language/locallang_db.xlf:tx_product_domain_model_product.description',
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
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		'machine_no' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:product/Resources/Private/Language/locallang_db.xlf:tx_product_domain_model_product.machine_no',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'location' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:product/Resources/Private/Language/locallang_db.xlf:tx_product_domain_model_product.location',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'year' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:product/Resources/Private/Language/locallang_db.xlf:tx_product_domain_model_product.year',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'rating' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:product/Resources/Private/Language/locallang_db.xlf:tx_product_domain_model_product.rating',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('-- Label --', 0),
				    array('1', 1),
				    array('2', 2),
				    array('3', 3),
				    array('4', 4),
				    array('5', 5),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		'category' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:product/Resources/Private/Language/locallang_db.xlf:tx_product_domain_model_product.category',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_product_domain_model_category',
				'MM' => 'tx_product_product_category_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_product_domain_model_category',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		
	),
);
