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

use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Repository for plays.
 */
class PlayRepository extends Repository
{
    /**
     * Initializes the default orderings.
     */
    public function initializeObject(): void
    {
        $this->setDefaultOrderings(
            [
                'timeSort' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
            ]
        );
    }
}
