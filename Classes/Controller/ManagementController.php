<?php

declare(strict_types=1);

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

use Psr\Http\Message\ResponseInterface;
use Sto\Theaterinfo\Domain\Repository\ActorRepository;
use Sto\Theaterinfo\Domain\Repository\ManagementPositionRepository;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Frontend\ContentObject\Menu\AbstractMenuContentObject;

/**
 * Controller for displaying information about the management.
 */
class ManagementController extends ActionController
{
    protected ActorRepository $actorRepository;

    protected ManagementPositionRepository $managementPositionRepository;

    /**
     * Returns a string that will be appended to the breadcrumb menu.
     */
    public function breadcrumbMenuAction(): ResponseInterface
    {
        $response = $this->htmlResponse();

        if (!$this->requestIsActorDetailView()) {
            return $response;
        }

        if (!$this->request->hasArgument('actor')) {
            return $response;
        }

        $actorUid = $this->request->getArgument('actor');
        $actor = $this->actorRepository->findByUid($actorUid);

        if (!isset($actor)) {
            return $response;
        }

        return $this->htmlResponse('<li><strong>' . $actor->getFullName() . '</strong></li>');
    }

    /**
     * Returns an updated version for the breadcrumb Menu array.
     */
    public function breadcrumbMenuArrayAction(): ResponseInterface
    {
        $frameworkConfig = $this->configurationManager->getConfiguration(
            ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK
        );

        /** @var AbstractMenuContentObject $parentMenuObject */
        $parentMenuObject = $frameworkConfig['parentMenuObject'];

        if ($this->requestIsActorDetailView()) {
            // TODO: we need a different solution here for TYPO3 10!
            // unset($parentMenuObject->mconf['CUR']);
        }

        return $this->htmlResponse('');
    }

    public function injectActorRepository(ActorRepository $actorRepository): void
    {
        $this->actorRepository = $actorRepository;
    }

    public function injectManagementPositionRepository(ManagementPositionRepository $managementPositionRepository): void
    {
        $this->managementPositionRepository = $managementPositionRepository;
    }

    /**
     * List action for this controller. Displays all plays.
     */
    public function listAction(): ResponseInterface
    {
        $this->view->assign('managementPositions', $this->managementPositionRepository->findForList());

        return $this->htmlResponse();
    }

    /**
     * Returns true if the current action is an actor detail view.
     */
    protected function requestIsActorDetailView(): bool
    {
        $action = '';
        $controller = '';

        if ($this->request->hasArgument('action')) {
            $action = $this->request->getArgument('action');
        }
        if ($this->request->hasArgument('controller')) {
            $controller = $this->request->getArgument('controller');
        }

        if (($controller === 'Actor') && ($action === 'show')) {
            return true;
        }
        return false;
    }
}
