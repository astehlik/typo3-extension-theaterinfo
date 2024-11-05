<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\Hooks;

/*                                                                        *
 * This script belongs to the TYPO3 extension "theaterinfo".              *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use Sto\Theaterinfo\Domain\Model\Enumeration\ActorType;

/**
 * Hooks for record title display in the Backend.
 */
class RecordTitleHooks
{
    public function getActorTitle(array &$params): void
    {
        $table = $params['table'];

        if ($table !== 'tx_theaterinfo_domain_model_actor') {
            return;
        }

        if (!isset($params['row']['type'])) {
            return;
        }

        $row = $params['row'];

        $type = $this->getType($row['type']);

        $title = match ($type) {
            ActorType::PERSON => $this->buildPersonName($row),
            ActorType::COMPANY => $row['company'],
            default => '',
        };

        if ($title === '') {
            return;
        }

        $params['title'] = $title;
    }

    protected function buildPersonName(array $row): string
    {
        $nameParts = [
            $row['lastname'],
            $row['firstname'],
        ];

        return implode(', ', array_filter($nameParts));
    }

    protected function getType(mixed $type): ?ActorType
    {
        $type = is_array($type) ? array_pop($type) : $type;

        if ($type === null) {
            return null;
        }

        return ActorType::tryFrom((int)$type);
    }
}
