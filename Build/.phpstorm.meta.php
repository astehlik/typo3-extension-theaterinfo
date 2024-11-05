<?php

namespace PHPSTORM_META {
    override(
        \Psr\Container\ContainerInterface::get(0),
        map(['' => '@'])
    );

    override(
        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(0),
        map(['' => '@'])
    );
}
