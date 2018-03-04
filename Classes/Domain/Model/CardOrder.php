<?php
declare(strict_types=1);

namespace Sto\Theaterinfo\Domain\Model;

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class CardOrder
{
    /**
     * @var string
     * @validate NotEmpty
     */
    protected $address = '';

    /**
     * @var string
     * @validate NotEmpty
     */
    protected $city = '';

    /**
     * @var string
     * @validate NotEmpty
     * @validate EmailAddress
     */
    protected $email = '';

    /**
     * @var string
     * @validate NotEmpty
     */
    protected $firstname = '';

    /**
     * @var string
     * @validate NotEmpty
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
     * @validate NotEmpty
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

    public function getZip(): string
    {
        return $this->zip;
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
