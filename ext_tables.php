<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Theater info');

	// These dividers are a little trick to group these items in the plugin selector
$GLOBALS['TCA']['tt_content']['columns']['list_type']['config']['items'][] = array('Theater info', '--div--', \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'ext_icon.gif');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'PlaysList',
	'Show plays (Theater info)'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'ShowManagement',
	'Show management (Theater info)'
);

$TCA['tt_content']['columns']['list_type']['config']['items'][] = array('', '--div--');

//$extensionName = t3lib_div::underscoredToUpperCamelCase($_EXTKEY);
//$pluginSignature = strtolower($extensionName) . '_pi1';
//$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,recursive';
//$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
//t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_list.xml');

?>
