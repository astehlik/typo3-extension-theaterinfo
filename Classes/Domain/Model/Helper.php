<?php
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

/**
 * Relation between helper an helpertype
 */
class Helper extends AbstractEntity
{

    /**
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sto\Theaterinfo\Domain\Model\Actor>
     */
    protected $actors;

    /**
     *
     * @var \Sto\Theaterinfo\Domain\Model\Helpertype
     */
    protected $helpertype;

    /**
     * @var \Sto\Theaterinfo\Domain\Model\Play
     */
    protected $play;

    /**
     * Constructor. Initializes all Tx_Extbase_Persistence_ObjectStorage instances.
     */
    public function __construct()
    {
        $this->actors = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
