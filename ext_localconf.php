<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '

<INCLUDE_TYPOSCRIPT: source="FILE: EXT:theaterinfo/Configuration/TypoScript/Linkhandler/setup.txt">

mod.tx_linkhandler.tx_theaterinfo_play < plugin.tx_linkhandler.tx_theaterinfo_play
RTE.default.tx_linkhandler.tx_theaterinfo_play < mod.tx_linkhandler.tx_theaterinfo_play

	# ***************************************************************************************
	# CONFIGURATION of RTE in table "tx_theaterinfo_domain_model_play", field "action"
	# ***************************************************************************************
RTE.config.tx_theaterinfo_domain_model_play.action {
	hidePStyleItems = H1, H4, H5, H6
	proc.exitHTMLparser_db=1
	proc.exitHTMLparser_db {
		keepNonMatchedTags=1
		tags.font.allowedAttribs= color
		tags.font.rmTagIfNoAttrib = 1
		tags.font.nesting = global
	}
}

mod.web_list {

	hideTables := addToList(tx_theaterinfo_domain_model_helper)
	deniedNewTables := addToList(tx_theaterinfo_domain_model_helper)

	hideTables := addToList(tx_theaterinfo_domain_model_role)
	deniedNewTables := addToList(tx_theaterinfo_domain_model_role)

	hideTables := addToList(tx_theaterinfo_domain_model_managementmembership)
	deniedNewTables := addToList(tx_theaterinfo_domain_model_managementmembership)
}

'
);

if (TYPO3_MODE == 'BE') {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/class.db_list_extra.inc']['getTable'][] =
        \Sto\Theaterinfo\Hooks\RecordListHooks::class;
}

/**
 * Configure the Plugin to call the
 * right combination of Controller and Action according to
 * the user input (default settings, FlexForm, URL etc.)
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Sto.Theaterinfo',
    'PlaysList',
    ['Play' => 'list, show',],
    []
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Sto.Theaterinfo',
    'ShowManagement',
    [
        'Management' => 'list',
        'Actor' => 'show',
    ],
    []
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Sto.Theaterinfo',
    'CardOrderForm',
    ['CardOrder' => 'orderForm,takeOrder,takeOrderConfirmation'],
    ['CardOrder' => 'orderForm,takeOrder']
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['txTheaterinfoFal'] =
    \Sto\Theaterinfo\Install\FalUpdateWizard::class;
