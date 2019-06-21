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
 * An actor / helper / sponsor
 */
class Actor extends AbstractEntity
{
    /**
     * @var \DateTime
     */
    protected $birthday;

    /**
     * @var \Sto\Theaterinfo\Domain\Model\Role
     */
    protected $favoriteRole;

    /**
     * @var string
     */
    protected $firstname;

    /**
     * The gender of the actor, can me 0 (male) or 1 (female)
     *
     * @var \Sto\Theaterinfo\Domain\Model\Enumeration\Gender
     */
    protected $gender;

    /**
     * @var string
     */
    protected $hobbys;

    /**
     * @var string
     */
    protected $job;

    /**
     * @var string
     */
    protected $lastname;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sto\Theaterinfo\Domain\Model\ManagementMembership>
     */
    protected $managementPositions;

    /**
     * @var string
     */
    protected $managementReasons;

    /**
     * @var \DateTime
     */
    protected $memberSince;

    /**
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $picture;

    /**
     * Returns the current age in years of the actor
     *
     * @return int
     */
    public function getAge()
    {
        $birthday = $this->getBirthday();

        if (!isset($birthday)) {
            return null;
        }

        $now = new \DateTime();
        $age = $birthday->diff($now);
        return $age->y;
    }

    /**
     * Getter for birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Getter for favoriteRole
     *
     * @return \Sto\Theaterinfo\Domain\Model\Role
     */
    public function getFavoriteRole()
    {
        return $this->favoriteRole;
    }

    /**
     * Getter for firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Builds the full name for the actor
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    /**
     * Returns the gender of this actor, can be 0 (male) or 1 (female)
     *
     * @return int
     */
    public function getGender(): int
    {
        return (int)$this->gender->__toString();
    }

    /**
     * Getter for hobbys
     *
     * @return string
     */
    public function getHobbys()
    {
        return $this->hobbys;
    }

    /**
     * Returns the hobbys as an array
     *
     * @return array
     */
    public function getHobbysAsArray()
    {
        return explode(LF, $this->hobbys);
    }

    /**
     * Getter for job
     *
     * @return string
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Getter for lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Getter for managementPositions
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getManagementPositions()
    {
        return $this->managementPositions;
    }

    /**
     * Getter for managementReasons
     *
     * @return string
     */
    public function getManagementReasons()
    {
        return $this->managementReasons;
    }

    /**
     * Getter for memberSince
     *
     * @return string
     */
    public function getMemberSince()
    {
        return $this->memberSince;
    }

    /**
     * Getter for picture
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getPicture()
    {
        return $this->picture;
    }
}
