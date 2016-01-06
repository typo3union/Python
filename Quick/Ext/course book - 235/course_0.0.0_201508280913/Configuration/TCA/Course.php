<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_course_domain_model_course'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_course_domain_model_course']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden,sort, name, organiser, addmenu,shorttext,kursinformationentext, description, kursinhaltetext,kursinhalte;;;richtext:rte_transform[mode=ts_links],weitereInformationentext,weitereinformationen;;;richtext:rte_transform[mode=ts_links],images, bannerimages, video, location, cat, dateduration, realtedcourse,bookingadwords, contactadwords,bottomimage',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1,sort, name, organiser, addmenu,shorttext;;;richtext:rte_transform[mode=ts_links], kursinformationentext,description;;;richtext:rte_transform[mode=ts_links],  kursinhaltetext,kursinhalte;;;richtext:rte_transform[mode=ts_links],weitereInformationentext,weitereinformationen;;;richtext:rte_transform[mode=ts_links],images, bannerimages, video, location, cat, dateduration, realtedcourse,bookingadwords , contactadwords,bottomimage,metaTitle , metaDesc, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_course_domain_model_course',
				'foreign_table_where' => 'AND tx_course_domain_model_course.pid=###CURRENT_PID### AND tx_course_domain_model_course.sys_language_uid IN (-1,0)',
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

		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_course.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'organiser' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_course.organiser',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'shorttext' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_course.shorttext',
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
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_course.description',
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
		'discounts' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_course.discounts',
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
		'priceinfo' => array(
			'exclude' => 1,
			'label' => 'Price Text',
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
		'kursinhalte' => array(
			'exclude' => 1,
			'label' => 'Kursinhalte',
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
		
		'weitereinformationen' => array(
			'exclude' => 1,
			'label' => 'Weitere Informationen',
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
		
		  
		'price' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_course.price',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'lastminprice' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_course.lastminprice',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		
		
		'addmenu' => array(
			'exclude' => 1,
			'label' => 'Add to Main Menu',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'actlastmin' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_course.actlastmin',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'links' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_course.links',
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
		'images' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_course.images',
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
		'downloads' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_course.downloads',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_course_domain_model_downloads',
				'MM' => 'tx_course_course_downloads_mm',
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
							'table' => 'tx_course_domain_model_downloads',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		'location' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_course.location',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_course_domain_model_locations',
				'MM' => 'tx_course_course_locations_mm',
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
							'table' => 'tx_course_domain_model_locations',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		'cat' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_course.cat',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_course_domain_model_category',
				'minitems' => 0,
				'maxitems' => 1,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'dateduration' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_course.dateduration',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_course_domain_model_datestartend',
				'MM' => 'tx_course_course_datestartend_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 999999999999,
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
							'table' => 'tx_course_domain_model_datestartend',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		'realtedcourse' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_course.realtedcourse',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_course_domain_model_course',
				'MM' => 'tx_course_course_course_mm',
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
							'table' => 'tx_course_domain_model_course',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		
		'video' => array(
			'exclude' => 1,
			'label' => 'Youtube Video ID',
			'config' => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim'
			),
		),
		
		'kursinformationentext' => array(
			'exclude' => 1,
			'label' => 'Kursinformationen Title',
			'config' => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim'
			),
		),
		'kursinhaltetext' => array(
			'exclude' => 1,
			'label' => 'Kursinhalte Title',
			'config' => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim'
			),
		),
		'weitereInformationentext' => array(
			'exclude' => 1,
			'label' => 'WeitereInformationen Title',
			'config' => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim'
			),
		),
		 'bookingadwords' => array(
			'exclude' => 1,
			'label' => 'Google Course Booking AdWords',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				
			),
		),
		'contactadwords' => array(
			'exclude' => 1,
			'label' => 'Google Course Contact AdWords',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				
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



$bg_image = array(
        'bg_image' => array (
                'exclude' => 0,
                'label' => 'Background Image',
                'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_fluxtemplate',
				'show_thumbs' => 1,
				'size' => 1,
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'disallowed' => ''
			),
        )
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'pages',
        $bg_image,
        1
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
        'pages',
        'visibility',
        'bg_image',
        'before:storage_pid'
);

