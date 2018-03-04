<?php
declare(strict_types=1);

namespace Sto\Theaterinfo\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class CardOrderDate extends AbstractEntity
{
    /**
     * @var \DateTime
     */
    protected $dateAndTime;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $location;

    public function getDateAndTime(): \DateTime
    {
        return $this->dateAndTime;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getLocation(): string
    {
        return $this->location;
    }
}
