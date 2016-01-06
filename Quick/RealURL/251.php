<?php

$GLOBALS['TYPO3_CONF_VARS']['SYS']['curlUse'] = true;

$TYPO3_CONF_VARS['EXTCONF']['realurl_404_multilingual'] = array(
    '_DEFAULT' => array(
        'errorPage' => '404/',
    ),
);



$TYPO3_CONF_VARS['FE']['addRootLineFields'] .= ',tx_realurl_pathsegment';
$TYPO3_CONF_VARS['EXTCONF']['realurl'] = array(
    '_DEFAULT' => array(
        'init' => array(
            'enableCHashCache' => 1,
            'appendMissingSlash' => 'ifNotFile',
            'enableUrlDecodeCache' => 1,
            'enableUrlEncodeCache' => 1,
            'postVarSet_failureMode' => ''
        ),
        'redirects' => array(),
        'preVars' => array(
            array(
                'GETvar' => 'no_cache',
                'valueMap' => array(
                    'nc' => 1
                ),
                'noMatch' => 'bypass'
            ),
            array(
                'GETvar' => 'L',
                'valueMap' => array(
                    'de' => '0',
                    'en' => '1',
                    'fr' => '2'
                ),
                'valueDefault' => 'de',
                'noMatch' => 'bypass'
            ),
        ),
        'pagePath' => array(
            'type' => 'user',
            'userFunc' => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
            'spaceCharacter' => '-',
            'languageGetVar' => 'L',
            'expireDays' => 7,
            'rootpage_id' => 1,
            'firstHitPathCache' => 1
        ),
        
        'fixedPostVars' => array(),
        
        'postVarSets' => array(
            '_DEFAULT' => array(
                
               'archive' => array(
                array(
                    'GETvar' => 'tx_ttnews[year]'
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
                        'december' => '12'
                    )
                )
            ), 

            // news pagebrowser
            'browse' => array(
                array(
                    'GETvar' => 'tx_ttnews[pointer]'
                )
            ),
            // news categories
            'select_category' => array(
                array(
                    'GETvar' => 'tx_ttnews[cat]'
                )
            ),
            // news articles and searchwords
            'article' => array(
                array(
                    'GETvar' => 'tx_ttnews[tt_news]',
                    'lookUpTable' => array(
                        'table' => 'tt_news',
                        'id_field' => 'uid',
                        'alias_field' => 'title',
                        'addWhereClause' => ' AND NOT deleted',
                        'useUniqueCache' => 1,
                        'useUniqueCache_conf' => array(
                            'strtolower' => 1,
                            'spaceCharacter' => '-'
                        )
                    )
                ),
                array(
                    'GETvar' => 'tx_ttnews[swords]'
                )
            ),
            
            // projects
            'prj' => array(
                array(
                    'GETvar' => 'prid',
                    'lookUpTable' => array(
                        'table' => 'tx_project_domain_model_project',
                        'id_field' => 'uid',
                        'alias_field' => 'name',
                        'addWhereClause' => ' AND NOT deleted',
                        'useUniqueCache' => 1,
                        'useUniqueCache_conf' => array(
                            'strtolower' => 1,
                            'spaceCharacter' => '-'
                        ),
                        'autoUpdate' => 1,
                        'expireDays' => 180
                    )
                )
                // 'noMatch' => 'bypass'
                
            ),

            // newss
            'blg' => array(
                array(
                    'GETvar' => 'blgid',
                    'lookUpTable' => array(
                        'table' => 'tx_blog_domain_model_post',
                        'id_field' => 'uid',
                        'alias_field' => 'post_title',
                        'addWhereClause' => ' AND NOT deleted',
                        'useUniqueCache' => 1,
                        'useUniqueCache_conf' => array(
                            'strtolower' => 1,
                            'spaceCharacter' => '-'
                        ),
                        'autoUpdate' => 1,
                        'expireDays' => 180
                    )
                )
                // 'noMatch' => 'bypass'
                
            ),
            'action' => array(
                array(
                    'GETvar' => 'tx_news_pi1[action]',
                    'noMatch' => 'bypass'
                )
                
            ),
            'act' => array(
                array(
                    'GETvar' => 'tx_product_product[action]',  
                    'noMatch' => 'bypass'                  
                )
            
            ),
            'controller' => array(
                array(
                    'GETvar' => 'tx_news_pi1[controller]',
                    'noMatch' => 'bypass'
                )
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
                        'expireDays' => 180
                    )
                )
                // 'noMatch' => 'bypass'
                
            ),

            'cid' => array(
               
                array(
                    'GETvar' => 'tx_product_product[category]',
            
                )
            ),
            'category' => array(
                array(
                    'GETvar' => 'tx_product_product[cat]',
                    //'noMatch' => 'bypass'
                )
            ),
            'product' => array(
                array(
                    'GETvar' => 'tx_product_product[product]',
                )
            ),
            'page' => array(
                array(
                   'GETvar' => 'tx_news_pi1[@widget_0][currentPage]',                   
                )
            ),

          // Product Extension
               'product' => array(
                   array(
                            'GETvar' => 'tx_product_product[controller]' ,
                            'noMatch' => 'bypass',
                    ),                    
                    array(
                    'GETvar' => 'tx_product_product[uid]',
                    'lookUpTable' => array(
                        'table' => 'tx_product_domain_model_category',
                        'id_field' => 'uid',
                        'alias_field' => 'header',
                        'addWhereClause' => ' AND NOT deleted',
                        'useUniqueCache' => 1,
                        'useUniqueCache_conf' => array(
                            'strtolower' => 1,
                            'spaceCharacter' => '-',
                        ),
                        'languageGetVar' => 'L',
                        'languageExceptionUids' => '',
                        'languageField' => 'sys_language_uid',
                        'transOrigPointerField' => 'l10n_parent',
                        'autoUpdate' => 1,
                        'expireDays' => 180,
                    ),
                ),
               ),   
            
        )
        
    ),
        // configure filenames for different pagetypes
        'fileName' => array(
            'defaultToHTMLsuffixOnPrev' => 0,
            'index' => array(
                'print.html' => array(
                    'keyValues' => array(
                        'type' => 98
                    )
                ),
                'rss.xml' => array(
                    'keyValues' => array(
                        'type' => 100
                    )
                ),
                'rss091.xml' => array(
                    'keyValues' => array(
                        'type' => 101
                    )
                ),
                'rdf.xml' => array(
                    'keyValues' => array(
                        'type' => 102
                    )
                ),
                'atom.xml' => array(
                    'keyValues' => array(
                        'type' => 103
                    )
                )
            )
        )
    )
);
?>