<?php
namespace Sto\Theaterinfo\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 extension "theaterinfo".              *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * A job an actor / sponsor can do for a play
 */
class Helpertype extends AbstractEntity
{

    /**
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $icon;

    /**
     * @var string
     * @validate NotEmpty
     */
    protected $jobtitle;

    /**
     * @return string
     */
    public function getJobtitle()
    {
        return $this->jobtitle;
    }
}
