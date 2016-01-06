<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_product_domain_model_product'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_product_domain_model_product']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, featured_product, name, season, image, featured_image, content, table_content, category',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, featured_product, name, season, image, featured_image, content;;;richtext:rte_transform[mode=ts_links], table_content;;;richtext:rte_transform[mode=ts_links], category, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
		'season' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:product/Resources/Private/Language/locallang_db.xlf:tx_product_domain_model_product.season',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
	    'image' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:product/Resources/Private/Language/locallang_db.xlf:tx_product_domain_model_product.image',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'image',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'featured_image' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:product/Resources/Private/Language/locallang_db.xlf:tx_product_domain_model_product.featured_image',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'featuredImage',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'content' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:product/Resources/Private/Language/locallang_db.xlf:tx_product_domain_model_product.content',
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
		'table_content' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:product/Resources/Private/Language/locallang_db.xlf:tx_product_domain_model_product.table_content',
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
	 'category' => array(
	        'exclude' => 1,
	        'label' => 'LLL:EXT:myproduct/Resources/Private/Language/locallang_db.xlf:tx_product_domain_model_product.category',
	        'config' => array(
	            'type' => 'select',
	            'foreign_table' => 'tx_product_domain_model_category',
	            'foreign_table_where' => ' AND tx_product_domain_model_category.is_sub=0',
	            'minitems' => 0,
	            'maxitems' => 1,
	        ),
	    ),
		
	),
);
