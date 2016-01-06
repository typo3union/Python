<?php
//$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']=unserialize('a:1:{s:8:"_DEFAULT";a:3:{s:4:"init";a:6:{s:16:"enableCHashCache";b:1;s:18:"appendMissingSlash";s:18:"ifNotFile,redirect";s:18:"adminJumpToBackend";b:1;s:20:"enableUrlDecodeCache";b:1;s:20:"enableUrlEncodeCache";b:1;s:19:"emptyUrlReturnValue";s:1:"/";}s:8:"pagePath";a:5:{s:4:"type";s:4:"user";s:8:"userFunc";s:68:"EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main";s:14:"spaceCharacter";s:1:"-";s:14:"languageGetVar";s:1:"L";s:11:"rootpage_id";s:1:"1";}s:8:"fileName";a:2:{s:25:"defaultToHTMLsuffixOnPrev";i:0;s:16:"acceptHTMLsuffix";i:1;}}}');


function user_encodeSpURL_postProc(&$params, &$ref) {
	$params['URL'] = str_replace('blog/post/article/', 'blog/post/', $params['URL']);
}
function user_decodeSpURL_preProc(&$params, &$ref) {
	$params['URL'] = str_replace('blog/post/', 'blog/post/article/', $params['URL']);
}

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'] = array (
	'encodeSpURL_postProc' => array('user_encodeSpURL_postProc'),
	'decodeSpURL_preProc' => array('user_decodeSpURL_preProc'),
    '_DEFAULT' => array (
        'init' => array (
            'enableCHashCache' => '1',
            'appendMissingSlash' => 'ifNotFile',
            'enableUrlDecodeCache' => '1',
            'enableUrlEncodeCache' => '1'
        ),
        'redirects' => array (
        ),
        'preVars' => array (
           array(
				'GETvar' => 'no_cache',
				'valueMap' => array(
					'nc' => 1,
				),
				'noMatch' => 'bypass',
			),
			array(
				'GETvar' => 'L',
				'valueMap' => array(
							'de' => '0',
							'en' => '1',
				),
				'noMatch' => 'bypass',
			),
			array(
				'GETvar' => 'cHash',
				'noMatch' => 'bypass',
			),
        ),
        'pagePath' => array (
            'type' => 'user',
            'userFunc' => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
            'spaceCharacter' => '-',
            'languageGetVar' => 'L',
            'rootpage_id' => '1'
        ),
        'fixedPostVars' => array(
			'newsDetailConfiguration' => array(
				array(
					'GETvar' => 'tx_news_pi1[news]',
					'lookUpTable' => array(
						'table' => 'tx_news_domain_model_news',
						'id_field' => 'uid',
						'alias_field' => 'title',
						'addWhereClause' => ' AND NOT deleted',
						'useUniqueCache' => 1,
						'useUniqueCache_conf' => array(
							'strtolower' => 1,
							'spaceCharacter' => '-'
						),
						'autoUpdate' => 1,
						'expireDays' => 180,
					),
				),
            ),
	        'newsCategoryConfiguration' => array(
                array(
                    'GETvar' => 'tx_news_pi1[overwriteDemand][categories]',
                    'lookUpTable' => array(
                        'table' => 'tx_news_domain_model_category',
                        'id_field' => 'uid',
                        'alias_field' => 'title',
                        'addWhereClause' => ' AND NOT deleted',
                        'useUniqueCache' => 1,
                        'useUniqueCache_conf' => array(
                            'strtolower' => 1,
                            'spaceCharacter' => '-'
                        )
                    )
                )
	        ),
	        'newsTagConfiguration' => array(
                array(
                    'GETvar' => 'tx_news_pi1[overwriteDemand][tags]',
                    'lookUpTable' => array(
                        'table' => 'tx_news_domain_model_tag',
                        'id_field' => 'uid',
                        'alias_field' => 'title',
                        'addWhereClause' => ' AND NOT deleted',
                        'useUniqueCache' => 1,
                        'useUniqueCache_conf' => array(
                            'strtolower' => 1,
                            'spaceCharacter' => '-'
                        )
                    )
                )
	        ),
	        '36' => 'newsDetailConfiguration',
	        '13' => 'newsCategoryConfiguration',
        ),
         'postVarSets' => array(
            '_DEFAULT' => array(
				'' => array(
					array(
                        'GETvar' => 'tx_property_property[id]',
						'lookUpTable' => array(
						'table' => 'pages',
						'id_field' => 'uid',
						'alias_field' => 'title',
						'addWhereClause' => ' AND NOT deleted',
						'useUniqueCache' => 1,
						'useUniqueCache_conf' => array(
							'strtolower' => 1,
							'spaceCharacter' => '-'
						),
						'autoUpdate' => 1,
						'expireDays' => 180,
					),
						//'noMatch' => 'bypass'
                    ),
					
				),
				'action' => array(
					array(
                        'GETvar' => 'tx_property_property[action]',
                        //'noMatch' => 'bypass'
                    ),
					array(
                        'GETvar' => 'tx_news_pi1[action]',
                        'noMatch' => 'bypass'
                    ),
									
				),
				'controller' => array(
                   
                    array(
                        'GETvar' => 'tx_news_pi1[controller]',
                        'noMatch' => 'bypass'
                    ),
					array(
                        'GETvar' => 'tx_property_property[controller]',
                        'noMatch' => 'bypass'
                    ),
                ),
				'single' => array(
					array(
                        'GETvar' => 'tx_property_property[uid]',
						'lookUpTable' => array(
						'table' => 'tx_property_domain_model_property',
						'id_field' => 'uid',
						'alias_field' => 'title',
						'addWhereClause' => ' AND NOT deleted',
						'useUniqueCache' => 1,
						'useUniqueCache_conf' => array(
							'strtolower' => 1,
							'spaceCharacter' => '-'
						),
						'autoUpdate' => 1,
						'expireDays' => 180,
					),
						//'noMatch' => 'bypass'
                    ),
				),
				
                'dateFilter' => array(
                    array(
                        'GETvar' => 'tx_news_pi1[overwriteDemand][year]',
                    ),
                    array(
                        'GETvar' => 'tx_news_pi1[overwriteDemand][month]',
                    ),
                ),
				
                'page' => array(
                    array(
                        'GETvar' => 'tx_news_pi1[@widget_0][currentPage]',
                    ),
                ),
				'search' => array(
                    array(
                        'GETvar' => 'search',
                    ),
                ),
				'news' => array(
					array(
						'GETvar' => 'tx_news_pi1[news]',
						'lookUpTable' => array(
							'table' => 'tx_news_domain_model_news',
							'id_field' => 'uid',
							'alias_field' => 'title',
							'addWhereClause' => ' AND NOT deleted',
							'useUniqueCache' => 1,
							'useUniqueCache_conf' => array(
								'strtolower' => 1,
								'spaceCharacter' => '-'
							),
							'autoUpdate' => 1,
							'expireDays' => 180,
						),
					),
				),
				'n_uid' => array(
					array(
						'GETvar' => 'n_uid',
						'lookUpTable' => array(
							'table' => 'tx_news_domain_model_news',
							'id_field' => 'uid',
							'alias_field' => 'title',
							'addWhereClause' => ' AND NOT deleted',
							'useUniqueCache' => 1,
							'useUniqueCache_conf' => array(
								'strtolower' => 1,
								'spaceCharacter' => '-'
							),
							'autoUpdate' => 1,
							'expireDays' => 180,
						),
					),
				),
				'act' => array(
                    array(
                        'GETvar' => 'tx_powermail_pi1[action]',
                        //'noMatch' => 'bypass'
                    ),
					array(
                        'GETvar' => 'tx_voucher_voucher[action]',
                       // 'noMatch' => 'bypass'
                    ),	
					
                ),
				'ctr' => array(                   
                    array(
                        'GETvar' => 'tx_powermail_pi1[controller]',
                        //'noMatch' => 'bypass'
                    ),
					array(
                        'GETvar' => 'tx_voucher_voucher[controller]',
                       // 'noMatch' => 'bypass'
                    ),
                ),
            ),
        ),
        'fileName' => array (
        	/*'defaultToHTMLsuffixOnPrev' => '.html',*/
        	'acceptHTMLsuffix' => 1,
            'index' => array (
                'rss.xml' => array (
                    'keyValues' => array (
                        'type' => '100'
                    ),
                ),
                'rss091.xml' => array (
                    'keyValues' => array (
                        'type' => '101'
                    ),
                ),
                'rdf.xml' => array (
                    'keyValues' => array (
                        'type' => '102'
                    ),
                ),
                'atom.xml' => array (
                    'keyValues' => array (
                        'type' => '103'
                    ),
                ),
				'sitemap.xml' => array (
                    'keyValues' => array (
                        'type' => '776'
                    ),
                ),				
            ),
        ),
    )
);