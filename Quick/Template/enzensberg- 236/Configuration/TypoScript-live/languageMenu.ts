lib.languageMenu = COA
lib.languageMenu.10 = HMENU
lib.languageMenu.10 {

	special=language
	special.value = 0,1
	
	1 = TMENU
	1 {
		wrap = <ul><li><a href="#"><img src="typo3conf/ext/enzensberg/Resources/Public/images/globe.png" alt="img"/></a></li>|</ul>
		NO = 1
		NO {
			stdWrap.cObject = TEXT
			stdWrap.cObject {
			
				value = <img src="typo3conf/ext/enzensberg/Resources/Public/images/de.png" alt="img"/> || <img src="typo3conf/ext/enzensberg/Resources/Public/images/en.png" alt="img"/>
			}
			allWrap = <li>|</li>
		}
	
		ACT < .NO
		ACT {
			allWrap = <li class="active">|</li>
		}
	}
}