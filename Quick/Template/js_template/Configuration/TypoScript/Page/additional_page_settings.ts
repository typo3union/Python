page {
  meta {
    author = 
    keywords.override.field = keywords
    description.override.field = description
    author.override.field = author
    robots = index,follow
    msapplication-square70x70logo = EXT:js_template/Resources/Public/Images/tiny_70x70.png
    msapplication-square150x150logo = EXT:js_template/Resources/Public/Images/square_150x150.png
    msapplication-wide310x150logo = EXT:js_template/Resources/Public/Images/wide_310x150.png
    msapplication-square310x310logo = EXT:js_template/Resources/Public/Images/large_310x310.png
  }
  shortcutIcon = EXT:js_template/Resources/Public/Images/favicon.ico
  headerData {
    // Seitentitel setzen
    5 = TEXT
    5 {
      field = subtitle // title
      wrap = <title>|</title>
    }
    12 = TEXT
    12 {
      value = <meta name=”robots” content=”noindex” />
      if.isTrue.data = page:no_search
    }
  }  
}

page.includeCSS {
  bootstrapcss      = EXT:js_template/Resources/Public/CSS/bootstrap.css
  maincss           = EXT:js_template/Resources/Public/CSS/main.css
  fontawesomecss    = EXT:js_template/Resources/Public/CSS/font-awesome.min.css
}

# Including Layerslider
page.includeCSS {
  layerslider = EXT:js_template/Resources/Public/CSS/layerslider/layerslider.css  
  layersliderdemo = EXT:js_template/Resources/Public/CSS/layerslider/layersliderdemo.css  
}
page.includeJSFooter {
  greensock = EXT:js_template/Resources/Public/JavaScript/layerslider/greensock.js
  layerslidertransistions = EXT:js_template/Resources/Public/JavaScript/layerslider/layerslider.transitions.js
  kreaturmedia = EXT:js_template/Resources/Public/JavaScript/layerslider/layerslider.kreaturamedia.jquery.js
}

// Custom client Stylesheet
page.includeCSS.client = EXT:js_template/Resources/Public/CSS/style.css

// Including Standard Javascript libraries
page.includeJSFooter.client = EXT:ws_t3bootstrap/Resources/Public/JavaScript/layerslider/client.js

// Home Link auf dem Logo
lib.logolink  = TEXT
lib.logolink {
 value = <img class="img-responsive" alt="" src="EXT:js_template/Resources/Public/Images/logo.png">
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


