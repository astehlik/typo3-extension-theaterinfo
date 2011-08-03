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
 * Membership in the management
 *
 * @package Theaterinfo
 * @subpackage Domain\Model
 * @version $Id:$
 */
class Tx_Theaterinfo_Domain_Model_ManagementMembership extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * @var Tx_Theaterinfo_Domain_Model_Actor
	 */
	protected $actor;

	/**
	 * @var DateTime
	 */
	protected $enddate;

	/**
	 * @var DateTime
	 */
	protected $startdate;

	/**
	 * @var string
	 */
	protected $type;

	/**
	 * Getter for actor
	 *
	 * @return Tx_Theaterinfo_Domain_Model_Actor
	 */
	public function getActor() {
		return $this->actor;
	}

	/**
	 * Getter for enddate
	 *
	 * @return DateTime
	 */
	public function getEnddate() {
		return $this->enddate;
	}

	/**
	 * Getter for startdate
	 *
	 * @return DateTime
	 */
	public function getStartdate() {
		return $this->startdate;
	}

	/**
	 * Getter for type
	 *
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}
}
?>