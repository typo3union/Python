// breadcrum Menu

menu.breadcrumb = COA
menu.breadcrumb {
 
        wrap = <ol class="breadcrumb" itemprop="breadcrumb"><li><a href="">Home</a></li>|</ol>
 
    20 = HMENU
    20 {
        special = rootline
        special.range = 1|-1
 
        1 = TMENU
        1 {
            NO {
                allWrap = <li>|</li>
            }
 
            CUR = 1
            CUR {
                allWrap = <li class="active">|</li>
                doNotLinkIt = 1
            }
        }
    }
 
    # Add news title if on single view
    30 = RECORDS
    30 {
        if.isTrue.data = GP:tx_news_pi1|news
        dontCheckPid = 1
        tables = tx_news_domain_model_news
        source.data = GP:tx_news_pi1|news
        source.intval = 1
        conf.tx_news_domain_model_news = TEXT
        conf.tx_news_domain_model_news {
            field = title
            htmlSpecialChars = 1
            wrap =  <li class="active">|</li>
        } 
    }
    # Add news title if on single view
    40 = RECORDS
    40 {
        if.isTrue.data = GP:tx_events_events|uid
        dontCheckPid = 1
        tables = tx_events_domain_model_events
        source.data = GP:tx_events_events|uid
        source.intval = 1
        conf.tx_events_domain_model_events = TEXT
        conf.tx_events_domain_model_events {
            field = title
            htmlSpecialChars = 1
            wrap =  <li class="active">|</li>
        }
 
    }

}

----------------------------------------------------------------------------------------------------------------------------------------------------
// print object

\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($company);
----------------------------------------------------------------------------------------------------------------------------------------------------
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:fluxtemplate/Configuration/TypoScript/setup.txt">
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:fluxtemplate/Configuration/TypoScript/constants.txt">

<INCLUDE_TYPOSCRIPT: source="FILE: EXT:fluxtemplate/Configuration/TypoScript/page_resources.txt">
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:fluxtemplate/Configuration/TypoScript/user_tsconfig.txt">

-------------------------------------------------------------------------------------------------------------------------------
page_resources.txt
- For hide last tab - page configuration 


# For Not Displaying page Configuration tab
TCEFORM.pages.tx_fed_page_flexform {
       # You cannot edit the Page Configuration field now:
       disabled = 1
}
TCEFORM.pages.tx_fed_page_flexform_sub {
       # You cannot edit the Page Page Configuration - subpages field now:
       disabled = 1
}


------------------------------------------------------------------------------------------------------------------------------

// add colorpicker in FCE

<flux:field.input name="backgroundColor" default="#FFAA00">
  <flux:wizard.colorPicker hideParent="TRUE" />
</flux:field.input>

------------------------------------------------------------------------------------------------------------------------------


----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------