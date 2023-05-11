<?php

declare(strict_types=1);

defined('TYPO3') || exit;

$GLOBALS['TCA']['sys_file_reference']['palettes']['tx_theaterinfo_cropimage'] = ['showitem' => 'crop'];

$GLOBALS['TCA']['sys_file_reference']['palettes']['tx_theaterinfo_playpicture'] = [
    'showitem' => '
        title,alternative,--linebreak--,
        description,--linebreak--,crop',
];
