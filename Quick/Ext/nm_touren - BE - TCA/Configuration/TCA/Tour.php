<?php

if (!defined ('TYPO3_MODE')) {

	die ('Access denied.');

}



$GLOBALS['TCA']['tx_nmtouren_domain_model_tour'] = array(

	'ctrl' => $GLOBALS['TCA']['tx_nmtouren_domain_model_tour']['ctrl'],

	'interface' => array(

		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, addTermine, termine',

	),

	'types' => array(

		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, addTermine, termine, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),

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

				'foreign_table' => 'tx_nmtouren_domain_model_tour',

				'foreign_table_where' => 'AND tx_nmtouren_domain_model_tour.pid=###CURRENT_PID### AND tx_nmtouren_domain_model_tour.sys_language_uid IN (-1,0)',

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

			'label' => 'LLL:EXT:nm_touren/Resources/Private/Language/locallang_db.xlf:tx_nmtouren_domain_model_tour.name',

			'config' => array(

				'type' => 'input',

				'size' => 30,

				'eval' => 'trim'

			),

		),

		'termine' => array(

			'exclude' => 1,

			'label' => 'LLL:EXT:nm_touren/Resources/Private/Language/locallang_db.xlf:tx_nmtouren_domain_model_tour.termine',

			'config' => array(

				'type' => 'inline',

				'foreign_table' => 'tx_nmtouren_domain_model_termine',

				'foreign_field' => 'tour',
				
				'foreign_table_where' => 'ORDER BY tx_nmtouren_domain_model_termine.datum',

				'maxitems'      => 9999,

				'appearance' => array(

					'collapseAll' => 1,

					'levelLinksPosition' => 'top',

					'showSynchronizationLink' => 1,

					'showPossibleLocalizationRecords' => 1,

					'showAllLocalizationLink' => 1

				),

			),



		),

		

		'addTermine' => array(

			'exclude' => 1,

			'label' => 'LLL:EXT:nm_touren/Resources/Private/Language/locallang_db.xlf:tx_nmtouren_domain_model_tour.m_termine',

			'config' => array(

				'type' => 'user',

				'size' => '30',

                'userFunc' => 'TYPO3\\NmTouren\\Userfuncs\\TcaTour->addTour',

                'parameters' => array(
					'startDate'=> '01.04',
					'endDate' => '31.10',                     
                ),

			),



		),

		

	),

);

