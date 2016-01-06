<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_companymanagement_domain_model_statement'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_companymanagement_domain_model_statement']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, designation,description, image, statement_type, statement_position, company_id, state_id,state_prependtext',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name,designation,description;;;richtext:rte_transform[mode=ts_links], image, statement_type, statement_position, company_id, state_id,state_prependtext, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_companymanagement_domain_model_statement',
				'foreign_table_where' => 'AND tx_companymanagement_domain_model_statement.pid=###CURRENT_PID### AND tx_companymanagement_domain_model_statement.sys_language_uid IN (-1,0)',
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
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_statement.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'designation' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_statement.designation',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_statement.description',
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
		'image' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_statement.image',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'image',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'statement_type' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_statement.statement_type',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('--Select--', ),
					array('State', 0),
     				array('Company', 1),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
			
		),
		'statement_position' => array(
			'displayCond' => 'FIELD:statement_type:=:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_statement.statement_position',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('Center', 0),
					array('Left', 1),					
					array('Right', 2),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),		
		'company_id' => array(
			'displayCond' => 'FIELD:statement_type:=:1',
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_statement.company_id',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_companymanagement_domain_model_company',
				 'foreign_table_where' => ' AND tx_companymanagement_domain_model_company.sys_language_uid = ###REC_FIELD_sys_language_uid### ORDER BY tx_companymanagement_domain_model_company.name',
				  'allowed' => 'tx_companymanagement_domain_model_company',    
				'size' => 15,
				'autoSizeMax' => 30,
				'maxitems' => 1,
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
							'table' => 'tx_companymanagement_domain_model_company',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
					 'suggest' => array(    
          				  'type' => 'suggest',
						   'tx_companymanagement_domain_model_company' => array(
							'maxItemsInResultList' => 5,
							'pidList' => '18',
						),
        			 ),
				),
			),
		),		
		'state_id' => array(
			'displayCond' => 'FIELD:statement_type:=:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_statement.state_id',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_companymanagement_domain_model_state',
				'size' => 8,
				'autoSizeMax' => 30,
				'maxitems' => 1,
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
							'table' => 'tx_companymanagement_domain_model_state',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		
		'state_prependtext' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_statement.state_prependtext',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		
	),
);
