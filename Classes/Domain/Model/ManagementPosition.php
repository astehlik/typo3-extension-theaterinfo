<?php
namespace Sto\Theaterinfo\Domain\Model;
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
 * A management position
 */
class ManagementPosition extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * The name of the position
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * The name of the position for female members
	 *
	 * @var string
	 */
	protected $nameFemale;

	/**
	 * The sorting for this position
	 *
	 * @var int
	 */
	protected $sorting;

	/**
	 * All memberships of this posision
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sto\Theaterinfo\Domain\Model\ManagementMembership>
	 */
	protected $memberships;

	public function getCurrentMembership() {
		$memberships = $this->getMemberships();
		if ($memberships->count()) {
			$memberships->rewind();
			return $memberships->current();
		}
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getMemberships() {
		return $this->memberships;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $memberships
	 */
	public function setMemberships($memberships) {
		$this->memberships = $memberships;
	}

	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}
}
?>