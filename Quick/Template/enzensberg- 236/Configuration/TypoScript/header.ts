page.headTag = <head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"><link rel="shortcut icon" type="image/x-icon" href="{$filepaths.images}favicon.ico">

page.includeCSS {
    
    bootstrap	= {$filepaths.css}bootstrap.min.css
    scrollnavi	= {$filepaths.css}scrollnavi.css
    main		= {$filepaths.css}main.css
    flexslider	= {$filepaths.css}flexslider.css
    responsive	= {$filepaths.css}responsive.css
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

#page.includeJSFooter {
page.includeJSFooterlibs {
    scroll_navi	= {$filepaths.js}scroll_navi.js
	flexslider	= {$filepaths.js}jquery.flexslider.js
	fontresize	= {$filepaths.js}fontresize.js
#	lightbox	= {$filepaths.js}jquery.lightbox.js
	tabs		= {$filepaths.js}easy-responsive-tabs.js
	superfish	= {$filepaths.js}superfish.js
	easyaspie	= {$filepaths.js}easyaspie.min.js
	common		= {$filepaths.js}common.js
}

[browser = msie] && [version < 9]
	page.includeJSFooter {
		html5shiv = https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js
		respond = https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js

		html5shiv.external = 1
		respond.external = 1
	}
[end]


page = PAGE
page.typeNum = 0
page {
	headerData.5 = TEXT
	headerData.5.value(

		<script type="text/javascript">
			 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

				  ga('create', 'UA-32674238-1', 'auto');
				  ga('send', 'pageview');

		</script>
	)
}
