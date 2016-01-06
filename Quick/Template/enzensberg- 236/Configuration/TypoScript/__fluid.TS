###
# TEMPLATE: root_page
# DESCRIPTION: The PAGE ROOT template. This template will be called by the GLOBAL MASTER ROOT template. It reads the templates for the page, like page setup, config and header data. In this template record are only other template records included.
###

page = PAGE
page{
	typeNum = 0
	bodyTag >
	bodyTagCObject = COA
	bodyTagCObject {
		10 = TEXT
		10.value = <body>
	}
	
	5 >
	5 = USER
	5.userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
	5.extensionName = Fluidpages
	5.vendorName = FluidTYPO3
	5.pluginName = Page
	10 >
}

[GLOBAL]
lib.locallangPath = TEXT
lib.locallangPath.value = {$filepaths.private}Language/locallang.xlf 

lib.resPath = TEXT
lib.resPath.value = {$filepaths.public}


plugin.tx_fluidpages.collections.enzensberg {
    templateRootPath = {$filepaths.private}Templates/
    partialRootPath = {$filepaths.private}Partials/
    layoutRootPath = {$filepaths.private}Layouts/
}

plugin.tx_enzensberg.view {
	#label = {$fceLabel}
	extensionKey = enzensberg
	templateRootPath = {$filepaths.private}Templates/
	partialRootPath = {$filepaths.private}Partials/
	layoutRootPath = {$filepaths.private}Layouts/
}


[globalVar = TSFE:page|tx_fed_page_controller_action = enzensberg->Home]
page = PAGE
page{
	typeNum = 0
	bodyTag >
	bodyTagCObject = COA
	bodyTagCObject {
		10 = TEXT
		10.value = <body class="home" >
	}
}
[END]

[globalVar = TSFE:page|tx_fed_page_controller_action = enzensberg->InnerTemplate]
page = PAGE
page{
	typeNum = 0
	bodyTag >
	bodyTagCObject = COA
	bodyTagCObject {
		10 = TEXT
		10.value = <body class="inner" >
	}
}
[END]