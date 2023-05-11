<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\Domain\Repository;

/*                                                                        *
 * This script belongs to the TYPO3 extension "theaterinfo".              *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Repository for management positions.
 *
 * @method QueryResultInterface findByShowInOverview($showInOverview) Returns all positions where showInOverview
 *                                                                    is true.
 */
class ManagementPositionRepository extends Repository
{
    /**
     * Finds all management positions that should be displayed in the list.
     */
    public function findForList(): QueryResultInterface
    {
        return $this->findByShowInOverview(true);
    }

    /**
     * Initializes the default orderings.
     */
    public function initializeObject(): void
    {
        $this->setDefaultOrderings(
            [
                'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            ]
        );
    }
}
