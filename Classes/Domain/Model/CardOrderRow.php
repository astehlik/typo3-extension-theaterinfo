<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\Domain\Model;

use DateTime;
use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class CardOrderRow extends AbstractEntity
{
    protected int $amountNormal = 0;

    protected int $amountReduced = 0;

    /**
     * @Extbase\Validate("NotEmpty")
     */
    protected CardOrderDate $playDate;

    public function getAmountNormal(): int
    {
        return $this->amountNormal;
    }

    public function getAmountReduced(): int
    {
        return $this->amountReduced;
    }

    public function getPlayDate(): CardOrderDate
    {
        return $this->playDate;
    }

    public function getPlayDateDateAndTime(): DateTime
    {
        return $this->playDate->getDateAndTime();
    }

    public function getPlayDateDescriptionForEmail(): string
    {
        return $this->playDate->getDescriptionMail();
    }

    public function getPlayDescriptionForEmail(): string
    {
        return $this->playDate->getPlayDescriptionForEmail();
    }

    public function getPriceNormal(): float
    {
        return $this->playDate->getPriceNormal();
    }

    public function getPriceReduced(): float
    {
        return $this->playDate->getPriceReduced();
    }

    public function getTotalPrice(): float
    {
        $total = $this->getTotalPriceNormal();
        $total += $this->getTotalPriceReduced();
        return $total;
    }

    public function getTotalPriceNormal(): float
    {
        return $this->amountNormal * $this->getPriceNormal();
    }

    public function getTotalPriceReduced(): float
    {
        return $this->amountReduced * $this->getPriceReduced();
    }

    public function hasOrderedCards(): bool
    {
        if ($this->amountNormal > 0) {
            return true;
        }
        if ($this->amountReduced > 0) {
            return true;
        }

        return false;
    }

    public function setAmountNormal(?int $amountNormal): void
    {
        $this->amountNormal = (int)$amountNormal;
    }

    public function setAmountReduced(?int $amountReduced): void
    {
        $this->amountReduced = (int)$amountReduced;
    }

    public function setPlayDate(CardOrderDate $playDate): void
    {
        $this->playDate = $playDate;
    }
}
