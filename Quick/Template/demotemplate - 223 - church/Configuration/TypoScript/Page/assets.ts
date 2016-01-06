
[globalString = LIT:{$jsBootstrap}=/.+/]
page.includeJSFooter {
  bootstrap = {$jsBootstrap}
}
[global]


[globalString = LIT:{$jsHtml5shim}=/.+/]
page.includeJS {
  html5shim = {$jsHtml5shim}
  html5shim {
    external = 1
    disableCompression = 1
    allWrap = <!--[if lt IE 9]>|<![endif]-->
  }

}
[global]

[globalString = LIT:{$jsModernizr}=/.+/]
page.includeJS {
  modernizr = {$jsModernizr}
}
[global]



[globalString = LIT:{$jquerycore}=/.+/]
page.includeJSFooterlibs {
  jquery = {$jquerycore}
  jquery.forceOnTop = 1
}
[global]

[globalString = LIT:{$jquerymigrate}=/.+/]
page.includeJSFooterlibs {
	jquery_migrate = {$jquerymigrate}
}
[global]


## other javascripts
page.includeJSFooter {
  main = {$plugin.tx_demotemplate.filepaths.javascript}main.js

  plugins = {$plugin.tx_demotemplate.filepaths.javascript}plugins.js

  #video = {$plugin.tx_demotemplate.filepaths.javascript}video.js
}



[globalString = LIT:{$jqueryui}=/.+/]
page.includeJSFooterlibs {
	jqueryui = {$jqueryui}
}
page.includeCSS {
	jqueryui = {$plugin.tx_demotemplate.filepaths.css}jquery-ui/jquery-ui-1.10.3.custom.css
}
[global]


[globalString = LIT:{$respondjs}=/.+/]
page.includeJSlibs {
	respondjs = {$respondjs}
}
[global]


# CSS/LESS Dateien

page.includeCSS {

	bootstrap = {$plugin.tx_demotemplate.filepaths.less}bootstrap.less
	bootstrap.outputdir = {$plugin.tx_demotemplate.filepaths.css}

	font-awesome = {$plugin.tx_demotemplate.filepaths.less}fontawesome/font-awesome.less
	font-awesome.outputdir = {$plugin.tx_demotemplate.filepaths.css}

}


# Video JS

page.headerData.70 = TEXT 
page.headerData.70.value (

<script>
videojs.options.flash.swf = "{$plugin.tx_demotemplate.filepaths.javascript}video-js/video-js.swf"
</script>
)


page.includeJS {
	video-js = {$plugin.tx_demotemplate.filepaths.javascript}video-js/video.js
	mail = {$plugin.tx_demotemplate.filepaths.javascript}mail.js
}
