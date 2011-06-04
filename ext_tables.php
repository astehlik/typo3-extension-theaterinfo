<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

include_once(t3lib_extMgm::extPath(THEATERINFO_EXTkey).'hooks/class.tx_theaterinfo_hooks_titles.php');

$TCA['tx_theaterinfo_domain_model_play'] = array (
	'ctrl' => array (
		'title'     => 'LLL:EXT:theaterinfo/locallang_db.xml:tx_theaterinfo_domain_model_play',
		'label'     => 'title',
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY time_sort',
		'delete' => 'deleted',
		'enablecolumns' => array (
			'disabled' => 'hidden',
		),
		'dividers2tabs' => 1,
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_theaterinfo_domain_model_play.gif',
	),
);

$TCA['tx_theaterinfo_domain_model_actor'] = array (
	'ctrl' => array (
		'title'     => 'LLL:EXT:theaterinfo/locallang_db.xml:tx_theaterinfo_domain_model_actor',
		'label'     => 'lastname',
		'label_userFunc' => 'tx_theaterinfo_hooks_titles->getActorTitle',
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY lastname, firstname',
		'delete' => 'deleted',
		'type' => 'type',
		'enablecolumns' => array (
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_theaterinfo_domain_model_actor.gif',
	),
);

$TCA['tx_theaterinfo_domain_model_helpertype'] = array (
	'ctrl' => array (
		'title'     => 'LLL:EXT:theaterinfo/locallang_db.xml:tx_theaterinfo_domain_model_helpertype',
		'label'     => 'jobtitle',
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY jobtitle',
		'delete' => 'deleted',
		'enablecolumns' => array (
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_theaterinfo_domain_model_helpertype.gif',
	),
);

$TCA['tx_theaterinfo_domain_model_role'] = array (
	'ctrl' => array (
		'title'     => 'LLL:EXT:theaterinfo/locallang_db.xml:tx_theaterinfo_domain_model_role',
		'label'     => 'name',
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',
		'delete' => 'deleted',
		'enablecolumns' => array (
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_theaterinfo_domain_model_role.gif',
	),
);

$TCA['tx_theaterinfo_domain_model_helper'] = array (
	'ctrl' => array (
		'title'     => 'LLL:EXT:theaterinfo/locallang_db.xml:tx_theaterinfo_domain_model_helper',
		'label'     => 'helpertype',
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',
		'delete' => 'deleted',
		'enablecolumns' => array (
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_theaterinfo_domain_model_helper.gif',
	),
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Theater info');

$extensionName = t3lib_div::underscoredToUpperCamelCase($_EXTKEY);
$pluginSignature = strtolower($extensionName) . '_pi1';

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Theater info'
);


//$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,recursive';
//$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
//t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_list.xml');

?>
