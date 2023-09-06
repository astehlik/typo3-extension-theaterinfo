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

use DateTime;
use Sto\Theaterinfo\Domain\Model\Enumeration\ActorType;
use Sto\Theaterinfo\Domain\Model\Enumeration\Gender;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * An actor / helper / sponsor.
 */
class Actor extends AbstractEntity
{
    protected ?DateTime $birthday = null;

    protected ?string $company = null;

    protected ?Role $favoriteRole = null;

    protected ?string $firstname = null;

    /**
     * The gender of the actor, can me 0 (male) or 1 (female).
     *
     * @var Gender
     */
    protected Gender $gender;

    protected ?string $hobbys;

    protected string $job;

    protected ?string $lastname = null;

    /**
     * @var ObjectStorage<ManagementMembership>
     */
    protected ObjectStorage $managementPositions;

    protected ?string $managementReasons = null;

    protected ?DateTime $memberSince = null;

    protected ?FileReference $picture = null;

    /**
     * @var ActorType
     */
    protected ActorType $type;

    public function __construct()
    {
        $this->managementPositions = new ObjectStorage();
    }

    /**
     * Returns the current age in years of the actor.
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

    public function getCompany(): string
    {
        return (string)$this->company;
    }

    public function getFavoriteRole(): ?Role
    {
        return $this->favoriteRole;
    }

    public function getFirstname(): string
    {
        return (string)$this->firstname;
    }

    /**
     * Builds the full name for the actor.
     */
    public function getFullName(): string
    {
        return trim($this->getFirstname() . ' ' . $this->getLastname());
    }

    /**
     * Returns the gender of this actor, can be 0 (male) or 1 (female).
     */
    public function getGender(): int
    {
        return (int)$this->gender->__toString();
    }

    public function getHobbys(): string
    {
        return (string)$this->hobbys;
    }

    public function getHobbysAsArray(): array
    {
        return explode(LF, $this->getHobbys());
    }

    public function getIsGenderFemale(): bool
    {
        return $this->gender->equals(Gender::FEMALE);
    }

    public function getJob(): string
    {
        return (string)$this->job;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @return ObjectStorage<ManagementMembership>
     */
    public function getManagementPositions(): ObjectStorage
    {
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

    public function getName(): string
    {
        if ($this->type->equals(ActorType::COMPANY)) {
            return $this->getCompany();
        }

        $nameParts = [
            $this->getLastname(),
            $this->getFirstname(),
        ];
        return implode(', ', array_filter($nameParts));
    }

    public function getPicture(): ?FileReference
    {
        return $this->picture;
    }

    public function getType(): ActorType
    {
        return $this->type;
    }
}
