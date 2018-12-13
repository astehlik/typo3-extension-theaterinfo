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

use Sto\Theaterinfo\Domain\Repository\ActorRepository;
use Sto\Theaterinfo\Domain\Repository\ManagementPositionRepository;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Frontend\ContentObject\Menu\AbstractMenuContentObject;

/**
 * Controller for displaying information about the management
 */
class ManagementController extends ActionController
{
    /**
     * @var ActorRepository
     */
    protected $actorRepository;

    /**
     * @var ManagementPositionRepository
     */
    protected $managementPositionRepository;

    public function injectActorRepository(ActorRepository $actorRepository)
    {
        $this->actorRepository = $actorRepository;
    }

    public function injectManagementPositionRepository(ManagementPositionRepository $managementPositionRepository)
    {
        $this->managementPositionRepository = $managementPositionRepository;
    }

    /**
     * Returns a string that will be appended to the breadcrumb menu
     *
     * @return string
     */
    public function breadcrumbMenuAction()
    {
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
            $breadcrumbMenu = '<li><strong>' . $actor->getFullName() . '</strong></li>';
        }

        return $breadcrumbMenu;
    }

    /**
     * Returns an updated version for the breadcrumb Menu array
     *
     * @return string
     */
    public function breadcrumbMenuArrayAction()
    {
        $frameworkConfig = $this->configurationManager->getConfiguration(
            ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK
        );
        /** @var AbstractMenuContentObject $parentMenuObject */
        $parentMenuObject = $frameworkConfig['parentMenuObject'];

        if ($this->requestIsActorDetailView()) {
            unset($parentMenuObject->mconf['CUR']);
        }

        return '';
    }

    /**
     * List action for this controller. Displays all plays
     */
    public function listAction()
    {
        $this->view->assign('managementPositions', $this->managementPositionRepository->findForList());
    }

    /**
     * Returns true if the current action is an actor detail view
     *
     * @return boolean
     */
    protected function requestIsActorDetailView()
    {
        $action = '';
        $controller = '';

        if ($this->request->hasArgument('action')) {
            $action = $this->request->getArgument('action');
        }
        if ($this->request->hasArgument('controller')) {
            $controller = $this->request->getArgument('controller');
        }

        if (($controller == 'Actor') && ($action == 'show')) {
            return true;
        } else {
            return false;
        }
    }
}
