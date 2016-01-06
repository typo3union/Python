<?php

function user_encodeSpURL_postProc(&$params, &$ref) {
    //  $params['URL'] = str_replace('kurs/Course/', 'kurs/', $params['URL']);
}

function user_decodeSpURL_preProc(&$params, &$ref) {
    // $params['URL'] = str_replace('kurs/', 'kurs/Course/', $params['URL']);
}

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'] = array(
    'encodeSpURL_postProc' => array('user_encodeSpURL_postProc'),
    'decodeSpURL_preProc' => array('user_decodeSpURL_preProc'),
    '_DEFAULT' => array(
        'init' => array(
            'enableCHashCache' => true,
            'appendMissingSlash' => 'ifNotFile',
            'adminJumpToBackend' => true,
            'enableUrlDecodeCache' => true,
            'enableUrlEncodeCache' => true,
            'emptyUrlReturnValue' => '/',
            'postVarSet_failureMode' => '',
        //'postVarSet_failureMode' => null,	  
        ),
        'pagePath' => array(// This will enable typo3 to make use of page titles in the URL. i.e. page ids are converted to readable page/sub-page/sub-sub-page.html or page/sub-page/sub-subpage/
            'type' => 'user',
            'userFunc' => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
            'spaceCharacter' => '-', // space characters will be replaced by the given character
            'languageGetVar' => 'L', // Defines which GET variable in the URL that defines language id
            'autoUpdatePathCache' => 1,
            'segTitleFieldList' => 'tx_realurl_pathsegment,alias,nav_title,title', // It refers to which field name of 'pages' table will be used in the url
            'rootpage_id' => '1', // root page id from where the links should be build up from
        ),
        'preVars' => array(
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
                    'en' => '1',
                ),
                'noMatch' => 'bypass',
            ),
        ),
        'fixedPostVars' => array(),
        'postVarSets' => array(
            '_DEFAULT' => array(
                // news articles and searchwords
                'news' => array(
                    array(
                        'GETvar' => 'user_news_pi2[news_id]',
                        'lookUpTable' => array(
                            'table' => 'user_news_news',
                            'id_field' => 'uid',
                            'alias_field' => 'news_title',
                            'addWhereClause' => ' AND NOT deleted',
                            'useUniqueCache' => 1,
                            'useUniqueCache_conf' => array(
                                'strtolower' => 1,
                                'spaceCharacter' => '-',
                            ),
                            'autoUpdate' => 1,
                        ),
                    ),
                ),
                'browse' => array(
                    array(
                        'GETvar' => 'page',
                    ),
                ),
                'kurs' => array(
                    array(
                        'GETvar' => 'tx_course_course[controller]',
                    ),
                    array(
                        'GETvar' => 'tx_course_course[action]',
                    ),
                    array(
                        'GETvar' => 'tx_course_course[course]',
                        'lookUpTable' => array(
                            'table' => 'tx_course_domain_model_course',
                            'id_field' => 'uid',
                            'alias_field' => 'name',
                            'addWhereClause' => ' AND deleted !=1 AND hidden !=1',
                            'useUniqueCache' => 1,
                            'useUniqueCache_conf' => array(
                                'strtolower' => 1,
                                'spaceCharacter' => '-',
                            )
                        )
                    ),
                ),
                'cat' => array(
                    array(
                        'GETvar' => 'category_id',
                        'lookUpTable' => array(
                            'table' => 'tx_course_domain_model_category',
                            'id_field' => 'uid',
                            'alias_field' => 'category',
                            'addWhereClause' => ' AND deleted !=1 AND hidden !=1',
                            'useUniqueCache' => 1,
                            'useUniqueCache_conf' => array(
                                'strtolower' => 1,
                                'spaceCharacter' => '-',
                            )
                        )
                    ),
                ),
                'cuid' => array(
                    array(
                        'GETvar' => 'tx_course_course[controller]',
                    ),
                    array(
                        'GETvar' => 'tx_course_course[action]',
                    ),
                    array(
                        'GETvar' => 'tx_course_course[cUid]',
                        'lookUpTable' => array(
                            'table' => 'tx_course_domain_model_datestartend',
                            'id_field' => 'uid',
                            'alias_field' => 'startdate',
                            'addWhereClause' => ' AND deleted !=1 AND hidden !=1',
                            'useUniqueCache' => 1,
                            'useUniqueCache_conf' => array(
                                'strtolower' => 1,
                                'spaceCharacter' => '-',
                            )
                        )
                    ),
                ),
                
                
                'action' => array(
                   
                     array(
                        'GETvar' => 'tx_newsletter_newsletter[action]',
                        'lookUpTable' => array(
                            'table' => 'tx_newsletter_domain_model_newsletter',
                            'id_field' => 'action',
                            'alias_field' => 'name',
                            'addWhereClause' => ' AND deleted !=1 AND hidden !=1',
                            'useUniqueCache' => 1,
                            'useUniqueCache_conf' => array(
                                'strtolower' => 1,
                                'spaceCharacter' => '-',
                            )
                        )
                    ),
                ),
                'controller' => array(
                   
                     array(
                        'GETvar' => 'tx_newsletter_newsletter[controller]',
                        'lookUpTable' => array(
                            'table' => 'tx_newsletter_domain_model_newsletter',
                            'id_field' => 'controller',
                            'alias_field' => 'name',
                            'addWhereClause' => ' AND deleted !=1 AND hidden !=1',
                            'useUniqueCache' => 1,
                            'useUniqueCache_conf' => array(
                                'strtolower' => 1,
                                'spaceCharacter' => '-',
                            )
                        )
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
            ),
        ),
        
        // configure filenames for different pagetypes
        'fileName' => array(
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
        // configure filenames for different pagetypes	
        'fileName' => array(
            'defaultToHTMLsuffixOnPrev' => '0', // 0 = URLS like directory structures (e.g. 'company/policy/'), '.cfm, .aspx, .html' = any extension if you want to simulate file name in the URL
            'acceptHTMLsuffix' => 1,
        ),
    ),
);
?>