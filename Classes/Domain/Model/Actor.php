<?php
/*                                                                        *
 * This script belongs to the TYPO3 extension "theaterinfo".              *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License as published by the Free   *
 * Software Foundation, either version 3 of the License, or (at your      *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General      *
 * Public License for more details.                                       *
 *                                                                        *
 * You should have received a copy of the GNU General Public License      *
 * along with the script.                                                 *
 * If not, see http://www.gnu.org/licenses/gpl.html                       *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * An actor / helper / sponsor
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_Theaterinfo_Domain_Model_Actor extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

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
     * The gender of the actor, can me 0 (male) or 1 (female)
     *
     * @var string
     */
    protected $gender;

    /**
     * Returns the current age in years of the actor
     *
     * @return int
     */
    public function getAge() {
        $birthday = $this->getBirthday();

		if (!isset($birthday)) {
			return null;
		}

		$now = new DateTime();
        $age = $birthday->diff($now);
        return $age->y;
    }

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
     * Returns the gender of this actor, can me 0 (male) or 1 (female)
     *
     * @return int
     */
    public function getGender() {
        return $this->gender;
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