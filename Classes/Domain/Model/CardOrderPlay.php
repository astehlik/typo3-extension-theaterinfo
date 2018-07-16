<?php
declare(strict_types=1);

namespace Sto\Theaterinfo\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class CardOrderPlay extends AbstractEntity
{
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sto\Theaterinfo\Domain\Model\CardOrderDate>
     */
    protected $dates;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $descriptionMail;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var double
     */
    protected $priceNormal;

    /**
     * @var string
     */
    protected $priceNormalDescription;

    /**
     * @var double
     */
    protected $priceReduced;

    /**
     * @var string
     */
    protected $priceReducedDescription;

    /**
     * @return CardOrderDate[]|\TYPO3\CMS\Extbase\Persistence\ObjectStorage
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
            function (CardOrderDate $cardOrderDate1, CardOrderDate $cardOrderDate2) {
                return $cardOrderDate1->getDateAndTime()->diff($cardOrderDate2->getDateAndTime())->invert === 1;
            }
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
