<?php
defined('TYPO3_MODE') or die();

$GLOBALS['TCA']['sys_file_reference']['palettes']['tx_theaterinfo_cropimage'] = array(
    'showitem' => 'crop',
);

$GLOBALS['TCA']['sys_file_reference']['palettes']['tx_theaterinfo_playpicture'] = array(
    'showitem' => '
        title,alternative,--linebreak--,
        description,--linebreak--,crop',
);