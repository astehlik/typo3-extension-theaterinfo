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
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * A management position.
 */
class ManagementPosition extends AbstractEntity
{
    /**
     * All memberships of this posision.
     *
     * @var ObjectStorage<ManagementMembership>
     */
    protected ObjectStorage $memberships;

    /**
     * The name of the position.
     *
     * @var string
     */
    protected string $name;

    /**
     * The name of the position for female members.
     *
     * @var string
     */
    protected string $nameFemale;

    /**
     * The sorting for this position.
     *
     * @var int
     */
    protected int $sorting;

    public function __construct()
    {
        $this->memberships = new ObjectStorage();
    }

    public function getCurrentMembership(): ?ManagementMembership
    {
        $currentMembership = null;

        $memberships = $this->getMemberships();

        if ($memberships->count()) {
            $memberships->rewind();
            $currentMembership = $memberships->current();
        }

        return $currentMembership;
    }

    /**
     * @return ObjectStorage<ManagementMembership>
     */
    public function getMemberships(): ObjectStorage
    {
        return $this->memberships;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNameFemale(): string
    {
        return $this->nameFemale;
    }
}
