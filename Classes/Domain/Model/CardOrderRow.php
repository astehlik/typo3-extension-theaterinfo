<?php
declare(strict_types=1);

namespace Sto\Theaterinfo\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class CardOrderRow extends AbstractEntity
{
    /**
     * @var integer
     */
    protected $amountNormal = 0;

    /**
     * @var integer
     */
    protected $amountReduced = 0;

    /**
     * @var \Sto\Theaterinfo\Domain\Model\CardOrderDate
     * @validate NotEmpty
     */
    protected $playDate;

    /**
     * @param int $amountNormal
     */
    public function setAmountNormal($amountNormal)
    {
        $this->amountNormal = (int)$amountNormal;
    }

    /**
     * @param int $amountReduced
     */
    public function setAmountReduced($amountReduced)
    {
        $this->amountReduced = (int)$amountReduced;
    }

    /**
     * @param \Sto\Theaterinfo\Domain\Model\CardOrderDate $playDate
     */
    public function setPlayDate(CardOrderDate $playDate)
    {
        $this->playDate = $playDate;
    }
}
