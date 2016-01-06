menu.main_menu = COA
menu.main_menu{
  
	10= HMENU
	10.special = directory
	10.special.value = 7    
	10.1 = TMENU
	10.1 {
		wrap = |
		noBlur = 1
		expAll = 1
		IFSUB = 1  
    
		NO {
			wrapItemAndSub = <li>|</li>
			ATagTitle.field = 1
		}

		ACT = 1
		ACT{
			wrapItemAndSub =  <li class="">|</li>
			ATagTitle.field = 1
			stdWrap.htmlSpecialChars = 1
			ATagParams = class="active"
		}
	
		IFSUB{
			wrapItemAndSub = <li class="">|</li>
			ATagTitle.field = 1
		}
	}

	10.2  = TMENU
	10.2 {
		wrap = <ul class="">|</ul>
		noBlur = 1
		expAll = 1
		IFSUB = 1  
		
		NO {
			wrapItemAndSub.insertData = 1
			wrapItemAndSub = <li><div class="submenu-1"><span class="img-icon"><span class=""><img alt="menu" src="uploads/pics/{field:pageicon}"></span>|</span></li>
			ATagTitle.field = 1
			ATagParams = class=""
			stdWrap.htmlSpecialChars = 1
			ATagParams = class="active"
		}
		
		ACT = 1
		ACT{
			wrapItemAndSub.insertData = 1
			wrapItemAndSub = <li><div class="submenu-1"><span class="img-icon"><span class=""><img alt="menu" src="uploads/pics/{field:pageicon}"></span>|</span></li>
			ATagTitle.field = 1
		}
	  
		IFSUB{
			wrapItemAndSub.insertData = 1
			wrapItemAndSub = <li><div class="submenu-1"><span class="img-icon"><span class=""><img alt="menu" src="uploads/pics/{field:pageicon}"></span>|</span></li>
			ATagTitle.field = 1
		}
	}
	 
	10.3  = TMENU
	10.3 {
		wrap = </div><ul>|</ul>
		noBlur = 1
		expAll = 1
		IFSUB = 1  
	
		NO {
			wrapItemAndSub = <li>|</li>
			ATagTitle.field = 1
			ATagParams = class=""
		}
		
		ACT = 1
		ACT{
			wrapItemAndSub =  <li >|</li>
			ATagTitle.field = 1
			stdWrap.htmlSpecialChars = 1
			ATagParams = class="active"
		}
	
		IFSUB{
			wrapItemAndSub = <li class="">|</li>
			ATagTitle.field = 1
		}
	}
}