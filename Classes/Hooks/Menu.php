<?php
/*                                                                        *
 * This script belongs to the TYPO3 extension "theaterinfo".              *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License as published by the Free   *
 * Software Foundation, either version 3 of the License, or (at your      *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General      *
 * Public License for more details.                                       *
 *                                                                        *
 * You should have received a copy of the GNU General Public License      *
 * along with the script.                                                 *
 * If not, see http://www.gnu.org/licenses/gpl.html                       *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * Class containing methods for menu related hooks
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_Theaterinfo_Hooks_Menu {

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
