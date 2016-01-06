page {
  meta {
    author = 
    keywords.override.field = keywords
    description.override.field = description
    abstract.override.field = abstract
    author.override.field = author    
    robots = index,follow
    viewport = width=device-width, initial-scale=1.0
    msapplication-square70x70logo = EXT:demotemplate/Resources/Public/Images/tiny_70x70.png
    msapplication-square150x150logo = EXT:demotemplate/Resources/Public/Images/square_150x150.png
    msapplication-wide310x150logo = EXT:demotemplate/Resources/Public/Images/wide_310x150.png
    msapplication-square310x310logo = EXT:demotemplate/Resources/Public/Images/large_310x310.png
  }
  shortcutIcon = EXT:demotemplate/Resources/Public/Images/favicon.ico
  headerData {
    // Seitentitel setzen
    //5 = TEXT
    //5 {
      //field = subtitle // title
      // = <title>|</title>
    //}
    12 = TEXT
    12 {
      value = <meta name=”robots” content=”noindex” />
      if.isTrue.data = page:no_search
    } 
  }  
}

tt_content.stdWrap.innerWrap.cObject {
	100 = TEXT
	100.value = <div class="crop-image">|</div>
	200 = TEXT
	200.value = <div class="set-images">|</div>
}

# Including Layerslider
page.includeCSS {
  layerslider = EXT:demotemplate/Resources/Public/CSS/layerslider/layerslider.css  
  layersliderdemo = EXT:demotemplate/Resources/Public/CSS/layerslider/layersliderdemo.css
  bootstrapcss = EXT:demotemplate/Resources/Public/CSS/bootstrap.min.css
  bootstrapthemecss = EXT:demotemplate/Resources/Public/CSS/bootstrap-theme.min.css
  fontawesomecss = EXT:demotemplate/Resources/Public/CSS/font-awesome.css
  fontawesomeie7css = EXT:demotemplate/Resources/Public/CSS/font-awesome-ie7.css
}

page.includeJSFooter {
  greensock = EXT:demotemplate/Resources/Public/JavaScript/layerslider/greensock.js
  layerslidertransistions = EXT:demotemplate/Resources/Public/JavaScript/layerslider/layerslider.transitions.js
  kreaturmedia = EXT:demotemplate/Resources/Public/JavaScript/layerslider/layerslider.kreaturamedia.jquery.js
  fontsize = EXT:demotemplate/Resources/Public/JavaScript/fontsize/jquery.jfontsize-1.0.min.js
}

// Custom client Stylesheet
page.includeCSS.client = EXT:demotemplate/Resources/Public/CSS/style.css
page.includeCSS.custom = EXT:demotemplate/Resources/Public/CSS/custom.css



// Including Standard Javascript libraries
page.includeJSFooter.client = EXT:demotemplate/Resources/Public/JavaScript/client.js
page.includeJSFooter.resizecrop = EXT:demotemplate/Resources/Public/JavaScript/jquery.resizecrop.js



[globalVar = TSFE:id = 1]
page.includeJSFooter.custom = EXT:demotemplate/Resources/Public/JavaScript/custom.js
[global]


// Home Link auf dem Logo
lib.logolink  = TEXT
lib.logolink {
 value = <img class="img-responsive" alt="" src="EXT:demotemplate/Resources/Public/Images/logo.png">
 typolink.parameter = 1
 typolink.title = Logo
}

// Telephone Number at the Top
lib.top_telephone_no = TEXT
lib.top_telephone_no {
  wrap = <a href="tel:"><span><i class="fa fa-phone"></i></span>TELEPHONE</a>
}

// Email in the top
lib.top_email = TEXT
lib.top_email {
  wrap = <a href="mailto:"><span><i class="fa fa-envelope"></i></span>EMAIL ADDRESS</a>
}

lib.copyright = TEXT
lib.copyright {
  data = date: Y
  wrap = &copy;&nbsp;|&nbsp;by TOP RANKING GmbH
}

// Headerpicture from Ressources Tab
lib.bannerpicture = IMAGE
lib.bannerpicture {
  file {
    import.data = levelmedia:-1, slide
    treatIdAsReference = 1
    import.listNum = 0
    width= 960c
    height= 350c
  }
  params = class="img-responsive"
}
// Home Link Calender Logo
lib.calenderlink  = TEXT
lib.calenderlink {
 value = <img class="img-responsive" alt="Terminkalender" src="fileadmin/images/navigation/calender.png">
 typolink.parameter = 105
 typolink.title = Terminkalender
}

// A- Icon at the top
lib.a_minus = TEXT
lib.a_minus {
  wrap = <a id="jfontsize-minus" title="Schrift verkleinern" class="jfontsize-button size-one" style="cursor: pointer;">A<sup>-</sup></a>
}

// A+ Icon at the top
lib.a_plus = TEXT
lib.a_plus {
  wrap = <a id="jfontsize-plus" title="Schrift vergrößern" class="jfontsize-button size-two" style="cursor: pointer;">A<sup>+</sup></a>
}

lib.menutitle = TEXT
lib.menutitle {
  data = leveltitle:1
}
lib.sumenutitle = TEXT
lib.sumenutitle {
  data = leveltitle:2
}

lib.eventLocationMenu = CONTENT
lib.eventLocationMenu.table =  tt_content
lib.eventLocationMenu.select.pidInList = 132
lib.eventLocationMenu.select.uidInList = 113