# Powermail custom Typoscript
plugin.tx_powermail {
	# Powermail Custom Template Path
	
	view {
		# Path to template root (FE)
		templateRootPath = {$filepaths.extensionsView}Powermail/Private/Templates/
		
		# Path to template partials (FE)
		partialRootPath = {$filepaths.extensionsView}Powermail/Private/Partials/
		
		# Path to template layouts (FE)
		layoutRootPath = {$filepaths.extensionsView}Powermail/Private/Layouts/
	}
	settings{
		setup{
		cuur_id= 10
		}
	}
}

page.includeCSS.powermailCssDemo = {$filepaths.extensionsCss}Powermail/Public/Css/CssDemo.css
#page.includeCSS.powermailCssDemo = 


plugin.tx_wtcalculatingcaptcha {
        # constants
        number1.minmax =  1,5
        number2.minmax =  1,5
        number.notNegative =  1
}

plugin.tx_powermail.settings.setup.spamshield.indicator.honeypod = 0


plugin.tx_powermail.settings.setup { 
  prefill { 
    coursetitle < lib.test123
  } 
} 


plugin.tx_powermail.settings.setup.prefill {
     coursetitle= RECORDS
   coursetitle {
        stdWrap.if.isTrue.data = GP:tx_course_course|course
        dontCheckPid = 1
        tables = tx_course_domain_model_course
        source.data = GP:tx_course_course|course
        source.intval = 1
        conf.tx_course_domain_model_course= TEXT
        conf.tx_course_domain_model_course{
            field = name
            htmlSpecialChars = 1
        }
        wrap = |
    }
  courseprice= RECORDS
   courseprice {
        stdWrap.if.isTrue.data = GP:tx_course_course|course
        dontCheckPid = 1
        tables = tx_course_domain_model_course
        source.data = GP:tx_course_course|course
        source.intval = 1
        conf.tx_course_domain_model_course= TEXT
        conf.tx_course_domain_model_course{
            field = price
            htmlSpecialChars = 1
        }
        wrap = |
    }
  
  cursdate= RECORDS
   cursdate{
        stdWrap.if.isTrue.data = GP:tx_course_course|cUid
        dontCheckPid = 1
        tables = tx_course_domain_model_datestartend
        source.data = GP:tx_course_course|cUid
        source.intval = 1
        conf.tx_course_domain_model_datestartend= TEXT
        conf.tx_course_domain_model_datestartend{
            field = startdate 
            htmlSpecialChars = 1                 
         }
    
    #stdWrap.data = date : d.m.Y
        wrap = |
    }
	
	
	
  
  }
  


