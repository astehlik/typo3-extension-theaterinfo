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
class Play extends AbstractEntity {

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
	 *
	 * @var string
	 */
	protected $logo;

	/**
	 *
	 * @var string
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
	public function __construct() {
		$this->roles = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->helpers = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	public function getTitle() {
		return $this->title;
	}

	public function getAction() {
		return $this->action;
	}

	public function getAuthor() {
		return $this->author;
	}

	/**
	 * Returns all roles in this play
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getRoles() {

		if (!isset($this->roles)) {
			return new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		} else {
			return $this->roles;
		}
	}

	/**
	 * Returns all helpers of this play
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getHelpers() {

		if (!isset($this->helpers)) {
			return new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		} else {
			return $this->helpers;
		}
	}

	/**
	 * Getter for the logo file
	 *
	 * @return string
	 */
	public function getLogo() {
		if (strlen(trim($this->logo))) {
			$folder = $GLOBALS['TCA']['tx_theaterinfo_domain_model_play']['columns']['logo']['config']['uploadfolder'];
			return $folder . $this->logo;
		} else {
			return '';
		}
	}

	/**
	 * Getter for the pictures of this play
	 *
	 * @return array
	 */
	public function getPictures() {

		$folder = $GLOBALS['TCA']['tx_theaterinfo_domain_model_play']['columns']['pictures']['config']['uploadfolder'];
		$pictures = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $this->pictures);

		$picturesWithPath = array();
		if (strlen($pictures[0])) {
			foreach ($pictures as $picture) {
				$picturesWithPath[] = $folder . $picture;
			}
		}

		return $picturesWithPath;
	}

	/**
	 * Returns TRUE if the helpers should be displayed
	 *
	 * @return boolean
	 */
	public function getShowHelpers() {

		if ($this->hideHelpers) {
			return FALSE;
		}

		$helpers = $this->getHelpers();
		if ($helpers->count()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/**
	 * Returns TRUE if the roles should be displayed
	 *
	 * @return boolean
	 */
	public function getShowRoles() {
		if ($this->hideRoles) {
			return FALSE;
		}

		$roles = $this->getRoles();
		if ($roles->count()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/**
	 * @return string
	 */
	public function getTeaser() {
		return $this->teaser;
	}

	/**
	 * Getter for the state of the play
	 *
	 * @return string
	 */
	public function getState() {
		return $this->state;
	}

	/**
	 * Getter for the time
	 *
	 * @return string
	 */
	public function getTimeDisplay() {
		return $this->timeDisplay;
	}

	/**
	 * Getter for the sort time
	 *
	 * @return string
	 */
	public function getTimeSort() {
		return $this->timeSort;
	}
}