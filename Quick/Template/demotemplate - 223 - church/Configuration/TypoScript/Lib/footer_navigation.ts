// Modal Footer Navigation
lib.nav_modal_footer = HMENU
lib.nav_modal_footer {
  special = list
  special.value = 1,100,77
  1 = TMENU
  1 {
    wrap = <ul class="foot-nav">|</ul>
    expAll = 1
    NO = 1
    NO {
      ATagBeforeWrap = 0
      allWrap = | |*| | |*| |
      stdWrap.htmlSpecialChars = 1
      linkWrap = <li>|</li>
      ATagTitle.field = abstract // description // subtitle
      ATagParams = title="{field:abstract // field:subtitle //field:title}"
      ATagParams.insertData = 1
    }
    ACT < .NO
    ACT = 1    
    ACT {
      linkWrap = <li class="active">|</li>
    }
  }
}
// Modal Footer1 Navigation
lib.nav_modal_footer1 = HMENU
lib.nav_modal_footer1 {
  special = list
  special.value = 74,94,97
  1 = TMENU
  1 {
    expAll = 1
    wrap = <ul class="list-unstyled">|</ul>
    NO = 1
    NO {
      ATagBeforeWrap = 0
      allWrap = | |*| | |*| |
      stdWrap.htmlSpecialChars = 1
      linkWrap = <li>|</li>
      ATagTitle.field = abstract // description // subtitle
      ATagParams = title="{field:abstract // field:subtitle //field:title}"
      ATagParams.insertData = 1
    }
  }
}