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
 * Membership in the management
 */
class ManagementMembership extends AbstractEntity
{
    /**
     * @var \Sto\Theaterinfo\Domain\Model\Actor
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

    /**
     * Getter for actor
     *
     * @return \Sto\Theaterinfo\Domain\Model\Actor
     */
    public function getActor()
    {
        return $this->actor;
    }

    /**
     * Getter for enddate
     *
     * @return \DateTime
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Getter for startdate
     *
     * @return \DateTime
     */
    public function getStartdate()
    {
        return $this->startdate;
    }
}
