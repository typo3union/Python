<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_course_domain_model_datestartend'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_course_domain_model_datestartend']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, titleinfo, type,startdate, enddate, price, actlastmin,lastmintuteprice, durationtiming',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1,titleinfo, type, startdate, enddate, price, actlastmin ,lastmintuteprice, durationtiming, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_course_domain_model_datestartend',
				'foreign_table_where' => 'AND tx_course_domain_model_datestartend.pid=###CURRENT_PID### AND tx_course_domain_model_datestartend.sys_language_uid IN (-1,0)',
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

		'titleinfo' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_datestartend.titleinfo',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'startdate' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_datestartend.startdate',
			'config' => array(
				'dbType' => 'date',
				'type' => 'input',
				'size' => 7,
				'eval' => 'date',
				'checkbox' => 0,
				'default' => '0000-00-00'
			),
		),
		'enddate' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_datestartend.enddate',
			'config' => array(
				'dbType' => 'date',
				'type' => 'input',
				'size' => 7,
				'eval' => 'date',
				'checkbox' => 0,
				'default' => '0000-00-00'
			),
		),
		'price' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_datestartend.price',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'lastmintuteprice' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_datestartend.lastmintuteprice',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'actlastmin' => array(
			'exclude' => 1,
			'label' => 'Add to Last Minute',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		
		'durationtiming' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:course/Resources/Private/Language/locallang_db.xlf:tx_course_domain_model_datestartend.durationtiming',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_course_domain_model_dates',
				'MM' => 'tx_course_datestartend_dates_mm',
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
							'table' => 'tx_course_domain_model_dates',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
			
		'type' => array(
			'exclude' => 1,
			'label' => 'Select Type',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('Praxis', 0),
					array('Theorie', 1),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		
	),
);
