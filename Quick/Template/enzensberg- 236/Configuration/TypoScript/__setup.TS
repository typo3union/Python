###
# The ROOT template. 
#
# This template will be called by the "typo3guru" template recored in the root page. It reads the root templates for every part, like page, menu, systemConfiguration and # extensionConfiguration.
###

# Include Page Template
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:enzensberg/Configuration/TypoScript/__fluid.TS">

# Include Config Template
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:enzensberg/Configuration/TypoScript/config.ts">

# Include Menu Template
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:enzensberg/Configuration/TypoScript/mainMenu.ts">

# Include Other Menu Template
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:enzensberg/Configuration/TypoScript/__menu.TS">

# Include Extension Template
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:enzensberg/Configuration/TypoScript/__extensions.TS">

# Include Blocks Template
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:enzensberg/Configuration/TypoScript/__content.TS">

# Include System Template
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:enzensberg/Configuration/TypoScript/__system.TS">

# Include Header-Data Template
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:enzensberg/Configuration/TypoScript/header.ts">

# Include Logo
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:enzensberg/Configuration/TypoScript/logo.ts">

# Include Social Share 
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:enzensberg/Configuration/TypoScript/share.ts">

# Include Search
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:enzensberg/Configuration/TypoScript/search.ts">

# Footer Map
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:enzensberg/Configuration/TypoScript/footerMap.ts">

# Footer Menu
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:enzensberg/Configuration/TypoScript/footerMenu.ts">

# Language Menu
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:enzensberg/Configuration/TypoScript/languageMenu.ts">