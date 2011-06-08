<?php
/***************************************************************
*  Copyright notice
*
*  (c)  TODO - INSERT COPYRIGHT
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * A play performed by the theater group
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */


class Tx_Theaterinfo_Domain_Model_Play extends Tx_Extbase_DomainObject_AbstractEntity {

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
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Theaterinfo_Domain_Model_Helper>
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
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Theaterinfo_Domain_Model_Role>
	 */
	protected $roles;

	/**
	 *
	 * @var string
	 */
	protected $state;

	/**
	 *
	 * @var string
	 */
	protected $timeDisplay;

	/**
	 *
	 * @var DateTime
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
		$this->roles = new Tx_Extbase_Persistence_ObjectStorage();
		$this->helpers = new Tx_Extbase_Persistence_ObjectStorage();
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
	 * @return Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getRoles() {

		if (!isset($this->roles)) {
			return new Tx_Extbase_Persistence_ObjectStorage();
		} else {
			return $this->roles;
		}
	}

	/**
	 * Returns all helpers of this play
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getHelpers() {

		if (!isset($this->helpers)) {
			return new Tx_Extbase_Persistence_ObjectStorage();
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
			t3lib_div::loadTCA('tx_theaterinfo_domain_model_play');
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

		t3lib_div::loadTCA('tx_theaterinfo_domain_model_play');
		$folder = $GLOBALS['TCA']['tx_theaterinfo_domain_model_play']['columns']['pictures']['config']['uploadfolder'];
		$pictures = t3lib_div::trimExplode(',', $this->pictures);

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
?>