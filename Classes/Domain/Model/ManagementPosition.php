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
 * A management position
 */
class ManagementPosition extends AbstractEntity
{
    /**
     * All memberships of this posision
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sto\Theaterinfo\Domain\Model\ManagementMembership>
     */
    protected $memberships;

    /**
     * The name of the position
     *
     * @var string
     */
    protected $name;

    /**
     * The name of the position for female members
     *
     * @var string
     */
    protected $nameFemale;

    /**
     * The sorting for this position
     *
     * @var int
     */
    protected $sorting;

    /**
     * @return \Sto\Theaterinfo\Domain\Model\ManagementMembership
     */
    public function getCurrentMembership()
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
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getMemberships()
    {
        return $this->memberships;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $memberships
     */
    public function setMemberships($memberships)
    {
        $this->memberships = $memberships;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
