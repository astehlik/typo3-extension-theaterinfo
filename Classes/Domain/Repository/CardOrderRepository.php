<?php
declare(strict_types=1);

namespace Sto\Theaterinfo\Domain\Repository;

use Sto\Theaterinfo\Domain\Model\CardOrder;
use TYPO3\CMS\Extbase\Persistence\Repository;

class CardOrderRepository extends Repository
{
    public function addAndPersist(CardOrder $cardOrder)
    {
        $this->add($cardOrder);
        $this->persistenceManager->persistAll();
    }
}
