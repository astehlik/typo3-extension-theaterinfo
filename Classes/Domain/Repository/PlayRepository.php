<?php
namespace Sto\Theaterinfo\Domain\Repository;

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
 * Repository for plays
 */
class PlayRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * Constructs a new Repository
	 *
	 * @param \TYPO3\CMS\Extbase\Object\ObjectManagerInterface $objectManager
	 */
	public function __construct(\TYPO3\CMS\Extbase\Object\ObjectManagerInterface $objectManager) {
		parent::__construct($objectManager);
		$this->setDefaultOrderings(array('timeSort' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
	}
}
?>