
config {

	htmlTag_setParams = dir="ltr" class="no-js" xml:lang="de" lang="de"

	doctype = html5

	admPanel    		= {$config.adminPanel}
	debug      			= {$config.debug}
	
	doctype = html5
	# to get MSIE working in "standardsmode"
	xmlprologue = none

	# Disable the border attribute in images
	disableImgBorderAttr = 1
	removeGenerator = 1
	disablePrefixComment = 1
	sourceopt.enabled = 1
	sourceopt.removeBlurScript = 1
	sourceopt.removeGenerator = 1	

	inlineStyle2TempFile = 1

	pageTitleFirst = 1

	tx_realurl_enable = {$config.realURL}

	simulateStaticDocuments = 0

	index_enable = 1
	index_externals = 1

	pageTitleFirst = 1

	no_cache = 0
	prefixLocalAnchors= cached
	sys_language_overlay = hideNonTranslated
	# sys_language_overlay = content_fallback
	
	# set the defaultcharset
	renderCharset = utf-8
	metaCharset = utf-8
	
	notification_email_charset = utf-8
	xhtml_cleaning = 1
	linkVars = L
	sys_language_uid = 0
	
	uniqueLinkVars = 1
	language           	= de
	locale_all         	= de_DE
	htmlTag_langKey    	= de
	htmlTag_dir = ltr
	
	# Spam protection
	spamProtectEmailAddresses = -3
	spamProtectEmailAddresses_atSubst = @
	spamProtectEmailAddresses_lastDotSubst = .

	/*
	concatenateJs = 1
	concatenateCss = 1

	compressJs = 1
	compressCss = 1
	*/
}

[browser = msie] && [version = 7]
	config {
		htmlTag_setParams = dir="ltr" class="no-js ie7 oldie" xml:lang="de" lang="de"
	}
[end]

[browser = msie] && [version = 8]
	config {
		htmlTag_setParams = dir="ltr" class="no-js ie8 oldie" xml:lang="de" lang="de"
	}
[end]


plugin.tx_news {
	settings {
		link {
			skipControllerAndAction = 1
		}
	}
}

#favicon
 page.shortcutIcon ={$filepaths.images}top.ico



plugin.tx_indexedsearch._DEFAULT_PI_VARS.lang = 0

# Remove default TYPO3 Stylesheet.
# plugin.tx_cssstyledcontent._CSS_DEFAULT_STYLE >

# Allow HTML tags in headers
lib.stdheader.10.setCurrent.htmlSpecialChars = 0

// Set baseURL setting for http or https
config.baseURL = http://{$config.baseURL}/
[globalString = IENV:TYPO3_SITE_URL=https://{$config.baseURL}/]
	config.baseURL = https://{$config.baseURL}/
[global]

// Condition to switch the doctype and xml prologue
[browser = msie]
	config.doctypeSwitch = 1
[global]



[globalVar = GP:L = 1]
	config {
		htmlTag_langKey = en
		sys_language_uid = 1
		language = en
		locale_all = en_US
	}
[global]


config.sourceopt {
	enabled = 1	
	enable_utf-8_support = 1	
	formatHtml = 2
	formatHtml {	
		tabSize =	
		debugComment = 0	
	}
}

page.meta {  
	description.field = description
	description.ifEmpty = 
	keywords.field = keywords
	keywords.ifEmpty =  
	abstract.field = abstract
	abstract.ifEmpty = 
}

tt_content.stdWrap.dataWrap >
#lib.parseFunc_RTE.nonTypoTagStdWrap.encapsLines >

tt_content.text.20.wrap = <div class="contentArea">|</div>

config {
    intTarget >
    extTarget = _blank
}