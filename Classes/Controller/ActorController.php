<?php
namespace Sto\Theaterinfo\Controller;

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
 * Controller for displaying actor information
 */
class ActorController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * Shows the details of a single actor
	 *
	 * @param \Sto\Theaterinfo\Domain\Model\Actor $actor
	 * @return string
	 */
	public function showAction($actor) {
		$this->view->assign('actor', $actor);
	}
}

?>