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

use DateTime;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * A play performed by the theater group.
 */
class Play extends AbstractEntity
{
    protected ?string $action = null;

    protected ?string $author = null;

    /**
     * @var ObjectStorage<Helper>
     */
    protected ObjectStorage $helpers;

    /**
     * @var bool TRUE if helpers should not be shown
     */
    protected bool $hideHelpers;

    /**
     * @var bool TRUE if helpers should not be shown
     */
    protected bool $hideRoles;

    protected ?FileReference $logo = null;

    /**
     * @var ObjectStorage<FileReference>
     */
    protected ObjectStorage $pictures;

    /**
     * @var ObjectStorage<Role>
     */
    protected ObjectStorage $roles;

    protected string $state;

    protected ?string $teaser = null;

    protected ?string $timeDisplay = null;

    protected ?DateTime $timeSort = null;

    protected ?string $title = null;

    public function __construct()
    {
        $this->roles = new ObjectStorage();
        $this->helpers = new ObjectStorage();
    }

    public function getAction(): string
    {
        return (string)$this->action;
    }

    public function getAuthor(): string
    {
        return (string)$this->author;
    }

    /**
     * Returns all helpers of this play.
     *
     * @return ObjectStorage<Helper
     */
    public function getHelpers(): ObjectStorage
    {
        return $this->helpers;
    }

    /**
     * Getter for the logo file.
     */
    public function getLogo(): ?FileReference
    {
        return $this->logo;
    }

    /**
     * Getter for the pictures of this play.
     *
     * @return ObjectStorage<FileReference>
     */
    public function getPictures(): ObjectStorage
    {
        return $this->pictures;
    }

    /**
     * Returns all roles in this play.
     *
     * @return ObjectStorage<Role>
     */
    public function getRoles(): ObjectStorage
    {
        return $this->roles;
    }

    /**
     * Returns TRUE if the helpers should be displayed.
     */
    public function getShowHelpers(): bool
    {
        if ($this->hideHelpers) {
            return false;
        }

        return $this->getHelpers()->count() > 0;
    }

    /**
     * Returns TRUE if the roles should be displayed.
     */
    public function getShowRoles(): bool
    {
        if ($this->hideRoles) {
            return false;
        }

        return $this->getRoles()->count() > 0;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getTeaser(): string
    {
        return (string)$this->teaser;
    }

    public function getTimeDisplay(): string
    {
        return (string)$this->timeDisplay;
    }

    public function getTimeSort(): ?DateTime
    {
        return $this->timeSort;
    }

    public function getTitle(): string
    {
        return (string)$this->title;
    }
}
