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

use Sto\Theaterinfo\Domain\Repository\CardOrderPlayRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Controller for displaying play information
 */
class CardOrderController extends ActionController
{
    /**
     * @var \Sto\Theaterinfo\Domain\Repository\CardOrderPlayRepository
     * */
    private $cardOrderPlayRepository;

    public function injectCardOrderPlayRepository(CardOrderPlayRepository $cardOrderPlayRepository)
    {
        $this->cardOrderPlayRepository = $cardOrderPlayRepository;
    }

    public function orderFormAction()
    {
        $this->view->assign('cardOrderPlays', $this->cardOrderPlayRepository->findAll());
    }
}
