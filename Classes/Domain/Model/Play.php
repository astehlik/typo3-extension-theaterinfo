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
 * A play performed by the theater group
 */
class Play extends AbstractEntity
{
    /**
     *
     * @var string
     */
    protected $action;

    /**
     *
     * @var string
     */
    protected $author;

    /**
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sto\Theaterinfo\Domain\Model\Helper>
     */
    protected $helpers;

    /**
     * @var boolean TRUE if helpers should not be shown
     */
    protected $hideHelpers;

    /**
     * @var boolean TRUE if helpers should not be shown
     */
    protected $hideRoles;

    /**
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $logo;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $pictures;

    /**
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sto\Theaterinfo\Domain\Model\Role>
     */
    protected $roles;

    /**
     *
     * @var string
     */
    protected $state;

    /**
     * @var string
     */
    protected $teaser;

    /**
     *
     * @var string
     */
    protected $timeDisplay;

    /**
     *
     * @var \DateTime
     */
    protected $timeSort;

    /**
     *
     * @var string
     */
    protected $title;


    /**
     * Constructor. Initializes all Tx_Extbase_Persistence_ObjectStorage instances.
     */
    public function __construct()
    {
        $this->roles = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->helpers = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Returns all helpers of this play
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getHelpers()
    {

        if (!isset($this->helpers)) {
            return new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        } else {
            return $this->helpers;
        }
    }

    /**
     * Getter for the logo file
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Getter for the pictures of this play
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference[]
     */
    public function getPictures()
    {

        return $this->pictures;
    }

    /**
     * Returns all roles in this play
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getRoles()
    {

        if (!isset($this->roles)) {
            return new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        } else {
            return $this->roles;
        }
    }

    /**
     * Returns TRUE if the helpers should be displayed
     *
     * @return boolean
     */
    public function getShowHelpers()
    {

        if ($this->hideHelpers) {
            return false;
        }

        $helpers = $this->getHelpers();
        if ($helpers->count()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Returns TRUE if the roles should be displayed
     *
     * @return boolean
     */
    public function getShowRoles()
    {
        if ($this->hideRoles) {
            return false;
        }

        $roles = $this->getRoles();
        if ($roles->count()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Getter for the state of the play
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * Getter for the time
     *
     * @return string
     */
    public function getTimeDisplay()
    {
        return $this->timeDisplay;
    }

    /**
     * Getter for the sort time
     *
     * @return string
     */
    public function getTimeSort()
    {
        return $this->timeSort;
    }

    public function getTitle()
    {
        return $this->title;
    }
}