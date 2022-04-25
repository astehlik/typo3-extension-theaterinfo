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

use Sto\Theaterinfo\Domain\Model\Play;
use Sto\Theaterinfo\Domain\Repository\PlayRepository;
use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Controller for displaying play information
 */
class PlayController extends ActionController
{
    protected PlayRepository $playRepository;

    public function injectPlayRepository(PlayRepository $playRepository)
    {
        $this->playRepository = $playRepository;
    }

    /**
     * List action for this controller. Displays all plays
     */
    public function listAction()
    {
        $contentObject = $this->configurationManager->getContentObject();
        $header = $contentObject->data['header'];

        $this->view->assign('header', $header);
        $this->view->assign('plays', $this->playRepository->findAll());
    }

    /**
     * Action that displays one single play
     *
     * @param Play $play The play to display
     * @Extbase\IgnoreValidation("play")
     */
    public function showAction(Play $play)
    {
        $this->view->assign('play', $play);
    }
}
