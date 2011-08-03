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
 * @package Theaterinfo
 * @subpackage Controller
 * @version $Id:$
 */
class Tx_Theaterinfo_Controller_ManagementController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var Tx_Theaterinfo_Domain_Repository_ManagementMembershipRepository
	 */
	protected $managementMembershipRepository;

	/**
	 * Injects the management membership repository
	 *
	 * @param Tx_Theaterinfo_Domain_Repository_ManagementMembershipRepository $managementMembershipRepository
	 */
	public function injectManagementMembershipRepository(Tx_Theaterinfo_Domain_Repository_ManagementMembershipRepository $managementMembershipRepository) {
		$this->managementMembershipRepository = $managementMembershipRepository;
	}

	/**
	 * List action for this controller. Displays all plays
	 *
	 * @return string
	 */
	public function listAction() {
		$this->view->assign('managementMemberships', $this->managementMembershipRepository->findAll());
	}
}

?>
