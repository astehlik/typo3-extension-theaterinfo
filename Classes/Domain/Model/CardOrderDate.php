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
    protected $descriptionMail;

    /**
     * @var bool
     */
    protected $isSoldOut;

    /**
     * @var CardOrderPlay
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

    public function getDescriptionMail(): string
    {
        return $this->descriptionMail;
    }

    public function getIsSoldOut(): bool
    {
        return $this->isSoldOut;
    }

    public function getPlayDescriptionForEmail(): string
    {
        return $this->parentPlay->getDescriptionMail();
    }

    public function getPriceNormal(): float
    {
        return $this->parentPlay->getPriceNormal();
    }

    public function getPriceReduced(): float
    {
        return $this->parentPlay->getPriceReduced();
    }
}
