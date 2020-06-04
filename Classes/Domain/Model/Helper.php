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

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Relation between helper an helpertype
 */
class Helper extends AbstractEntity
{
    /**
     *
     * @var ObjectStorage<Actor>
     */
    protected $actors;

    /**
     *
     * @var Helpertype
     */
    protected $helpertype;

    /**
     * @var Play
     */
    protected $play;

    public function __construct()
    {
        $this->actors = new ObjectStorage();
    }

    public function getActors()
    {
        return $this->actors;
    }

    public function getHelpertype()
    {
        return $this->helpertype;
    }
}
