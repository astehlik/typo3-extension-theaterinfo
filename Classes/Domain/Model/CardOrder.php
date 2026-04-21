<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\Domain\Model;

use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class CardOrder extends AbstractEntity
{
    /**
     * @Extbase\Validate("NotEmpty")
     */
    protected string $address = '';

    /**
     * @Extbase\Validate("NotEmpty")
     */
    protected string $city = '';

    /**
     * @Extbase\Validate("NotEmpty")
     * @Extbase\Validate("EmailAddress")
     */
    protected string $email = '';

    /**
     * @Extbase\Validate("NotEmpty")
     */
    protected string $firstname = '';

    /**
     * @Extbase\Validate("NotEmpty")
     */
    protected string $lastname = '';

    protected string $notes = '';

    /**
     * @var ObjectStorage<CardOrderRow>|null
     */
    protected ?ObjectStorage $rows;

    /**
     * @Extbase\Validate("NotEmpty")
     */
    protected string $zip = '';

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getFullName(): string
    {
        return $this->getFirstname() . ' ' . $this->getLastname();
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getNotes(): string
    {
        return $this->notes;
    }

    /**
     * @return ObjectStorage<CardOrderRow>
     */
    public function getRows(): ObjectStorage
    {
        return $this->rows ?? new ObjectStorage();
    }

    /**
     * @return ObjectStorage<CardOrderRow>
     */
    public function getRowsWithOrderedCards(): ObjectStorage
    {
        /** @var ObjectStorage<CardOrderRow> $rowsWithOrderedCards */
        $rowsWithOrderedCards = new ObjectStorage();
        foreach ($this->getRows() as $row) {
            if (!$row->hasOrderedCards()) {
                continue;
            }
            $rowsWithOrderedCards->attach($row);
        }
        return $rowsWithOrderedCards;
    }

    public function getTotalPrice(): float
    {
        $totalPrice = 0.0;
        foreach ($this->getRows() as $row) {
            $totalPrice += $row->getTotalPrice();
        }
        return $totalPrice;
    }

    public function getZip(): string
    {
        return $this->zip;
    }

    public function hasOrderedCards(): bool
    {
        foreach ($this->getRows() as $cardOrderRow) {
            if ($cardOrderRow->hasOrderedCards()) {
                return true;
            }
        }

        return false;
    }

    public function initializeObject(): void
    {
        $this->rows = new ObjectStorage();
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function setNotes(string $notes): void
    {
        $this->notes = $notes;
    }

    /**
     * @param ObjectStorage<CardOrderRow> $rows
     */
    public function setRows(ObjectStorage $rows): void
    {
        $this->rows = $rows;
    }

    public function setZip(string $zip): void
    {
        $this->zip = $zip;
    }
}
