// Breadcrumb-Function
lib.nav_breadcrumb = HMENU
lib.nav_breadcrumb {
  special = rootline
  special.range = 0|4
  entryLevel = 1
  wrap =  |
  1 = TMENU
  1 {
  noBlur = 1
  NO = 1
  NO {
    stdWrap.htmlSpecialChars = 1
    linkWrap = <li>|</li>
    }
    CUR = 1
    CUR < .NO
    CUR {
      linkWrap = <li class="active">&nbsp;&nbsp;|</li>
      doNotLinkIt = 1
    }  
  }
}