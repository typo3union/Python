lib.footerMenu= COA
lib.footerMenu{

	10= HMENU
	10.special = directory  
	10.special.value = 41  
	10.1 = TMENU
	10.1 {
	 wrap = <ul>|</ul>
		noBlur = 1
		expAll = 1
		IFSUB = 1  
	   
	  NO {
		wrapItemAndSub = <li>|</li>|*|<li>|</li>|*|<li class="last">|</li>
		stdWrap.wrap = <span class="glyphicon glyphicon-expand" aria-hidden="true"></span>
		ATagTitle.field = 1     
	  } 
	
	  ACT = 1
	  ACT{
		wrapItemAndSub =  <li>|</li>|*|<li>|</li>|*|<li class="last">|</li>
		stdWrap.wrap = <span class="glyphicon glyphicon-expand" aria-hidden="true"></span>
		ATagTitle.field = 1
		#  ACT = 1       
		 stdWrap.htmlSpecialChars = 1
		 ATagParams = class="active"
	   #  allWrap = <li> | </li>  
	  }
	
	  IFSUB{
		 wrapItemAndSub = <li>|</li>|*|<li>|</li>|*|<li class="last">|</li>
		 stdWrap.wrap = <span class="glyphicon glyphicon-expand" aria-hidden="true"></span>
		ATagTitle.field = 1
	   }       
	}
}
