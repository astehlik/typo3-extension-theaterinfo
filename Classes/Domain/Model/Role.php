<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 extension "theaterinfo".              *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * A role in a play.
 */
class Role extends AbstractEntity
{
    /**
     * @var ObjectStorage<Actor>
     */
    protected ObjectStorage $actors;

    protected ?string $name = null;

    public function __construct()
    {
        $this->actors = new ObjectStorage();
    }

    /**
     * @return ObjectStorage<Actor>
     */
    public function getActors(): ObjectStorage
    {
        return $this->actors;
    }

    public function getName(): string
    {
        return (string)$this->name;
    }
}
