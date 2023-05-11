<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\Domain\Repository;

use Sto\Theaterinfo\Domain\Model\CardOrderPlay;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * @method CardOrderPlay[]|QueryResultInterface findAll()
 */
class CardOrderPlayRepository extends Repository
{
}
