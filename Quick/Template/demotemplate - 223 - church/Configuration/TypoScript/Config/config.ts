config {
	linkVars = L
	uniqueLinkVars = 1
	renderCharset = utf-8
	metaCharset = utf-8
	enableContentLengthHeader = 1
	sendCacheHeaders = 1
	doctype = {$docTypeToUse}
	# xmlprologue = none
	doctypeSwitch = {$doctypesw_cond}

	# language
	htmlTag_langKey = {$htmlTagLangKeyStandardLang}
	htmlTag_dir = {$htmlTagDirStandardLang}
	language = {$languageIsoCodeStandardLang}
	locale_all = {$languageLocaleStandardLang}

	sys_language_uid = {$standardLanguage}
	sys_language_mode = content_fallback
	sys_language_overlay = hideNonTranslated

	removeDefaultJS = external

	# cross domain linking
	typolinkEnableLinksAcrossDomains = 1

	sword_standAlone = 0
	sword_noMixedCase = 0
	intTarget = _self
	extTarget = _blank
	#spamProtectEmailAddresses = -2
	#spamProtectEmailAddresses_atSubst =<script type="text/javascript">obscureAddMid()</script>
	#spamProtectEmailAddresses_lastDotSubst =<script type="text/javascript">obscureAddEnd()</script>
	spamProtectEmailAddresses = 1
	spamProtectEmailAddresses_atSubst = <span style="display:none;">zollexpress</span><span class="makeSymbolNew" style="display:normal;"></span>
	spamProtectEmailAddresses_lastDotSubst = <span style="display:none;">zollexpress</span><span class="makePointNew" style="display:normal;"></span>
	
	noScaleUp = 1
	no_cache = 0
	additionalHeaders = Content-Type:text/html;charset=utf-8
	
	


	content_from_pid_allowOutsideDomain = 1
	pageTitleFirst = 1
	headerComment = {$headercomment}

	simulateStaticDocuments = 0
	admPanel = {$userAdmPanelOn}
	index_enable = {$userIndexingOn}
	index_externals = {$userIndexExternalsOn}
	index_metatags = {$userIndexMetaTagsOn}
	xhtml_cleaning = {$userXhtmlCleaning}
	disablePrefixComment = {$userDisablePrefComm}
}

# live mode
[globalVar = LIT:1 = {$liveMode}]
config {
	compressJs = 0
	concatenateJs = 0
	compressCss = 1
	concatenateCss = 1
	disablePrefixComment = 1
}
[global]

config.baseURL = {$protocol}://{$baseUrl}/

# If using simulateStaticDocuments
[globalVar = LIT:1 = {$simStatDocOn}]&&[globalVar = LIT:1 > {$realUrlOn}]&&[globalVar = LIT:1 > {$coolUriOn}]
config {
	simulateStaticDocuments = 1
	simulateStaticDocuments_addTitle = {$simStatDocAddTitle}
	simulateStaticDocuments_pEnc = {$simStatDocPenc}
	simulateStaticDocuments_pEnc_onlyP = {$simStatDocPencOnlyP}
}
[global]
# END If using simulateStaticDocuments
# If using realURL
[globalVar = LIT:1 = {$realUrlOn}]
config {
	tx_realurl_enable = 1
	prefixLocalAnchors = {$userPrefixLocalAnchors}
}
[global]
# END If using realURL

# If using cooluri
[globalVar = LIT:1 = {$coolUriOn}]
config {
	tx_cooluri_enable = 1
	redirectOldLinksToNew = 1
	prefixLocalAnchors = {$userPrefixLocalAnchors}
}
[global]
# END If using cooluri

##############################################
# Additional TypoScript by TOP RANKING begin #
##############################################

# Don't set Page Title - we set it in Page-Objekt to have control over it
noPageTitle = 0

# Inline Styles removed to a temp file
inlineStyle2TempFile = 1
meaningfulTempFilePrefix = 50



config.sourceopt {
    enabled = 1
    enable_utf-8_support = 1
    formatHtml = 2
}