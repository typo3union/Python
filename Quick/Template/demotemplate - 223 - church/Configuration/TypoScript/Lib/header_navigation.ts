// Main navigation horizontal
lib.nav_horizontal = HMENU
lib.nav_horizontal {
  special = directory
  special.value = 74
  1 = TMENU
  1 {
    expAll = 1
    NO = 1
    NO {
      allWrap.insertData = 1
      allWrap = <li id="herald_menu_{field:uid}">|</li>   
      stdWrap.htmlSpecialChars = 1
    }
    ACT < .NO
    ACT = 1
    ACT {
      allWrap = <li class="active">|</li>
    }
    IFSUB < .NO
    IFSUB {
      allWrap = |
      wrapItemAndSub.insertData = 1
      wrapItemAndSub = <li class="dropdown" id="herald_menu_{field:uid}">|</li>
      ATagBeforeWrap = 1 
      linkWrap = |&nbsp;
      ATagParams = class="dropdown-toggle" data-toggle="dropdown" 
    }
    ACTIFSUB < .IFSUB
  }
  2 = TMENU
  2 {
    wrap = <ul class="dropdown-menu">|</ul>
    expAll = 1
    NO = 1
    NO {
      allWrap = <li>|</li>
      stdWrap.htmlSpecialChars = 1
    }
    ACT < .NO
    ACT {
      allWrap = <li class="active">|</li>
    }
    IFSUB < .NO
    IFSUB {
      allWrap = |
      wrapItemAndSub = <li class="dropdown-submenu">|</li>
      ATagBeforeWrap = 1 
      linkWrap = |&nbsp;
      ATagParams = class="dropdown-toggle" data-toggle="dropdown" 
    }
    ACTIFSUB < .IFSUB
  }
  3 = TMENU
  3 {
    wrap = <ul class="dropdown-menu">|</ul>
    expAll = 1
    NO = 1
    NO {
      allWrap = <li>|</li>
      stdWrap.htmlSpecialChars = 1
    }
    ACT < .NO
    ACT {
      allWrap = <li class="active">|</li>
    }
    IFSUB < .NO
    IFSUB {
      allWrap = |
      wrapItemAndSub = <li class="dropdown-submenu">|</li>
      ATagBeforeWrap = 1
      linkWrap = |&nbsp;
      ATagParams = class="dropdown-toggle" data-toggle="dropdown"
    }
    ACTIFSUB < .IFSUB
  }
  4 = TMENU
  4 {
    wrap = <ul class="dropdown-menu">|</ul>
    expAll = 1
    NO = 1
    NO {
      allWrap = <li>|</li>
      stdWrap.htmlSpecialChars = 1
    }
    ACT < .NO
    ACT {
      allWrap = <li class="active">|</li>
    }
    IFSUB < .NO
    IFSUB {
      allWrap = |
      wrapItemAndSub = <li class="dropdown-submenu">|</li>
      ATagBeforeWrap = 1
      linkWrap = |&nbsp;
      ATagParams = class="dropdown-toggle" data-toggle="dropdown"
    }
    ACTIFSUB < .IFSUB
  } 
}