<?php

$GLOBALS['TYPO3_CONF_VARS']['SYS']['curlUse'] = true;

$TYPO3_CONF_VARS['EXTCONF']['realurl_404_multilingual'] = array(
'_DEFAULT' => array(
'errorPage' => '404/',
),
);


$RootPID = array(
	'hotel-schwedi.de' => '1',
);

$TYPO3_CONF_VARS['EXTCONF']['realurl'] = array(
	'_DEFAULT' => array(
		'init' => array(
			'enableCHashCache' => 0,
			'appendMissingSlash' => 'ifNotFile',
			'enableUrlDecodeCache' => 1,
			'enableUrlEncodeCache' => 1,
		),
		'redirects' => array(),
		'preVars' => array(
			'0' => array (
                'GETvar' => 'no_cache',
                'valueMap' => array (
                    'nc' => '0'
                ),
                'noMatch' => 'bypass',
            ),
            '1' => array (
                'GETvar' => 'L',
                'valueMap' => array (
                    'de' => '0',
                    'en' => '1'
                ),
                'noMatch' => 'bypass'
            ),
			'2' => array (
                'GETvar' => 'cHash',
                'noMatch' => 'bypass',
            ),
		),
		'pagePath' => array(
			'type' => 'user',
			'userFunc' => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
			'spaceCharacter' => '-',
			'languageGetVar' => 'L',
			'expireDays' => 7,
###### include your rootpage id here
			'rootpage_id' => $RootPID[$_SERVER['HTTP_HOST']],
		),
		'fixedPostVars' => array(),
    'postVarSets' => array(
        '_DEFAULT' => array(
            // news archive parameters
            'archive' => array(
                array(
                    'GETvar' => 'tx_ttnews[year]',
                ),
                array(
                    'GETvar' => 'tx_ttnews[month]',
                    'valueMap' => array(
                        'january' => '01',
                        'february' => '02',
                        'march' => '03',
                        'april' => '04',
                        'may' => '05',
                        'june' => '06',
                        'july' => '07',
                        'august' => '08',
                        'september' => '09',
                        'october' => '10',
                        'november' => '11',
                        'december' => '12',
                    )
                ),
            ),
            // news pagebrowser
            'browse' => array(
                array(
                    'GETvar' => 'tx_ttnews[pointer]',
                ),
            ),
            // news categories
            'select_category' => array(
                array(
                    'GETvar' => 'tx_ttnews[cat]',
                ),
            ),
            // news articles and searchwords
            'article' => array(
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
                            'spaceCharacter' => '-',
                        ),
                    ),
                ),
                array(
                    'GETvar' => 'tx_ttnews[swords]',
                ),
            ),
        
            'action' => array(
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
            ),
            'act' => array(
                array(
                    'GETvar' => 'tx_powermail_pi1[action]',
                //'noMatch' => 'bypass'
                )
            ),
            'ctr' => array(
                array(
                    'GETvar' => 'tx_powermail_pi1[controller]',
                    //'noMatch' => 'bypass'
                )
            ),
			
			'a' => array(                   
				array(
					'GETvar' => 'tx_voucher_voucher[action]',
				    'noMatch' => 'bypass'
				),	
			),
			'c' => array(
				array(
					'GETvar' => 'tx_voucher_voucher[controller]',
				    'noMatch' => 'bypass'
				),
			),
			'l' => array(                   
				array(
					'GETvar' => 'logout',
				    'noMatch' => 'bypass'
				),	
			),
			
				
        ),
    ),
    'fileName' => array(
        'defaultToHTMLsuffixOnPrev' => 0,
        'index' => array(
            'rss.xml' => array(
                'keyValues' => array(
                    'type' => 100,
                ),
            ),
            'rss091.xml' => array(
                'keyValues' => array(
                    'type' => 101,
                ),
            ),
            'rdf.xml' => array(
                'keyValues' => array(
                    'type' => 102,
                ),
            ),
            'atom.xml' => array(
                'keyValues' => array(
                    'type' => 103,
                ),
            ),
        ),
    ),
            ),
);
