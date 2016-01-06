mod.SHARED {
	defaultLanguageFlag = de
	defaultLanguageLabel = Deutsch
}

# Klassen. Nicht vergessen diese in der CSS Klasse zu definieren
RTE.classes {

	# lists
	checklist {
		name = Checkliste
	}

	# tables
	table {
		name = Normale Tabelle
	}
	table-condensed {
		name = Verkürzte Tabelle
	}
	table-bordered {
		name = Tabelle mit Rahmen
	}
	table-styled {
		name = Tabelle mit anderem Design
	}
	table-striped {
		name = Tabelle mit Streifen
	}
	table-hover {
		name = Tabelle mit Hover-Effekt
	}

	# aligns
	align-justify {
		name = LLL:EXT:rtehtmlarea/htmlarea/locallang_tooltips.xml:justifyfull
	}
	align-left {
		name = LLL:EXT:rtehtmlarea/htmlarea/locallang_tooltips.xml:justifyleft
		value = text-align: left;
	}
	align-center {
		name = LLL:EXT:rtehtmlarea/htmlarea/locallang_tooltips.xml:justifycenter
		value = text-align: center;
	}
	align-right {
		name = LLL:EXT:rtehtmlarea/htmlarea/locallang_tooltips.xml:justifyright
		value = text-align: right;
	}

	style1 {
		name = Stil 1
	}


	htmlCode {
		name = HTML Code
	}
	phpCode {
		name = PHP Code
	}
}

RTE.classesAnchor {

	internalLinkInNewWindow {
		class = internal-link-new-window
		type = page
		titleText = LLL:EXT:rtehtmlarea/res/accessibilityicons/locallang.xml:internal_link_new_window_titleText
	}
	download {
		class = download
		type = file
		titleText = LLL:EXT:rtehtmlarea/res/accessibilityicons/locallang.xml:download_titleText
	}
	mail {
		class = mail
		type = mail
		titleText = LLL:EXT:rtehtmlarea/res/accessibilityicons/locallang.xml:mail_titleText
	}


	more-link {
		class = more-link
		type = page
		titleText = LLL:EXT:demotemplate/Resources/Private/Language/locallang.xml:more_link_titleText
		altText = LLL:EXT:demotemplate/Resources/Private/Language/locallang.xml:more_link_altText
	}
	button-link {
		class = btn
		type = page
		titleText = LLL:EXT:demotemplate/Resources/Private/Language/locallang.xml:more_link_titleText
		altText = LLL:EXT:demotemplate/Resources/Private/Language/locallang.xml:more_link_altText
	}
	next-link {
		class = ym-button ym-next
		type = page
		titleText = LLL:EXT:demotemplate/Resources/Private/Language/locallang.xml:next_link_titleText
		altText = LLL:EXT:demotemplate/Resources/Private/Language/locallang.xml:next_link_altText
	}
	back-link {
		class = back-link
		type = page
		titleText = LLL:EXT:demotemplate/Resources/Private/Language/locallang.xml:back_link_titleText
		altText = LLL:EXT:demotemplate/Resources/Private/Language/locallang.xml:back_link_altText
	}
}

RTE.default {

	showButtons = *

	defaultContentLanguage = de


	// Make possible to read classes from the contentCSS CSS file
	buttons.textstyle.tags.span.allowedClasses >
	buttons.textstyle.tags.REInlineTags >
	buttons.textstyle.REInlineTags >
	buttons.blockstyle.tags.table.allowedClasses >
	buttons.blockstyle.tags.p.allowedClasses >


	contentCSS = typo3conf/ext/demotemplate/Resources/Public/CSS/rte.css


	buttons.link.relAttribute.enabled = 1

	// Disable contextual menu
	contextMenu.disabled = 1

	// Display status bar
	showStatusBar = 1

	// Use CSS formatting when possible
	useCSS = 1

	// Make rtehtmlarea resizable
	rteResize = 1


	proc {

		allowedClasses  < RTE.default.classesCharacter
		# auskommentieren, damit klassen eingelesen werden können
		#allowedClasses := addToList( dimmed,highlight,box,info,success,warning,error,float-left,float-right,center,align-left,align-center,align-right,align-justify,style1 )


		allowTagsOutside := addToList( pre )

		allowTags := addToList( pre )

		// Tags allowed in Typolists
		allowTagsInTypolists = br,font,b,i,u,a,img,span

		// Keep unknown tags
		dontRemoveUnknownTags_db = 1

		// Allow tables
		preserveTables = 1

		entryHTMLparser_db = 1
		entryHTMLparser_db {

			// Tags allowed
			allowTags < RTE.default.proc.allowTags

			// Tags denied
			denyTags >

			// HTML special characters
			htmlSpecialChars = 0

			// Allow IMG tags
			tags.img >

			// Additionnal attributes for P & DIV
			tags.div.allowedAttribs = class,style,align
			tags.p.allowedAttribs = class,style,align

			// Tags to remove
			removeTags = center, font, o:p, sdfield, strike, u

			// Keep non matched tags
			keepNonMatchedTags = protect
		}

		// HTML parser
		HTMLparser_db {

			// Strip attributes
			noAttrib = br

			// XHTML compliance
			xhtml_cleaning = 1
		}

		// Exit HTML parser
		exitHTMLparser_db = 1
		exitHTMLparser_db {

			// Remap bold and italic
			tags.b.remap = strong
			tags.i.remap = em

			// Keep non matched tags
			keepNonMatchedTags = 1

			// HTML special character
			htmlSpecialChars = 0
		}


	}

}


RTE.default.FE < RTE.default

TCEFORM.tt_content {
	header_layout.altLabels.0 = Überschrift h1 (Standard)
	header_layout.altLabels.1 = Überschrift h1
	header_layout.altLabels.2 = Überschrift h2
	header_layout.altLabels.3 = Überschrift h3
	header_layout.altLabels.4 = Überschrift h4
	header_layout.altLabels.5 = Überschrift h5
}
TCEFORM.tt_content.section_frame {
     addItems.200 = Image Setting
}
