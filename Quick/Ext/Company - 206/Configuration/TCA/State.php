<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_companymanagement_domain_model_state'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_companymanagement_domain_model_state']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name,detail_link, main_logo, small_logo,historical_logo, secondary_logo',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name,detail_link, main_logo, small_logo,historical_logo, secondary_logo,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_companymanagement_domain_model_state',
				'foreign_table_where' => 'AND tx_companymanagement_domain_model_state.pid=###CURRENT_PID### AND tx_companymanagement_domain_model_state.sys_language_uid IN (-1,0)',
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
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_state.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'main_logo' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_state.main_logo',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'mainLogo',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'small_logo' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_state.small_logo',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'smallLogo',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'secondary_logo' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_state.secondary_logo',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'secondaryLogo',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'historical_logo' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_state.historical_logo',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'historical_logo',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'detail_link' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_state.detail_link',
			'config' => array (
            'type'     => 'input',
            'size'     => '15',
            'max'      => '255',
            'checkbox' => '',
            'eval'     => 'trim',
            'wizards'  => array(
                '_PADDING' => 2,
                'link'     => array(
                    'type'         => 'popup',
                    'title'        => 'Link',
                    'icon'         => 'link_popup.gif',
                    'script'       => 'browse_links.php?mode=wizard',
                    'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
		   			'params'   => array(
							        'blindLinkOptions' => 'file,mail,folder'
       		    	)
                )
            )
		 )
       
	   ),	
		
	),
);
