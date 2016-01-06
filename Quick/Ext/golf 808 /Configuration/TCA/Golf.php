<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_golf_domain_model_golf'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_golf_domain_model_golf']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, putting_holes, name, title, video_image, video, hole_image, par, hcp, red, green,m_green, pinposition_image, slider_images, description_title,content, tx_golf_table,degree_view',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, putting_holes, name, title, video_image, video, hole_image, par, hcp, red, green, m_green,pinposition_image, slider_images,description_title, content,degree_view;;;richtext:rte_transform[mode=ts_links], tx_golf_table;;;richtext:rte_transform[mode=ts_links], --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_golf_domain_model_golf',
				'foreign_table_where' => 'AND tx_golf_domain_model_golf.pid=###CURRENT_PID### AND tx_golf_domain_model_golf.sys_language_uid IN (-1,0)',
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

		'putting_holes' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:golf/Resources/Private/Language/locallang_db.xlf:tx_golf_domain_model_golf.putting_holes',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:golf/Resources/Private/Language/locallang_db.xlf:tx_golf_domain_model_golf.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:golf/Resources/Private/Language/locallang_db.xlf:tx_golf_domain_model_golf.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'video_image' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:golf/Resources/Private/Language/locallang_db.xlf:tx_golf_domain_model_golf.video_image',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'videoImage',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'video' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:golf/Resources/Private/Language/locallang_db.xlf:tx_golf_domain_model_golf.video',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'hole_image' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:golf/Resources/Private/Language/locallang_db.xlf:tx_golf_domain_model_golf.hole_image',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'holeImage',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'par' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:golf/Resources/Private/Language/locallang_db.xlf:tx_golf_domain_model_golf.par',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'hcp' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:golf/Resources/Private/Language/locallang_db.xlf:tx_golf_domain_model_golf.hcp',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'red' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:golf/Resources/Private/Language/locallang_db.xlf:tx_golf_domain_model_golf.red',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'green' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:golf/Resources/Private/Language/locallang_db.xlf:tx_golf_domain_model_golf.green',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'm_green' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:golf/Resources/Private/Language/locallang_db.xlf:tx_golf_domain_model_golf.m_green',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'pinposition_image' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:golf/Resources/Private/Language/locallang_db.xlf:tx_golf_domain_model_golf.pinposition_image',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'pinpositionImage',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'slider_images' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:golf/Resources/Private/Language/locallang_db.xlf:tx_golf_domain_model_golf.slider_images',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'sliderImages',
				array('maxitems' => 10),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'content' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:golf/Resources/Private/Language/locallang_db.xlf:tx_golf_domain_model_golf.content',
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
		'tx_golf_table' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:golf/Resources/Private/Language/locallang_db.xlf:tx_golf_domain_model_golf.tx_golf_table',
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
		'description_title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:golf/Resources/Private/Language/locallang_db.xlf:tx_golf_domain_model_golf.description_title',
			'config' => array(
				'type' => 'input',
				'size' => 50,
				'eval' => 'trim'
			),
		),
		
		'degree_view' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:golf/Resources/Private/Language/locallang_db.xlf:tx_golf_domain_model_golf.degree_view',
			'config' => array(
				'type' => 'input',
				'size' => 50,
				'eval' => 'trim'
			),
		),

		
	),
);


$GLOBALS['TCA']['tx_golf_domain_model_golf']['columns']['degree_view']['config']['wizards'] = array(
	'_PADDING' => 2,
	'degree_view' => array (
		'type' => 'popup',
		'title' => 'Link',
		'icon' => 'link_popup.gif',
		'script' => 'browse_links.php?mode=wizard&amp;act=folder',
		
		'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
	)
);

