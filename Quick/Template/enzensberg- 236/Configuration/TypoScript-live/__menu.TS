menu.followUs = HMENU
menu.followUs {
	
	special = list
	special.value = 9
		
	1 = TMENU
	1 {
		wrap = |
		expAll = 1
		noBlur = 1
		
		NO = 1
		NO {
			ATagTitle {
				field = title
				fieldRequired = nav_title
			}
			ATagParams = class="parent_menu"
			
			ATagBeforeWrap = 1
			linkWrap = |
			
			wrapItemAndSub.insertData = 1
			wrapItemAndSub = |
			stdWrap.htmlSpecialChars = 1	
			doNotLinkIt = 1			
		}
	}
	
}

# BREADCRUMB MENU
menu.breadcrumb=COA
menu.breadcrumb.wrap = <div class="breadcrumb-section"><ul class="breadcrumb">|</ul></div>
menu.breadcrumb {

	10 = HMENU
	10 {
		special = rootline
		special.range = 0|-1
		includeNotInMenu = 1
		1 = TMENU
		1.noBlur = 1
		1.CUR = 1
		1.target = _self
		1.NO {
			stdWrap.field = subtitle // title
			ATagTitle.field = subtitle // title
			wrapItemAndSub = <li>|</li>
		}
		
		1.CUR {
			stdWrap.field = subtitle // title
			wrapItemAndSub = <li class="active">|</li>
			doNotLinkIt = 1
		}
	}
}