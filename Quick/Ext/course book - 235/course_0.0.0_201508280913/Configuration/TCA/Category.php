<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_course_domain_model_category'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_course_domain_model_category']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, sort,category,maincategory,parentcategory, information,bannerimages,adword,bottomimage',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, sort,category, maincategory,parentcategory,information;;;richtext:rte_transform[mode=ts_links],bannerimages,adword,bottomimage,metaTitle,metaDesc'),
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
				'foreign_table' => 'tx_course_domain_model_category',
				'foreign_table_where' => 'AND tx_course_domain_model_category.pid=###CURRENT_PID### AND tx_course_domain_model_category.sys_language_uid IN (-1,0)',
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

		'category' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_category.category',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'information' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_category.information',
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
		'maincategory' => array(
        'label' => 'Check if main category',
		'exclude' => 1,
		'config' => array(
				'type' => 'check',
				'default' => '0'
		)
		),
		
		'parentcategory' => array(
			'exclude' => 1,
			'label' => 'Select Sub Category',
			'config' => array(
				'type' => 'select', 
				'items' => array(
                        array('--Select Sub Category--', 0)
                ),
				'foreign_table' => 'tx_course_domain_model_category',
				'foreign_table_where' => ' AND tx_course_domain_model_category.hidden=0 AND tx_course_domain_model_category.deleted=0 AND maincategory=0',
				'minitems' => 0,
				'maxitems' => 10,
				'size' => 6,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		
		'bannerimages' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_course.bannerimages',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
				'uploadfolder' => 'uploads/tx_course',
				'show_thumbs' => 1,
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 100,
			), 
		),	
            'adword' => array(
			'exclude' => 1,
			'label' => 'Google AdWords',
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
		
		'bottomimage' => array(
			'exclude' => 1,
			'label' => 'Bottom Image',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
				'uploadfolder' => 'uploads/tx_course',
				'show_thumbs' => 1,
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			), 
		),
		
		'sort' => array(
			'exclude' => 1,
			'label' => 'Sort Number',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,int'
			),
		),
		
		'metaTitle' => array(
			'exclude' => 1,
			'label' => 'Meta Title',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 3,
				'eval' => 'trim',				
			),
		),	
		'metaDesc' => array(
			'exclude' => 1,
			'label' => 'Meta Description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 3,
				'eval' => 'trim',				
			),
		),

	),
);
