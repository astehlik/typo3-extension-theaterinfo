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
 * Repository for management positions
 */
class ManagementPositionRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	public function initializeObject() {
		$this->setDefaultOrderings(array(
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		));
	}

	public function findForList() {
		return $this->findByShowInOverview(TRUE);
	}
}
?>