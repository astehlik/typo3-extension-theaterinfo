<?php
if (!defined ('TYPO3_MODE')) {
 	die ('Access denied.');
}
if (!defined ('THEATERINFO_EXTkey')) {
	define('THEATERINFO_EXTkey',$_EXTKEY);
}

t3lib_extMgm::addPageTSConfig('

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
');

t3lib_extMgm::addUserTSConfig('mod.web_list.hideTables := addToList(tx_theaterinfo_domain_model_helper,tx_theaterinfo_domain_model_role)');
t3lib_extMgm::addUserTSConfig('
	options.saveDocNew.tx_theaterinfo_domain_model_helper=1
');
t3lib_extMgm::addUserTSConfig('
	options.saveDocNew.tx_theaterinfo_domain_model_actor=1
');

if (TYPO3_MODE=='BE')    {    
    require_once(PATH_t3lib . 'interfaces/interface.t3lib_localrecordlistgettablehook.php');
    
    require_once(t3lib_extMgm::extPath(THEATERINFO_EXTkey).'hooks/class.tx_theaterinfo_hooks_dblist.php');
    $TYPO3_CONF_VARS['SC_OPTIONS']['typo3/class.db_list_extra.inc']['getTable'][] = 
    	'tx_theaterinfo_hooks_dblist';
}

/**
 * Configure the Plugin to call the
 * right combination of Controller and Action according to
 * the user input (default settings, FlexForm, URL etc.)
 */
Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,																		// The extension name (in UpperCamelCase) or the extension key (in lower_underscore)
	'Pi1',																			// A unique name of the plugin in UpperCamelCase
	array(																			// An array holding the controller-action-combinations that are accessible 
		'Play' => 'index,show',
		),
	array(																			// An array of non-cachable controller-action-combinations (they must already be enabled)
		)
);
?>
