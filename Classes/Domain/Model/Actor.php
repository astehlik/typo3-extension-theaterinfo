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
 * An actor / helper / sponsor
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_Theaterinfo_Domain_Model_Actor extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * @var DateTime
	 */
	protected $birthday;

	/**
	 * @var Tx_Theaterinfo_Domain_Model_Role
	 */
	protected $favoriteRole;

	/**
	 * @var string
	 */
	protected $firstname;

	/**
	 * @var string
	 */
	protected $hobbys;

	/**
	 * @var string
	 */
	protected $job;

	/**
	 * @var string
	 */
	protected $lastname;

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Theaterinfo_Domain_Model_ManagementMembership>
	 */
	protected $managementPositions;

	/**
	 * @var string
	 */
	protected $managementReasons;

	/**
	 * @var DateTime
	 */
	protected $memberSince;

	/**
	 * @var string
	 */
	protected $picture;

	/**
	 * Getter for birthday
	 *
	 * @return DateTime
	 */
	public function getBirthday() {
		return $this->birthday;
	}

	/**
	 * Getter for favoriteRole
	 *
	 * @return Tx_Theaterinfo_Domain_Model_Role
	 */
	public function getFavoriteRole() {
		return $this->favoriteRole;
	}

	/**
	 * Getter for firstname
	 *
	 * @return string
	 */
	public function getFirstname() {
		return $this->firstname;
	}

	/**
	 * Builds the full name for the actor
	 *
	 * @return string
	 */
	public function getFullName() {
		return $this->firstname . ' ' . $this->lastname;
	}

	/**
	 * Getter for hobbys
	 *
	 * @return string
	 */
	public function getHobbys() {
		return $this->hobbys;
	}

	/**
	 * Returns the hobbys as an array
	 *
	 * @return array
	 */
	public function getHobbysAsArray() {
		return explode(LF, $this->hobbys);
	}

	/**
	 * Getter for job
	 *
	 * @return string
	 */
	public function getJob() {
		return $this->job;
	}

	/**
	 * Getter for lastname
	 *
	 * @return string
	 */
	public function getLastname() {
		return $this->lastname;
	}

	/**
	 * Getter for managementPositions
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getManagementPositions() {
		return $this->managementPositions;
	}

	/**
	 * Getter for managementReasons
	 *
	 * @return string
	 */
	public function getManagementReasons() {
		return $this->managementReasons;
	}

	/**
	 * Getter for memberSince
	 *
	 * @return string
	 */
	public function getMemberSince() {
		return $this->memberSince;
	}

	/**
	 * Getter for picture
	 *
	 * @return string
	 */
	public function getPicture() {
		return $this->picture;
	}
}
?>