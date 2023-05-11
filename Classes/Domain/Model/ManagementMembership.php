<?php

declare(strict_types=1);

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
 * Membership in the management.
 */
class ManagementMembership extends AbstractEntity
{
    /**
     * @var Actor
     */
    protected $actor;

    /**
     * @var \DateTime
     */
    protected $enddate;

    /**
     * @var \DateTime
     */
    protected $startdate;

    public function getActor(): Actor
    {
        return $this->actor;
    }

    public function getEnddate(): ?\DateTime
    {
        return $this->enddate;
    }

    public function getStartdate(): \DateTime
    {
        return $this->startdate;
    }
}
