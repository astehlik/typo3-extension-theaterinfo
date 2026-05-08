<?php

declare(strict_types=1);

defined('TYPO3') || exit;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

ExtensionManagementUtility::registerPageTSConfigFile(
    'theaterinfo',
    'Configuration/TsConfig/Page/linkhandler.tsconfig',
    'Theater info - Linkhandler'
);
