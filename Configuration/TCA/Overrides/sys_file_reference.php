<?php
defined('TYPO3_MODE') or die();

$GLOBALS['TCA']['sys_file_reference']['palettes']['tx_theaterinfo_cropimage'] = [
    'showitem' => 'crop',
];

$GLOBALS['TCA']['sys_file_reference']['palettes']['tx_theaterinfo_playpicture'] = [
    'showitem' => '
        title,alternative,--linebreak--,
        description,--linebreak--,crop',
];