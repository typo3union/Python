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
	spamProtectEmailAddresses = -2
	spamProtectEmailAddresses_atSubst = (at)<script type="text/javascript"> obscureAddMid() </script>
	spamProtectEmailAddresses_lastDotSubst = .<script type="text/javascript"> obscureAddEnd() </script>
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

