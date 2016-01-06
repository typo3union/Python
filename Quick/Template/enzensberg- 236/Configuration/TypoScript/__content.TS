###
# TEMPLATE: root_blocks
# DESCRIPTION: The PAGE BLOCKS ROOT template. Lib (Blocks) templates contain TypoScript to generate the building blocks for your website, except menu's. In this template record are only other template records included.
###


# EXT: lib.right_content
# DESC: TypoScript template which compiles the contents for the right column on the pages

# Setup each colPos blocks.
lib.content0 < styles.content.get
lib.content0.select.where = colPos = 0
lib.content1 < styles.content.get
lib.content1.select.where = colPos = 1
lib.content2 < styles.content.get
lib.content2.select.where = colPos = 2
lib.content3 < styles.content.get
lib.content3.select.where = colPos = 3
lib.content4 < styles.content.get
lib.content4.select.where = colPos = 4
lib.content5 < styles.content.get
lib.content5.select.where = colPos = 5
lib.slider < styles.content.get
lib.slider.select.where = colPos = 6
lib.slider.slide = -1
lib.videoBanner< styles.content.get
lib.videoBanner.select.where = colPos = 7
#lib.videoBanner.slide = -1

lib.backgroundImage1< styles.content.get
lib.backgroundImage1.select.where = colPos = 10

lib.backgroundImage2< styles.content.get
lib.backgroundImage2.select.where = colPos = 11



# Get constant like LOGO, Copyright Text etc.,
lib.getConstant = TEXT
lib.getConstant.value = {$config.setConstant}

# Base URL
lib.baseURL = TEXT
lib.baseURL.value = {$config.domain}

# Current page 
lib.pagetitle = TEXT
lib.pagetitle.data = page : title


# Main Logo
lib.Logo = TEXT
lib.Logo.value = {$config.mainLogo}



# Copyright content
lib.copyRightText = TEXT
lib.copyRightText.data = date:U
lib.copyRightText.strftime = %Y
lib.copyRightText.wrap=  &copy; |. Alle Rechte vorbehalten. 


### Footer Contact 
content.footerContact = CONTENT
content.footerContact.table =  tt_content
content.footerContact.select.pidInList = {$config.footerContact.Pid}
content.footerContact.select.uidInList = {$config.footerContact.Uid}



#quickMenu Start
lib.quickMenu = COA
lib.quickMenu{
  
10= HMENU
10.special = list
10.special.value = 
10.1 = TMENU
10.1 {
 wrap = <ul class="top-small-menu pull-left">|</ul>
    noBlur = 1
    expAll = 1
    IFSUB = 1  
    
    NO {
      wrapItemAndSub = <li>|<span class="span">&nbsp;&#124;&nbsp;</span></li> || <li>|</li>
      ATagTitle.field = 1
     
    } 
   ACT = 1
   ACT{
      wrapItemAndSub =  <li class="active">|<span class="span">&nbsp;&#124;&nbsp;</span></li> || <li>|</li>

      ATagTitle.field = 1
      #  ACT = 1       
       stdWrap.htmlSpecialChars = 1
       ATagParams = class="active"
     #  allWrap = <li> | </li>  
    }
  
    IFSUB{
       wrapItemAndSub = <li>|</li>
      ATagTitle.field = 1           
     }        
  }
}
#quickMenu End


tt_content.stdWrap.innerWrap.cObject = CASE
tt_content.stdWrap.innerWrap.cObject {
      key.field = section_frame
      101 = TEXT
      101.value = <section class="white-section clearfix"><div class="container"><div class="row"><div class="col-lg-12">|</div></div></div></section>

      key.field = section_frame
      102 = TEXT
      102.value = <section class="dark-section clearfix"><div class="container"><div class="row"><div class="col-lg-12">|</div></div></div></section>

      key.field = section_frame
      103 = TEXT
      103.value = <div class="plugin-section">|</div>
} 



