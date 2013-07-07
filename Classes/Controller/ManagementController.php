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
	 * @var Tx_Theaterinfo_Domain_Repository_ActorRepository
	 * @inject
	 */
	protected $actorRepository;

	/**
	 * @var \Sto\Theaterinfo\Domain\Repository\ManagementPositionRepository
	 * @inject
	 */
	protected $managementPositionRepository;

	/**
	 * List action for this controller. Displays all plays
	 *
	 * @return string
	 */
	public function listAction() {
		$this->view->assign('managementPositions', $this->managementPositionRepository->findForList());
	}

	/**
	 * Returns a string that will be appended to the breadcrumb menu
	 *
	 * @return string
	 */
	public function breadcrumbMenuAction() {

		$breadcrumbMenu = '';

		if (!$this->requestIsActorDetailView()) {
			return $breadcrumbMenu;
		}

		if (!$this->request->hasArgument('actor')) {
			return $breadcrumbMenu;
		}

		$actorUid = $this->request->getArgument('actor');
		$actor = $this->actorRepository->findByUid($actorUid);

		if (isset($actor)) {
			$breadcrumbMenu =  '<li><strong>' . $actor->getFullName() . '</strong></li>';
		}

		return $breadcrumbMenu;
	}

	/**
	 * Returns an updated version for the breadcrumb Menu array
	 *
	 * @return string
	 */
	public function breadcrumbMenuArrayAction() {
		$frameworkConfig = $this->configurationManager->getConfiguration(Tx_Extbase_Configuration_ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
		$parentMenuObject = $frameworkConfig['parentMenuObject'];

		if ($this->requestIsActorDetailView()) {
			unset($parentMenuObject->mconf['CUR']);
		}

		return '';
	}

	/**
	 * Returns true if the current action is an actor detail view
	 *
	 * @return boolean
	 */
	protected function requestIsActorDetailView() {
		$action = '';
		$controller = '';

		if ($this->request->hasArgument('action')) {
			$action = $this->request->getArgument('action');
		}
		if ($this->request->hasArgument('controller')) {
			$controller = $this->request->getArgument('controller');
		}

		if (($controller == 'Actor') && ($action == 'show')) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

?>
