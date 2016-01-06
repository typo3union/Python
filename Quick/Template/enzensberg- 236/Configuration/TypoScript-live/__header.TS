# EXT: page.headerData

# DESC: The PAGE HEADERDATA template. All config.headerData contents goes in here. This could be almost everything that belongs in the <head>, but does not have any configuration like page.config, page.includeCSS or page.includeJS or needs special configuration, like dynamic handling.

# <link href="http://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet" type="text/css" />



# Header Data Setup
page.headerData {
	10 = TEXT
	10.value (
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<!--[if IEMobile 7 ]> <html dir="ltr" lang="en-US"class="no-js iem7"> <![endif]-->
		<!--[if IE 7 ]><html dir="ltr" lang="en-US" class="no-js ie7 oldie"> <![endif]-->
		<!--[if IE 8 ]><html dir="ltr" lang="en-US" class="no-js ie8 oldie"> <![endif]-->
		<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html dir="ltr" lang="en-US" class="no-js"><!--<![endif]-->
		<link rel="shortcut icon" type="image/x-icon" href="{$filepaths.images}favicon.ico">
		<link href="{$filepaths.css}bootstrap.min.css" rel="stylesheet">
		<link href="{$filepaths.css}owl.carousel.css" rel="stylesheet">
		<link href="{$filepaths.css}scrollnavi.css" rel="stylesheet">
		<link href="{$filepaths.css}main.css" rel="stylesheet" type="text/css">
		<link href="{$filepaths.css}search.css" rel="stylesheet" type="text/css">
		<link href="{$filepaths.css}flexslider.css" rel="stylesheet" type="text/css">
		<link href="{$filepaths.css}responsive.css" rel="stylesheet" type="text/css">
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->		
	)

}

page.includeJSlibs {
   # file001 = {$filepaths.js}jquery.min.js
}


page.javascriptLibs {
	jQuery = 1
	jQuery.version = latest
	jQuery.source = local
	jQuery.noConflict = 1
#	jQuery.noConflict.namespace = ownNamespace
}

page.includeJSFooter {
    file002 = {$filepaths.js}scroll_navi.js
	file003 = {$filepaths.js}menu.js
	file004 = {$filepaths.js}owl.carousel.js
	file005 = {$filepaths.js}jquery.flexslider.js
	file006 = {$filepaths.js}fontresize.js
	file007 = {$filepaths.js}custom.js
#	file008 = {$filepaths.js}jquery.lightbox.js
	file009 = {$filepaths.js}general.js
#	file010 = {$filepaths.js}crop.js
	file011 = {$filepaths.js}easy-responsive-tabs.js
	file012 = {$filepaths.js}superfish.js
	file013 = {$filepaths.js}easyaspie.min.js
	file014 = {$filepaths.js}common.js
}