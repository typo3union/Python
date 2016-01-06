<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_jscareer_domain_model_job'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_jscareer_domain_model_job']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, place, join_check, join_date, text_check, text, ab_sofort, timing, contract, short_description, description_header, description_part1, description_part2, pdf, caetgory, contact_person, applicant',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, place, join_check, join_date, text_check, text, ab_sofort, timing, contract, short_description, description_header, description_part1;;;richtext:rte_transform[mode=ts_links], description_part2;;;richtext:rte_transform[mode=ts_links], pdf, caetgory, contact_person, applicant, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_jscareer_domain_model_job',
				'foreign_table_where' => 'AND tx_jscareer_domain_model_job.pid=###CURRENT_PID### AND tx_jscareer_domain_model_job.sys_language_uid IN (-1,0)',
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
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_job.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'place' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_job.place',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'join_check' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_job.join_check',
			'onChange' => 'reload',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'join_date' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_job.join_date',
			'displayCond' => 'FIELD:join_check:=:1',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'text_check' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_job.text_check',
			'onChange' => 'reload',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'text' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_job.text',
			'displayCond' => 'FIELD:text_check:=:1',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'ab_sofort' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_job.ab_sofort',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'timing' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_job.timing',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_job.timing.I.0', 0),
					array('LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_job.timing.I.1', 1),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		'contract' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_job.contract',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'short_description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_job.short_description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'description_header' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_job.description_header',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'description_part1' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_job.description_part1',
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
		'description_part2' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_job.description_part2',
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
		'pdf' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_job.pdf',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'pdf',
				array('maxitems' => 1),
				'*'
			),
		),
		'caetgory' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_job.caetgory',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_jscareer_domain_model_clinik',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'contact_person' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_job.contact_person',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_jscareer_domain_model_manager',
				'MM' => 'tx_jscareer_job_manager_mm',
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
							'table' => 'tx_jscareer_domain_model_manager',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		'applicant' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_job.applicant',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_jscareer_domain_model_applicant',
				'foreign_field' => 'job',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),

		),
		
	),
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

$GLOBALS['TCA']['tx_jscareer_domain_model_job']['types']['1']['showitem'] = 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, place, join_check, join_date, text_check, text, ab_sofort, timing, contract, short_description, --div--; Clinik ,caetgory, --div--; Contact Person , contact_person, --div--; Description , description_header, description_part1;;;richtext:rte_transform[mode=ts_links], description_part2;;;richtext:rte_transform[mode=ts_links], --div--; PDF, pdf, --div--; Applicant, applicant, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime';

$GLOBALS['TCA']['tx_jscareer_domain_model_job']['columns']['title']['config']['eval'] = 'trim,required';
$GLOBALS['TCA']['tx_jscareer_domain_model_job']['columns']['join_check']['onChange'] = 'reload';
$GLOBALS['TCA']['tx_jscareer_domain_model_job']['columns']['join_date']['displayCond'] = 'FIELD:join_check:=:1';
$GLOBALS['TCA']['tx_jscareer_domain_model_job']['columns']['text_check']['onChange'] = 'reload';
$GLOBALS['TCA']['tx_jscareer_domain_model_job']['columns']['text']['displayCond'] = 'FIELD:text_check:=:1';

$GLOBALS['TCA']['tx_jscareer_domain_model_job']['columns']['timing']['config']['items'] =  array(
					array('LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_job.timing.I.0', 0),
					array('LLL:EXT:js_career/Resources/Private/Language/locallang_db.xlf:tx_jscareer_domain_model_job.timing.I.1', 1),
				);

$GLOBALS['TCA']['tx_jscareer_domain_model_job']['columns']['pdf']['config'] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'pdf',
				array('maxitems' => 1),
				'pdf'
			);