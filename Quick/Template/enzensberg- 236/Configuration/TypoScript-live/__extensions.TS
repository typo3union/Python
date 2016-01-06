###
# TEMPLATE: root_extensionConfiguration
# DESCRIPTION: The EXTENSION CONFIGURATION ROOT template. This template will be called by the MASTER ROOT template. It reads the templates for the extensions. In this template record are only other template records included.
###

# Include News TypoScript
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:enzensberg/Configuration/TypoScript/Extensions/__news.TS">

# Include FE_LOGIN TypoScript
#<INCLUDE_TYPOSCRIPT: source="FILE: EXT:enzensberg/Configuration/TypoScript/Extensions/__fe_login.TS">

# Include Indexed Search TypoScript
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:enzensberg/Configuration/TypoScript/Extensions/__tx_indexsearch.TS">

# Include Powermail TypoScript
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:enzensberg/Configuration/TypoScript/Extensions/__powermail.TS">

# Include DIRECT_MAIL TypoScript
#<INCLUDE_TYPOSCRIPT: source="FILE: EXT:enzensberg/Configuration/TypoScript/Extensions/__direct_mail.TS">
