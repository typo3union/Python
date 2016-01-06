###
# TEMPLATE: root_systemConfiguration
# DESCRIPTION: The CONFIGURATION ROOT template. This template will be called by the MASTER ROOT template. It reads the templates for changes in tt_content, lib.stdHeader etc.
###



#
# EXT: lib.parseFunc_RTE
# DESC: The LIB.PARSEFUNC_RTE template. Content which is added by using the RTE is parsed before the output to the screen. In this template you will find some settings to influence this parsing process.

# remove class="bodytext" from paragraphs
lib.parseFunc_RTE {
	nonTypoTagStdWrap.encapsLines {
		addAttributes.P.class >
		addAttributes.P.class.setOnly >
	}
}


#
# EXT: tt_content
# DESC: The TT_CONTENT template. tt_content is responsible for the styling of the content objects, together with css_styled_content. In this template we made some changes to influence the styling.

# Remove targets
styles.content.links.extTarget =

tt_content {	
	# Make some modifications to the rendering of the standard MAIL form records
	#mailform.20 {
		#accessibility = 1
	#}
	
	# Remove the ancient onfocus="blurLink(this);" from sitemap links
	# Unfortunately this hasn't been fully implemented in css_styled_content yet
	# See also bug 11367
	menu.20 {
		default.1.noBlur = 1
		1.1.noBlur = 1
		4.1.noBlur = 1
		5.1.noBlur = 1
		6.1.noBlur = 1
		7.1.noBlur = 1
		7.2.noBlur = 1
	}

	# With this we can use - <link page-id> tag </link>
	html.parseFunc.tags.link < lib.parseFunc.tags.link
}

# replace strong in place of bold tag..
lib.parseFunc_RTE.tags{
  b=TEXT
  b{
    current=1
    wrap= <strong>|</strong>
  }
}

# For LightBox Settings to add rel=lightbox[lb15] to ancher<a> tag
tt_content.image.20.1.imageLinkWrap {
	JSwindow = 0
	directImageLink = 1
	typolink.ATagParams {
	dataWrap = rel="lightbox[lb{field:uid}]"
	if.negate = 1
	if.isTrue = TEXT
	}
	typolink.ATagParams.if.isTrue.field = image_link
	typolink.ATagParams.if.isTrue.listNum < .typolink.parameter.listNum
}

#tt_content.stdWrap.innerWrap.cObject = CASE
#tt_content.stdWrap.innerWrap.cObject {
#      key.field = section_frame
#      60 = TEXT
#      60.value = <div class="kontakt">|</div>    
#}


tt_content.stdWrap.innerWrap.cObject {
   50 = TEXT
   50 {
     value = <div class="facebook">|</div>
   }
   60 = TEXT
   60{
   	  value = <div class="homedetail clearfix">|</div>
   }
   70 = TEXT
   70{
   	  value = <div class="impressum clearfix">|</div>
   }
   80 = TEXT
   80{
   	  value = <div class="site-map clearfix">|</div>
   }
 }

#tt_content.stdWrap.innerWrap > 

### Customize header ###
lib.stdheader.10.10 < lib.stdheader.10.1
lib.stdheader.10.10 = TEXT
lib.stdheader.10.10 {
   stdWrap.field = header
   stdWrap.typolink.parameter.field = header_link
   stdWrap.typolink.ATagParams = class="cl_white"
   dataWrap = <div class="text-center blogtitle">&#124;&#124;&#124;&#124; <span>|</span> &#124;&#124;&#124;&#124;</div>
}

lib.stdheader.10.11 < lib.stdheader.10.1
lib.stdheader.10.11 = TEXT
lib.stdheader.10.11 {
   stdWrap.field = header
   dataWrap = <div class="page-header text-center"><h2>|</h2></div>
}
