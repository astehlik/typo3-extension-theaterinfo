<?php

declare(strict_types=1);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Theaterinfo',
    'PlaysList',
    'Show plays (Theater info)',
    group: 'theaterinfo'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Theaterinfo',
    'ShowManagement',
    'Show management (Theater info)',
    group: 'theaterinfo'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Theaterinfo',
    'CardOrderForm',
    'Card order (Theater info)',
    group: 'theaterinfo'
);
