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
 * Relation between helper an helpertype
 */
class Helper extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * @var \Sto\Theaterinfo\Domain\Model\Play
	 */
	protected $play;

	/**
	 *
	 * @var \Sto\Theaterinfo\Domain\Model\Helpertype
	 */
	protected $helpertype;

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

	public function getHelpertype() {
		return $this->helpertype;
	}

	public function getActors() {
		return $this->actors;
	}
}

?>