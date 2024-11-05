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
use Sto\Theaterinfo\Domain\Model\Play;
use Sto\Theaterinfo\Domain\Repository\PlayRepository;
use Sto\Theaterinfo\TheaterinfoPageTitleProvider;
use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * Controller for displaying play information.
 */
class PlayController extends ActionController
{
    public function __construct(
        protected readonly PlayRepository $playRepository,
        protected readonly TheaterinfoPageTitleProvider $titleProvider,
    ) {}

    /**
     * List action for this controller. Displays all plays.
     */
    public function listAction(): ResponseInterface
    {
        $contentObject = $this->getCurrentContentObject();

        /** @extensionScannerIgnoreLine */
        $header = $contentObject->data['header'];

        $this->view->assign('header', $header);
        $this->view->assign('plays', $this->playRepository->findAll());

        return $this->htmlResponse();
    }

    /**
     * Action that displays one single play.
     *
     * @param Play $play The play to display
     *
     * @Extbase\IgnoreValidation("play")
     */
    public function showAction(Play $play): ResponseInterface
    {
        $this->titleProvider->setTitle($play->getTitle());

        $this->view->assign('play', $play);

        return $this->htmlResponse();
    }

    protected function getCurrentContentObject(): ContentObjectRenderer
    {
        return $this->request->getAttribute('currentContentObject');
    }
}
