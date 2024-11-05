<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\Domain\Repository;

use Sto\Theaterinfo\Domain\Model\CardOrder;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * @extends Repository<CardOrder>
 */
class CardOrderRepository extends Repository
{
    public function addAndPersist(CardOrder $cardOrder): void
    {
        $this->add($cardOrder);
        $this->persistenceManager->persistAll();
    }
}
