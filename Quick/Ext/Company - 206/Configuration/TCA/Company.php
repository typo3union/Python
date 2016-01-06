<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_companymanagement_domain_model_company'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_companymanagement_domain_model_company']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, display_mode,access_date,latest_date, name, logo,  slider_images,contact, address,  zip, city, telephone, fax, email, website, founded, employee, share, expert_notice, branch, gallery, video,youtube_video, award_date, award_type, state_id, company_profile , products_and_services,chronicle,award,title1,content1,title2,content2,title3,content3,title4,content4',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, display_mode,access_date,latest_date, name, logo,  slider_images,contact, address, zip, city, telephone, fax, email, website, founded, employee, share, expert_notice, branch, gallery, video,youtube_video, award_date, award_type, state_id, company_profile,products_and_services,chronicle,award,title1,content1,title2,content2,title3,content3,title4,content4, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_companymanagement_domain_model_company',
				'foreign_table_where' => 'AND tx_companymanagement_domain_model_company.pid=###CURRENT_PID### AND tx_companymanagement_domain_model_company.sys_language_uid IN (-1,0)',
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
		'display_mode' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.display_mode',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('Detail Link', 0),
					array('No Detail Link', 1),
					array('Preview', 2),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		
		'access_date' => array(
			'displayCond' => 'FIELD:display_mode:=:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.access_date',
			'config' => array(
				'type' => 'input',
				'size' => 7,
				'eval' => 'date',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'latest_date' => array(
			'displayCond' => 'FIELD:display_mode:=:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.latest_date',
			'config' => array(
				'type' => 'input',
				'size' => 7,
				'eval' => 'date',
				'checkbox' => 1,
				'default' => time()
			),
		),
		
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.name',
			'config' => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim'
			),
		),
		'logo' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.logo',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'logo',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'main_image' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.main_image',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'mainImage',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'slider_images' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.slider_images',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'sliderImages',
				array(
					'appearance' => array(
								'headerThumbnail' => array(
									'width' => '50',
									'height' => '50',
								),
							'createNewRelationLinkTitle' => 'Create new relation'
							),
					// custom configuration for displaying fields in the overlay/reference table
					// to use the imageoverlayPalette instead of the basicoverlayPalette
					'foreign_types' => array(
						'0' => array(
							'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
								--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => array(
							'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
								--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
							'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
								--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => array(
							'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
								--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => array(
							'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
								--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => array(
							'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
								--palette--;;filePalette'
						)
					),
				),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			)
		),
		
		'contact' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.contact',
			'config' => array(
				'type' => 'text',
				'cols' => 30,
				'rows' => 2,
				'eval' => 'trim'
			)
		),
		'address' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.address',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'location' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.location',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'zip' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.zip',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'place' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.place',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'city' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.city',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'telephone' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.telephone',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'fax' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.fax',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'email' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'website' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.website',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'founded' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.founded',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'employee' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.employee',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'share' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.share',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'expert_notice' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.expert_notice',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'branch' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.branch',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 3,
				'eval' => 'trim'
			)
		),
		'gallery' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.gallery',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'gallery',
				array(
					'appearance' => array(
								'headerThumbnail' => array(
									'width' => '50',
									'height' => '50',
								),
							'createNewRelationLinkTitle' => 'Create new relation'
							),
					// custom configuration for displaying fields in the overlay/reference table
					// to use the imageoverlayPalette instead of the basicoverlayPalette
					'foreign_types' => array(
						'0' => array(
							'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
								--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => array(
							'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
								--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
							'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
								--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => array(
							'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
								--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => array(
							'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
								--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => array(
							'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
								--palette--;;filePalette'
						)
					),
				),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			)
		),
		/*'video' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.video',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'video',
				array('maxitems' => 1),
				'*'
			),
		),*/
		'video' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.video',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'video',
				array('maxitems' => 1,'show_thumbs' => TRUE,'allowed' => 'webm,mp4,ogv,wav'),
				'webm,mp4,ogv,wav'
			),
		),
		
		'youtube_video' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.youtube_video',
			'config' => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim'
			),
		),
		
		'award_date' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.award_date',
			'config' => array(
				'type' => 'input',
				'size' => 7,
				'eval' => 'date',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'award_type' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.award_type',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('widerruflich', 0),
					array('unwiderruflich', 1),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		'state_id' => array(
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
		'company_profile' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.company_profile',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 6,
			),
			'defaultExtras' => 'richtext[*]:rte_transform[mode=ts_links]'
		),
		'products_and_services' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.products_and_services',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 6,
			),
			'defaultExtras' => 'richtext[*]:rte_transform[mode=ts_links]'
		),
		'chronicle' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.chronicle',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 6,
			),
			'defaultExtras' => 'richtext[*]:rte_transform[mode=ts_links]'
		),
		'award' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.award',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 6,
			),
			'defaultExtras' => 'richtext[*]:rte_transform[mode=ts_links]'
		),
		'content1' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.content1',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 6,
				'eval' => 'trim'
			),
			'defaultExtras' => 'richtext[*]:rte_transform[mode=ts_links]'
		),
		'content2' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.content2',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 6,
				'eval' => 'trim'
			),
			'defaultExtras' => 'richtext[*]:rte_transform[mode=ts_links]'
		),
		'content3' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.content3',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 6,
				'eval' => 'trim'
			),
			'defaultExtras' => 'richtext[*]:rte_transform[mode=ts_links]'
		),
		'content4' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.content4',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 6, 
				'eval' => 'trim'
			),
			'defaultExtras' => 'richtext[*]:rte_transform[mode=ts_links]'
		),
		'title1' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.title1',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'title2' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.title2',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'title3' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.title3',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'title4' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:company_management/Resources/Private/Language/locallang_db.xlf:tx_companymanagement_domain_model_company.title4',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
	),
);
