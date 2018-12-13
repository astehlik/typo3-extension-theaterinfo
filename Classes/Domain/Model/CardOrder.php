<?php
declare(strict_types=1);

namespace Sto\Theaterinfo\Domain\Model;

use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class CardOrder extends AbstractEntity
{
    /**
     * @var string
     * @Extbase\Validate("NotEmpty")
     */
    protected $address = '';

    /**
     * @var string
     * @Extbase\Validate("NotEmpty")
     */
    protected $city = '';

    /**
     * @var string
     * @Extbase\Validate("NotEmpty")
     * @Extbase\Validate("EmailAddress")
     */
    protected $email = '';

    /**
     * @var string
     * @Extbase\Validate("NotEmpty")
     */
    protected $firstname = '';

    /**
     * @var string
     * @Extbase\Validate("NotEmpty")
     */
    protected $lastname = '';

    /**
     * @var string
     */
    protected $notes = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sto\Theaterinfo\Domain\Model\CardOrderRow>
     */
    protected $rows;

    /**
     * @var string
     * @Extbase\Validate("NotEmpty")
     */
    protected $zip = '';

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

    public function getFullName()
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
     * @return CardOrderRow[]|\TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getRows(): ObjectStorage
    {
        return $this->rows;
    }

    /**
     * @return CardOrderRow[]|\TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getRowsWithOrderedCards(): ObjectStorage
    {
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

    /**
     * @param string $address
     */
    public function setAddress(string $address)
    {
        $this->address = $address;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city)
    {
        $this->city = $city;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @param string $notes
     */
    public function setNotes(string $notes)
    {
        $this->notes = $notes;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sto\Theaterinfo\Domain\Model\CardOrderRow> $rows
     */
    public function setRows(ObjectStorage $rows)
    {
        $this->rows = $rows;
    }

    /**
     * @param string $zip
     */
    public function setZip(string $zip)
    {
        $this->zip = $zip;
    }
}
