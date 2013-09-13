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
 * Hooks for record title display in the Backend
 */
class RecordTitleHooks {

	function getActorTitle(&$params, $pObj) {

		$data = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($params['table'], $params['row']['uid']);

			// Person
		if($data['type'] == '0') {
			$params['title'] = $data['lastname'] . ', ' . $data['firstname'];
		}
			// Company
		else {
			$params['title'] = $data['company'];
		}
	}

}

?>