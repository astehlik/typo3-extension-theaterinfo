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

    /**
     * @var \Sto\Theaterinfo\Domain\Model\CardOrderPlay
     */
    protected $parentPlay;

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

    public function getPlayDescriptionForEmail(): string
    {
        return $this->parentPlay->getDescriptionMail();
    }

    public function getPriceNormal(): float
    {
        return $this->parentPlay->getPriceNormal();
    }

    #
    public function getPriceReduced(): float
    {
        return $this->parentPlay->getPriceReduced();
    }
}
