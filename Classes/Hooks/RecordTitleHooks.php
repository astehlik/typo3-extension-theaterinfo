<?php

declare(strict_types=1);

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

use TYPO3\CMS\Backend\Utility\BackendUtility;

/**
 * Hooks for record title display in the Backend.
 */
class RecordTitleHooks
{
    /**
     * @param array $params
     * @param object $pObj
     */
    public function getActorTitle(&$params, $pObj): void
    {
        $data = BackendUtility::getRecord($params['table'], $params['row']['uid']);

        if ($data['type'] === '0') {
            // Person
            $params['title'] = $data['lastname'] . ', ' . $data['firstname'];
        } else {
            // Company
            $params['title'] = $data['company'];
        }
    }
}
