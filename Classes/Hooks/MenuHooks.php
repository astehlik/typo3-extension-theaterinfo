<?php
namespace Sto\Theaterinfo\Hooks;

/*                                                                        *
 * This script belongs to the TYPO3 extension "theaterinfo".              *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * Class containing methods for menu related hooks
 */
class MenuHooks {

	public function getBreadcrumbMenuManagement($configuration) {
		$configuration = array(
			'extensionName' => 'Theaterinfo',
			'pluginName' => 'ShowManagement',
		);

		$currentControllerConfiguration = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['extbase']['extensions']['Theaterinfo']['plugins']['ShowManagement']['controllers'];

		$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['extbase']['extensions']['Theaterinfo']['plugins']['ShowManagement']['controllers'] = array(
			'Management' => array(
				'actions' => array(
					'breadcrumbMenu'
				),
			),
		);

		/** @var $extbaseBootrap  Tx_Extbase_Core_Bootstrap*/
		$extbaseBootrap = t3lib_div::makeInstance('tx_extbase_core_bootstrap');
		$result = $extbaseBootrap->run('', $configuration);

		$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['extbase']['extensions']['Theaterinfo']['plugins']['ShowManagement']['controllers'] = $currentControllerConfiguration;

		return $result;
	}

	public function getBreadcrumbMenuArrayManagement($currentMenuArray, $additionalParameters) {

		$parentMenuObject = $additionalParameters['parentObj'];

		$configuration = array(
			'extensionName' => 'Theaterinfo',
			'pluginName' => 'ShowManagement',
			'parentMenuObject' => $parentMenuObject,
		);

		$currentControllerConfiguration = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['extbase']['extensions']['Theaterinfo']['plugins']['ShowManagement']['controllers'];

		$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['extbase']['extensions']['Theaterinfo']['plugins']['ShowManagement']['controllers'] = array(
			'Management' => array(
				'actions' => array(
					'breadcrumbMenuArray'
				),
			),
		);

		/** @var $extbaseBootrap  Tx_Extbase_Core_Bootstrap*/
		$extbaseBootrap = t3lib_div::makeInstance('tx_extbase_core_bootstrap');
		$result = $extbaseBootrap->run('', $configuration);

		$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['extbase']['extensions']['Theaterinfo']['plugins']['ShowManagement']['controllers'] = $currentControllerConfiguration;

		return $currentMenuArray;
	}
}

?>