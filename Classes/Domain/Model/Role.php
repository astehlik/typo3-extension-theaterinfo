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

/**
 * A role in a play
 */
class Role extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name;

	/**
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sto\Theaterinfo\Domain\Model\Actor>
	 */
	protected $actors;


	/**
	 * Constructor. Initializes all Tx_Extbase_Persistence_ObjectStorage instances.
	 */
	public function __construct() {
		$this->actors = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Getter for name
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	public function getActors() {
		return $this->actors;
	}


}

?>