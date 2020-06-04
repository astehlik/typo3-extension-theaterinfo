<?php
/** @noinspection PhpMissingStrictTypesDeclarationInspection */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Theater info',
    'description' => 'Displays information about theater plays, actors and their roles and tasks',
    'category' => 'plugin',
    'state' => 'alpha',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'author' => 'Alexander Stehlik',
    'author_email' => 'alexander.stehlik.deleteme@googlemail.com',
    'author_company' => '',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'php' => '7.0.0-7.4.99',
            'typo3' => '10.4.0-10.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
