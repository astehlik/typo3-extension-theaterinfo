<?php

/***************************************************************
*  Copyright notice
*
*  (c) 2009 Jochen Rau <jochen.rau@typoplanet.de>
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
 * The posts controller for the Blog package
 *
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 */
class Tx_Theaterinfo_Controller_PlayController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var Tx_Theaterinfo_Domain_Repository_PlayRepository
	 */
	protected $playRepository;

	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	public function initializeAction() {
		$this->playRepository = t3lib_div::makeInstance('Tx_Theaterinfo_Domain_Repository_PlayRepository');
	}

	/**
	 * List action for this controller. Displays all plays
	 *
	 * @return string
	 */
	public function indexAction() {		
		$this->view->assign('plays', $this->playRepository->findAll());
	}

	/**
	 * Action that displays one single play
	 *
	 * @param Tx_Theaterinfo_Domain_Model_Play $play The play to display
	 * @return string The rendered view
	 */
	public function showAction(Tx_Theaterinfo_Domain_Model_Play $play) {
		$this->view->assign('play', $play);
	}
}

?>
