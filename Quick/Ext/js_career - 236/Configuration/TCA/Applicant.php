<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_jscareer_domain_model_applicant'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_jscareer_domain_model_applicant']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, phone, email, resume, contact_date, ip, useragent',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, phone, email, resume, contact_date, ip, useragent, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_jscareer_domain_model_applicant',
				'foreign_table_where' => 'AND tx_jscareer_domain_model_applicant.pid=###CURRENT_PID### AND tx_jscareer_domain_model_applicant.sys_language_uid IN (-1,0)',
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
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_applicant.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'phone' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_applicant.phone',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'email' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_applicant.email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'resume' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_applicant.resume',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'resume',
				array('maxitems' => 1),
				'*'
			),
		),
		'contact_date' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_applicant.contact_date',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'ip' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_applicant.ip',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'useragent' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_applicant.useragent',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		
		'job' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

$GLOBALS['TCA']['tx_jscareer_domain_model_applicant']['types']['1']['showitem'] = 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, phone, email, resume, --div--; Other Information, contact_date, ip, useragent, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime';

$GLOBALS['TCA']['tx_jscareer_domain_model_applicant']['columns']['contact_date']['config']['readOnly'] = '1';
$GLOBALS['TCA']['tx_jscareer_domain_model_applicant']['columns']['ip']['config']['readOnly'] = '1';
$GLOBALS['TCA']['tx_jscareer_domain_model_applicant']['columns']['useragent']['config']['readOnly'] = '1';
$GLOBALS['TCA']['tx_jscareer_domain_model_applicant']['columns']['useragent']['config']['size'] = '48';

$GLOBALS['TCA']['tx_jscareer_domain_model_applicant']['columns']['resume']['config'] = array (
				 "type"  => "inline",
				 "internal_type"  => "file",
				 "size"  => 10,
				 "minitems"  => 1,
				 "maxitems"  => 1,
					
				 "appearance"  => array(
					"headerThumbnail"  => array(
					   "field"  =>"uid_local",
						  "height"  =>"45c",
						  "width"  => "45"
					   ),
					   "enabledControls"  => array(
						  "delete" => 1,
						  "dragdrop"  => 1,
						  "hide"  => 1,
						  "info"  => 1,
						  "localize"  => 1
					   ),
					   "useSortable"  => 1
				 ),
					
				 "behaviour"  => array(
					"localizationMode"  => "select",
					"localizeChildrenAtParentLocalization"  => 1
				 ),
					
				 "foreign_field"  => "uid_foreign",
				 "foreign_label"  => "uid_local",
		
				 "foreign_match_fields"  => array(
					"fieldname"  => "resume"
				 ),
					
				 "foreign_selector"  => "uid_local",
					
				 "foreign_selector_fieldTcaOverride"  => array(
					"config"  => array(
					   "appearance"  => array(
						  "elementBrowserAllowed"  => "pdf",
						  "elementBrowserType"  => "file"
					   )
					)
				 ),
					
				 "foreign_sortby"  => "sorting_foreign",
				 "foreign_table"  => "sys_file_reference",
				 "foreign_table_field"  => "tablenames",
		
				 "show_thumbs" => 1,
		
			  );