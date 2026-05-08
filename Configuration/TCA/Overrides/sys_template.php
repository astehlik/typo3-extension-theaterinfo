<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

ExtensionManagementUtility::addStaticFile(
    'theaterinfo',
    'Configuration/TypoScript',
    'Theater info',
);

ExtensionManagementUtility::addStaticFile(
    'theaterinfo',
    'Configuration/TypoScript',
    'Theater info - Linkhandler',
);
