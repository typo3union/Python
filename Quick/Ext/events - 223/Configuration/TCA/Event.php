<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_events_domain_model_event'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_events_domain_model_event']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, date, time, private, category, location,description,ics_file',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, date, time, private, category, location,description,ics_file, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_events_domain_model_event',
				'foreign_table_where' => 'AND tx_events_domain_model_event.pid=###CURRENT_PID### AND tx_events_domain_model_event.sys_language_uid IN (-1,0)',
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
			'label' => 'LLL:EXT:events/Resources/Private/Language/locallang_db.xlf:tx_events_domain_model_event.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'date' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:events/Resources/Private/Language/locallang_db.xlf:tx_events_domain_model_event.date',
			'config' => array(
				'type' => 'input',
				'size' => 7,
				'eval' => 'date',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'time' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:events/Resources/Private/Language/locallang_db.xlf:tx_events_domain_model_event.time',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'private' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:events/Resources/Private/Language/locallang_db.xlf:tx_events_domain_model_event.private',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('No', 0),
					array('Yes', 1),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		'category' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:events/Resources/Private/Language/locallang_db.xlf:tx_events_domain_model_event.category',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_events_domain_model_category',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'location' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:events/Resources/Private/Language/locallang_db.xlf:tx_events_domain_model_event.location',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_events_domain_model_location',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		/*'ics_file' => array(
			'exclude' => 1,
			'label' => 'ICS File',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'icsFile',
				array('maxitems' => 1),
				'ics'
			),
		),*/
		'ics_file' => array(
			'exclude' => 1,
			'label' => 'ICS File',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		
		'description' => array(
			'exclude' => 1,
			'label' => 'description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 3,
				'eval' => 'trim',
				'max' => 50,
			)
		),
		
	),
);

