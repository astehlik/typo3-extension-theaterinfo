<?php

declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

ExtensionUtility::registerPlugin(
    'Theaterinfo',
    'PlaysList',
    'Show plays (Theater info)',
    group: 'theaterinfo'
);

ExtensionUtility::registerPlugin(
    'Theaterinfo',
    'ShowManagement',
    'Show management (Theater info)',
    group: 'theaterinfo'
);

ExtensionUtility::registerPlugin(
    'Theaterinfo',
    'CardOrderForm',
    'Card order (Theater info)',
    group: 'theaterinfo'
);
