<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_jsdownload_domain_model_file'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_jsdownload_domain_model_file']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, short_description, date, media, description, video, video_mp4, video_webm, video_ogg, no_of_download, category, file_type',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, short_description, date, media, description;;;richtext:rte_transform[mode=ts_links], video, video_mp4, video_webm, video_ogg, no_of_download, category, file_type, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_jsdownload_domain_model_file',
				'foreign_table_where' => 'AND tx_jsdownload_domain_model_file.pid=###CURRENT_PID### AND tx_jsdownload_domain_model_file.sys_language_uid IN (-1,0)',
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
			'label' => 'LLL:EXT:js_download/Resources/Private/Language/locallang_db.xlf:tx_jsdownload_domain_model_file.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'short_description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_download/Resources/Private/Language/locallang_db.xlf:tx_jsdownload_domain_model_file.short_description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'date' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_download/Resources/Private/Language/locallang_db.xlf:tx_jsdownload_domain_model_file.date',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'media' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_download/Resources/Private/Language/locallang_db.xlf:tx_jsdownload_domain_model_file.media',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'media',
				array('maxitems' => 1),
				'*'
			),
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_download/Resources/Private/Language/locallang_db.xlf:tx_jsdownload_domain_model_file.description',
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
		'video' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_download/Resources/Private/Language/locallang_db.xlf:tx_jsdownload_domain_model_file.video',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'video_mp4' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_download/Resources/Private/Language/locallang_db.xlf:tx_jsdownload_domain_model_file.video_mp4',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'videoMp4',
				array('maxitems' => 1),
				'*'
			),
		),
		'video_webm' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_download/Resources/Private/Language/locallang_db.xlf:tx_jsdownload_domain_model_file.video_webm',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'videoWebm',
				array('maxitems' => 1),
				'*'
			),
		),
		'video_ogg' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_download/Resources/Private/Language/locallang_db.xlf:tx_jsdownload_domain_model_file.video_ogg',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'videoOgg',
				array('maxitems' => 1),
				'*'
			),
		),
		'no_of_download' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_download/Resources/Private/Language/locallang_db.xlf:tx_jsdownload_domain_model_file.no_of_download',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		'category' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_download/Resources/Private/Language/locallang_db.xlf:tx_jsdownload_domain_model_file.category',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_jsdownload_domain_model_category',
				'MM' => 'tx_jsdownload_file_category_mm',
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
							'table' => 'tx_jsdownload_domain_model_category',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		'file_type' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_download/Resources/Private/Language/locallang_db.xlf:tx_jsdownload_domain_model_file.file_type',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_jsdownload_domain_model_filetype',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		
	),
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

$GLOBALS['TCA']['tx_jsdownload_domain_model_file']['interface']['showRecordFieldList'] =  'sys_language_uid, l10n_parent, l10n_diffsource, hidden, category, file_type, title, short_description, date, media, description, video, video_mp4, video_webm, video_ogg, no_of_download';
$GLOBALS['TCA']['tx_jsdownload_domain_model_file']['types']['1']['showitem'] = 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, date, short_description, --div--;Media, media, video, video_mp4, video_webm, video_ogg,--div--;Options, category, file_type,--div--;Download,  no_of_download, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime';
$GLOBALS['TCA']['tx_jsdownload_domain_model_file']['columns']['title']['config']['eval'] = 'trim,required';
$GLOBALS['TCA']['tx_jsdownload_domain_model_file']['columns']['no_of_download']['config']['size'] = 9;
$GLOBALS['TCA']['tx_jsdownload_domain_model_file']['columns']['no_of_download']['config']['readOnly'] = 1;

$GLOBALS['TCA']['tx_jsdownload_domain_model_file']['columns']['video']['onChange'] = 'reload';

$GLOBALS['TCA']['tx_jsdownload_domain_model_file']['columns']['media']['config'] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'media',
				array('maxitems' => 1),
				'gif,png,jpg,jpeg,eps,ai,svg,webm,mp4,mov,ogv,wav,mp3,pdf,html,css,js,flv,swf,txt,zip,tar,rar,doc,docx,xls,xlsx,ppt,pptx,tex,epub,csv,xml'
			);

$GLOBALS['TCA']['tx_jsdownload_domain_model_file']['columns']['video_mp4']['displayCond'] =  'FIELD:video:=:1';
$GLOBALS['TCA']['tx_jsdownload_domain_model_file']['columns']['video_webm']['displayCond'] =  'FIELD:video:=:1';
$GLOBALS['TCA']['tx_jsdownload_domain_model_file']['columns']['video_ogg']['displayCond'] =  'FIELD:video:=:1';

$GLOBALS['TCA']['tx_jsdownload_domain_model_file']['columns']['video_mp4']['config'] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'video_mp4',
				array('maxitems' => 1),
				'mp4'
			);

$GLOBALS['TCA']['tx_jsdownload_domain_model_file']['columns']['video_webm']['config'] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'video_webm',
				array('maxitems' => 1),
				'webm'
			);

$GLOBALS['TCA']['tx_jsdownload_domain_model_file']['columns']['video_ogg']['config'] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'video_ogg',
				array('maxitems' => 1),
				'ogg'
			);


$GLOBALS['TCA']['tx_jsdownload_domain_model_file']['ctrl']['requestUpdate'] = 'video';