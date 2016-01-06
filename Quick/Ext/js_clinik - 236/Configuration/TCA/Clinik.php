<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_jsclinik_domain_model_clinik'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_jsclinik_domain_model_clinik']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, location, logo, description, link, clinik_id, image, latitude, longitude, display_map_content, map_content, map_icon, facilities',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, location, logo, description;;;richtext:rte_transform[mode=ts_links], link, clinik_id, image, latitude, longitude, display_map_content, map_content;;;richtext:rte_transform[mode=ts_links], map_icon, facilities, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_jsclinik_domain_model_clinik',
				'foreign_table_where' => 'AND tx_jsclinik_domain_model_clinik.pid=###CURRENT_PID### AND tx_jsclinik_domain_model_clinik.sys_language_uid IN (-1,0)',
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

		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_clinik/Resources/Private/Language/locallang_db.xlf:tx_jsclinik_domain_model_clinik.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'location' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_clinik/Resources/Private/Language/locallang_db.xlf:tx_jsclinik_domain_model_clinik.location',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'logo' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_clinik/Resources/Private/Language/locallang_db.xlf:tx_jsclinik_domain_model_clinik.logo',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'logo',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_clinik/Resources/Private/Language/locallang_db.xlf:tx_jsclinik_domain_model_clinik.description',
			'defaultExtras' => 'richtext[*]',
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
		'link' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_clinik/Resources/Private/Language/locallang_db.xlf:tx_jsclinik_domain_model_clinik.link',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'clinik_id' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_clinik/Resources/Private/Language/locallang_db.xlf:tx_jsclinik_domain_model_clinik.clinik_id',
			'config' => array(
				'type' => 'input',
				'size' => 2,
				'max' => 2,
				'eval' => 'trim, num'
			),
		),
		'image' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_clinik/Resources/Private/Language/locallang_db.xlf:tx_jsclinik_domain_model_clinik.image',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'image',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'latitude' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_clinik/Resources/Private/Language/locallang_db.xlf:tx_jsclinik_domain_model_clinik.latitude',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'longitude' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_clinik/Resources/Private/Language/locallang_db.xlf:tx_jsclinik_domain_model_clinik.longitude',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'display_map_content' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_clinik/Resources/Private/Language/locallang_db.xlf:tx_jsclinik_domain_model_clinik.display_map_content',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'map_content' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_clinik/Resources/Private/Language/locallang_db.xlf:tx_jsclinik_domain_model_clinik.map_content',
			'defaultExtras' => 'richtext[*]',
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
		'map_icon' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_clinik/Resources/Private/Language/locallang_db.xlf:tx_jsclinik_domain_model_clinik.map_icon',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'mapIcon',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'facilities' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_clinik/Resources/Private/Language/locallang_db.xlf:tx_jsclinik_domain_model_clinik.facilities',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_jsclinik_domain_model_facilities',
				'MM' => 'tx_jsclinik_clinik_facilities_mm',
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
							'table' => 'tx_jsclinik_domain_model_facilities',
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
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

$GLOBALS['TCA']['tx_jsclinik_domain_model_clinik']['types']['1']['showitem'] = 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, location, logo, description;;;richtext:rte_transform[mode=ts_links], link, clinik_id, facilities , --div--; For Footer Map, image, latitude, longitude, display_map_content, map_content, map_icon, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime';