<?php
if (!defined ('TYPO3_MODE')) {
 	die ('Access denied.');
}

if (!defined ('THEATERINFO_EXTkey')) {
	define('THEATERINFO_EXTkey',$_EXTKEY);
}

t3lib_extMgm::addPageTSConfig('


mod.tx_linkhandler.tx_theaterinfo_play {
	label = Stück
	listTables = tx_theaterinfo_domain_model_play
}

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

');

if (TYPO3_MODE == 'BE') {
	require_once(PATH_t3lib . 'interfaces/interface.t3lib_localrecordlistgettablehook.php');

	require_once(t3lib_extMgm::extPath(THEATERINFO_EXTkey).'hooks/class.tx_theaterinfo_hooks_dblist.php');
	$TYPO3_CONF_VARS['SC_OPTIONS']['typo3/class.db_list_extra.inc']['getTable'][] = 'tx_theaterinfo_hooks_dblist';
}

/**
 * Configure the Plugin to call the
 * right combination of Controller and Action according to
 * the user input (default settings, FlexForm, URL etc.)
 */
Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'Play' => 'list, show',
	),
	array()
);
Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'ShowManagement',
	array(
		'Management' => 'list',
		'Actor' => 'show',
	),
	array()
);
?>
