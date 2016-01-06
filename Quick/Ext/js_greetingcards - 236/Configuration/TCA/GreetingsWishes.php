<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, header, name, patient_name, room, description, generated_pdf, admin_name, admin_email, mail_subject, creation_date, sender_ip, user_agent, marketing_referer_domain, marketing_referer, page, marketing_mobile_device, marketing_frontend_language, marketing_browser_language, card',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, header, name, patient_name, room, description, generated_pdf, admin_name, admin_email, mail_subject, creation_date, sender_ip, user_agent, marketing_referer_domain, marketing_referer, page, marketing_mobile_device, marketing_frontend_language, marketing_browser_language, card, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_jsgreetingcards_domain_model_greetingswishes',
				'foreign_table_where' => 'AND tx_jsgreetingcards_domain_model_greetingswishes.pid=###CURRENT_PID### AND tx_jsgreetingcards_domain_model_greetingswishes.sys_language_uid IN (-1,0)',
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

		'header' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_greetingcards/Resources/Private/Language/locallang_db.xlf:tx_jsgreetingcards_domain_model_greetingswishes.header',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_greetingcards/Resources/Private/Language/locallang_db.xlf:tx_jsgreetingcards_domain_model_greetingswishes.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'patient_name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_greetingcards/Resources/Private/Language/locallang_db.xlf:tx_jsgreetingcards_domain_model_greetingswishes.patient_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'room' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_greetingcards/Resources/Private/Language/locallang_db.xlf:tx_jsgreetingcards_domain_model_greetingswishes.room',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_greetingcards/Resources/Private/Language/locallang_db.xlf:tx_jsgreetingcards_domain_model_greetingswishes.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'generated_pdf' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_greetingcards/Resources/Private/Language/locallang_db.xlf:tx_jsgreetingcards_domain_model_greetingswishes.generated_pdf',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'admin_name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_greetingcards/Resources/Private/Language/locallang_db.xlf:tx_jsgreetingcards_domain_model_greetingswishes.admin_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'admin_email' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_greetingcards/Resources/Private/Language/locallang_db.xlf:tx_jsgreetingcards_domain_model_greetingswishes.admin_email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'mail_subject' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_greetingcards/Resources/Private/Language/locallang_db.xlf:tx_jsgreetingcards_domain_model_greetingswishes.mail_subject',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'creation_date' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_greetingcards/Resources/Private/Language/locallang_db.xlf:tx_jsgreetingcards_domain_model_greetingswishes.creation_date',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'sender_ip' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_greetingcards/Resources/Private/Language/locallang_db.xlf:tx_jsgreetingcards_domain_model_greetingswishes.sender_ip',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'user_agent' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_greetingcards/Resources/Private/Language/locallang_db.xlf:tx_jsgreetingcards_domain_model_greetingswishes.user_agent',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'marketing_referer_domain' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_greetingcards/Resources/Private/Language/locallang_db.xlf:tx_jsgreetingcards_domain_model_greetingswishes.marketing_referer_domain',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'marketing_referer' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_greetingcards/Resources/Private/Language/locallang_db.xlf:tx_jsgreetingcards_domain_model_greetingswishes.marketing_referer',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'page' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_greetingcards/Resources/Private/Language/locallang_db.xlf:tx_jsgreetingcards_domain_model_greetingswishes.page',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'marketing_mobile_device' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_greetingcards/Resources/Private/Language/locallang_db.xlf:tx_jsgreetingcards_domain_model_greetingswishes.marketing_mobile_device',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'marketing_frontend_language' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_greetingcards/Resources/Private/Language/locallang_db.xlf:tx_jsgreetingcards_domain_model_greetingswishes.marketing_frontend_language',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'marketing_browser_language' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_greetingcards/Resources/Private/Language/locallang_db.xlf:tx_jsgreetingcards_domain_model_greetingswishes.marketing_browser_language',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'card' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_greetingcards/Resources/Private/Language/locallang_db.xlf:tx_jsgreetingcards_domain_model_greetingswishes.card',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_jsgreetingcards_domain_model_greetingcards',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		
	),
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder



$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['types'] = array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, header, name, patient_name, room, description, card, generated_pdf , --div--;Extended, admin_name, admin_email, mail_subject, creation_date, sender_ip, user_agent , --div--;Marketing, marketing_referer_domain, marketing_referer, page, marketing_mobile_device, marketing_frontend_language, marketing_browser_language , --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
);


$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['admin_email']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['admin_name']['config']['readOnly'] = 1;

$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['mail_subject']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['mail_subject']['config']['cols'] = 30;
$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['mail_subject']['config']['rows'] = 5;

$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['creation_date']['config']['readOnly'] = 1;

$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['sender_ip']['config']['readOnly'] = 1;

$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['user_agent']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['user_agent']['config']['cols'] = 30;
$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['user_agent']['config']['rows'] = 5;

$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['marketing_referer_domain']['config']['readOnly'] = 1;

$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['marketing_referer']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['marketing_referer']['config']['cols'] = 30;
$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['marketing_referer']['config']['rows'] = 5;

$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['page']['config']['type'] = 'select';
$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['page']['config']['foreign_table'] = 'pages';
$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['page']['config']['minitems'] = 0;
$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['page']['config']['maxitems'] = 1;
$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['page']['config']['size'] = 1;
$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['page']['config']['readOnly'] = 1;

$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['marketing_mobile_device']['config']['readOnly'] = 1;

$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['marketing_frontend_language']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['marketing_frontend_language']['config']['size'] = 2;

$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['marketing_browser_language']['config']['readOnly'] = 1;

$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['card']['config']['items'] = array (array('',0));

$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['generated_pdf']['config']['type'] = 'group';
$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['generated_pdf']['config']['internal_type'] = 'file';
$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['generated_pdf']['config']['allowed'] = 'pdf';
$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['generated_pdf']['config']['uploadfolder'] = 'fileadmin/user_upload/tx_greetingcards/';
$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['generated_pdf']['config']['show_thumbs'] = '1';
$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['generated_pdf']['config']['size'] = '1';
$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['generated_pdf']['config']['minitems'] = '0';
$GLOBALS['TCA']['tx_jsgreetingcards_domain_model_greetingswishes']['columns']['generated_pdf']['config']['maxitems'] = '1';