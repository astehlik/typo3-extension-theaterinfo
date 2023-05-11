<?php

declare(strict_types=1);

defined('TYPO3') || exit;

$GLOBALS['TCA']['sys_file_reference']['palettes']['tx_theaterinfo_cropimage'] = [
    'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette',
    'showitem' => 'crop',
];

$GLOBALS['TCA']['sys_file_reference']['palettes']['tx_theaterinfo_playpicture'] = [
    'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette',
    'showitem' => '
        alternative,description,--linebreak--,
        title,--linebreak--,crop',
];
