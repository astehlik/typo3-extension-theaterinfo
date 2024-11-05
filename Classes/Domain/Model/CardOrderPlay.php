<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class CardOrderPlay extends AbstractEntity
{
    /**
     * @var ObjectStorage<CardOrderDate>
     */
    protected ObjectStorage $dates;

    protected string $description;

    protected string $descriptionMail;

    protected string $label;

    protected float $priceNormal;

    protected string $priceNormalDescription;

    protected float $priceReduced;

    protected string $priceReducedDescription;

    /**
     * @return ObjectStorage<CardOrderDate>
     */
    public function getDates(): ObjectStorage
    {
        return $this->dates;
    }

    public function getDatesOrdered(): array
    {
        $dates = $this->getDates()->toArray();
        usort(
            $dates,
            static function (CardOrderDate $cardOrderDate1, CardOrderDate $cardOrderDate2) {
                return $cardOrderDate1->getDateAndTime() <=> $cardOrderDate2->getDateAndTime();
            },
        );
        return $dates;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getDescriptionMail(): string
    {
        return $this->descriptionMail;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getPriceNormal(): float
    {
        return $this->priceNormal;
    }

    public function getPriceNormalDescription(): string
    {
        return $this->priceNormalDescription;
    }

    public function getPriceReduced(): float
    {
        return $this->priceReduced;
    }

    public function getPriceReducedDescription(): string
    {
        return $this->priceReducedDescription;
    }
}
