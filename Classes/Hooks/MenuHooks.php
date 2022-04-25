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

use Sto\Theaterinfo\Controller\ManagementController;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Core\Bootstrap;

/**
 * Class containing methods for menu related hooks
 */
class MenuHooks
{
    public function getBreadcrumbMenuArrayManagement(array $currentMenuArray, array $additionalParameters): array
    {
        $parentMenuObject = $additionalParameters['parentObj'];

        $configuration = [
            'extensionName' => 'Theaterinfo',
            'pluginName' => 'ShowManagement',
            'parentMenuObject' => $parentMenuObject,
        ];

        $currentControllerConfiguration = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['extbase']['extensions']['Theaterinfo']['plugins']['ShowManagement']['controllers'];

        /** @uses ManagementController::breadcrumbMenuArrayAction() */
        /** @noinspection PhpArrayIndexImmediatelyRewrittenInspection */
        $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['extbase']['extensions']['Theaterinfo']['plugins']['ShowManagement']['controllers'] = [
            'Management' => [
                'actions' => [
                    'breadcrumbMenuArray',
                ],
            ],
        ];

        $extbaseBootrap = GeneralUtility::makeInstance(Bootstrap::class);
        $extbaseBootrap->run('', $configuration);

        $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['extbase']['extensions']['Theaterinfo']['plugins']['ShowManagement']['controllers'] = $currentControllerConfiguration;

        return $currentMenuArray;
    }

    /**
     * @param array $configuration
     * @return string
     */
    public function getBreadcrumbMenuManagement($configuration)
    {
        $configuration = [
            'extensionName' => 'Theaterinfo',
            'pluginName' => 'ShowManagement',
        ];

        $currentControllerConfiguration = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['extbase']['extensions']['Theaterinfo']['plugins']['ShowManagement']['controllers'];

        /** @noinspection PhpArrayIndexImmediatelyRewrittenInspection */
        $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['extbase']['extensions']['Theaterinfo']['plugins']['ShowManagement']['controllers'] = [
            'Management' => [
                'actions' => [
                    'breadcrumbMenu',
                ],
            ],
        ];

        $extbaseBootrap = GeneralUtility::makeInstance(Bootstrap::class);
        $result = $extbaseBootrap->run('', $configuration);

        $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['extbase']['extensions']['Theaterinfo']['plugins']['ShowManagement']['controllers'] = $currentControllerConfiguration;

        return $result;
    }
}
