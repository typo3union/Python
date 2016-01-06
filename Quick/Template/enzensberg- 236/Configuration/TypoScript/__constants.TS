###
# ALL CONSTANT
#
# Define whole website's Contatnt like menu, extension, config etc.,
###

config {
	# cat=config; type=string; label= Site Logo file[png]
	Logo = 
	
	# cat=config; type=string; label= Copyright text
	copyRightText =
	
	# cat=config; type=boolean; label=Admin Panel: Turn on admin panel (mainly for testing purposes only)
	adminPanel = 0
	
	# cat=config; type=boolean; label=Debugging: Turn on debugging (testing purposes only)
	debug = 0  
	
	# cat=config; type=string; label=Absolute URI prefix: (use "/" if running on top level; use empty value to use relative URI)
	absRefPrefix =

	# cat=config; type=string; label= Main Navigation Page ID : 
	mainMenu.Pid = 7

	# cat=config; type=string; label= Footer Contact pid : 
	footerContact.Pid = 40
	
	# cat=config; type=string; label= Footer Contact uid :
	footerContact.Uid = 10
	
	# cat=config; type=string; label= Footer Map pid : 
	footerMap.Pid = 40
	
	# cat=config; type=string; label= Footer Map uid :
	footerMap.Uid = 32
}

config{

	# cat=domain; type=string; label=Domain name for Base URL: (excluding slashes and protocol like http://)
	baseURL = pr236.in-entwicklung.info

	# cat=domain; type=boolean; label=Real URL : Turn on realURL
	realURL = 0
}

search {

	# cat=search; type=string; label= Header : Stichwortsuche : 
	title		= Stichwortsuche
	
	# cat=search; type=string; label= Placeholder : Geben Sie den Suchbegriff ein
	placeholder	= Geben Sie den Suchbegriff ein

	# cat=search; type=string; label= Submit Button : Suchen
	submit		= Suchen
}

share {

	# cat=share; type=string; label= Share URL : Facebook :
	url.facebook =	https://www.facebook.com/fachklinik.enzensberg

	# cat=share; type=string; label= Share URL : Youtube :
	url.youtube	 =	https://www.youtube.com/user/enzensberg

	# cat=share; type=string; label= Share URL : Pinterest :
	url.pinterest =	https://www.pinterest.com

}


filepaths{

	# cat=FLUIDPAGES/settings; type=text; label=Pfad zu den Templates
	defaultTemplateRootPath = typo3conf/ext/enzensberg/	

	# cat=FLUIDPAGES/settings; type=string; label=CSS: Location of the Cascading Style Sheets relative to site
	css = typo3conf/ext/enzensberg/Resources/Public/css/

	# cat=FLUIDPAGES/settings; type=string; label=Images: Location of the images relative to site
	images = typo3conf/ext/enzensberg/Resources/Public/images/

	# cat=FLUIDPAGES/settings; type=string; label=JS: Location of the Javascript files relative to site
	js = typo3conf/ext/enzensberg/Resources/Public/js/

	# cat=FLUIDPAGES/settings; type=string; label= Default TypoScript
	defaultTypoScript = typo3conf/ext/enzensberg/Configuration/TypoScript/

	# cat=FLUIDPAGES/settings; type=string; label= Extension TypoScript
	extensionsTypoScript = enzensberg/Configuration/TypoScript/Extensions/

	# cat=FLUIDPAGES/settings; type=string; label= Extension Template View Path
	extensionsView = typo3conf/ext/enzensberg/Resources/Private/Templates/Extensions/
	
	# cat=FLUIDPAGES/settings; type=string; label= Extension Template CSS Path
	extensionsCss = typo3conf/ext/enzensberg/Resources/Public/Extensions/

	# cat=FLUIDPAGES/settings; type=string; label= Private folder path
	private =  typo3conf/ext/enzensberg/Resources/Private/

	# cat=FLUIDPAGES/settings; type=string; label= Public folder path
	public =  typo3conf/ext/enzensberg/Resources/Public/
}

# cat=FLUIDPAGES/settings; type=text; label=Label FCE Reiter
fceLabel = Specific content items

# cat=FLUIDPAGES/settings; type=boolean; label=Allow pages which have is_siteroot = 1 to inherit chosen template from parent. Disable this to prevent subsites in multisite environment from using the same template as the immediate parent of that site root.
plugin.tx_fluidpages.siteRootInheritance = 1

# This defines the maximum width of images inserted in content records of type Images or Text-with-images.
# There are seperate settings for images floated next to text (..InText)
styles.content {
  imgtext {
    maxW = 1000
    maxWInText = 1000
    borderThick = 1
    linkWrap.newWindow = 1
  }
  uploads {
    jumpurl_secure = 1
    jumpurl_secure_mimeTypes = pdf=application/pdf, doc=application/msword
    jumpurl = 1
  }
  imgtext.linkWrap.lightboxEnabled = 1
  imgtext.captionSplit = 1

}


plugin.feadmin.dmailsubscription.color1 = #CCCCCC
plugin.feadmin.dmailsubscription.pid = 
plugin.feadmin.dmailsubscription.file.templateFile = typo3conf/ext/direct_mail_subscription/pi/fe_admin_dmailsubscrip.tmpl
#plugin.feadmin.dmailsubscription.file.templateFile = fileadmin/template/news_subscribeDE.tmpl
plugin.feadmin.dmailsubscription.evalErrors.email.uniqueLocal = Offenbar sind Sie bereits mit dieser E-Mail-Adresse registriert!
plugin.feadmin.dmailsubscription.emailName = 
plugin.feadmin.dmailsubscription.email = 
plugin.feadmin.dmailsubscription = USER_INT
plugin.feadmin.dmailsubscription.setfixed {
approve._FIELDLIST = uid,pid
DELETE._FIELDLIST = uid,pid
}
plugin.feadmin.dmailsubscription {
userFunc = user_feAdmin->init
includeLibs = EXT:direct_mail_subscription/fe_adminLib.inc
}

plugin.feadmin.dmailsubscription {
        table = tt_address
        create.overrideValues.disable = 1
        create.overrideValues.module_sys_dmail_html = 1
        parseValues.module_sys_dmail_html = 1
        #template = EXT:mon_template/main_template/tmpl/fe_admin_dmailsubscrip.tmpl
}

[globalVar = GP:L = 1]

#plugin.feadmin.dmailsubscription.file.templateFile = fileadmin/template/news_subscribe.tmpl
plugin.feadmin.dmailsubscription.file.templateFile = typo3conf/ext/direct_mail_subscription/pi/fe_admin_dmailsubscrip_en.tmpl
plugin.feadmin.dmailsubscription.evalErrors.email.uniqueLocal = Apparently you’re already registered with this email address!

[global]
