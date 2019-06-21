<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */

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

use Sto\Theaterinfo\Domain\Model\Enumeration\Gender;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use DateTime;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

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
    public function getAge(): ?int
    {
        $birthday = $this->getBirthday();

        if (!isset($birthday)) {
            return null;
        }

        $now = new DateTime();
        $age = $birthday->diff($now);
        return $age->y;
    }

    public function getBirthday(): ?DateTime
    {
        return $this->birthday;
    }

    public function getFavoriteRole(): ?Role
    {
        return $this->favoriteRole;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * Builds the full name for the actor
     *
     * @return string
     */
    public function getFullName(): string
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

    public function getHobbys(): string
    {
        return $this->hobbys;
    }

    public function getHobbysAsArray(): array
    {
        return explode(LF, $this->hobbys);
    }

    public function getIsGenderFemale(): bool
    {
        return $this->gender->equals(Gender::FEMALE);
    }

    public function getJob(): string
    {
        return $this->job;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @return ObjectStorage|ManagementPosition[]
     */
    public function getManagementPositions(): ObjectStorage
    {
        if (!$this->managementPositions) {
            $this->managementPositions = new ObjectStorage();
        }
        return $this->managementPositions;
    }

    public function getManagementReasons(): string
    {
        return (string)$this->managementReasons;
    }

    public function getMemberSince(): ?DateTime
    {
        return $this->memberSince;
    }

    public function getPicture(): ?FileReference
    {
        return $this->picture;
    }
}
