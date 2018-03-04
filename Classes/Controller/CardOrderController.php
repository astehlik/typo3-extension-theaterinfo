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

use Sto\Theaterinfo\Domain\Model\CardOrder;
use Sto\Theaterinfo\Domain\Model\CardOrderRow;
use Sto\Theaterinfo\Domain\Repository\CardOrderPlayRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Property\TypeConverter\ObjectConverter;

/**
 * Controller for displaying play information
 */
class CardOrderController extends ActionController
{
    /**
     * @var \Sto\Theaterinfo\Domain\Repository\CardOrderPlayRepository
     * */
    private $cardOrderPlayRepository;

    public function initializeAction()
    {
        $cardOrderArgument = $this->arguments->getArgument('cardOrder');
        $cardOrderMappingConfig = $cardOrderArgument->getPropertyMappingConfiguration();
        $cardOrderMappingConfig->forProperty('rows')->setTypeConverterOption(
            ObjectConverter::class,
            ObjectConverter::CONFIGURATION_TARGET_TYPE,
            ObjectStorage::class . '<' . CardOrderRow::class . '>'
        );
    }

    public function injectCardOrderPlayRepository(CardOrderPlayRepository $cardOrderPlayRepository)
    {
        $this->cardOrderPlayRepository = $cardOrderPlayRepository;
    }

    /**
     * @param \Sto\Theaterinfo\Domain\Model\CardOrder|null $cardOrder
     * @ignorevalidation $cardOrder
     */
    public function orderFormAction(CardOrder $cardOrder = null)
    {
        $this->view->assign('cardOrder', $cardOrder);
        $this->view->assign('cardOrderPlays', $this->cardOrderPlayRepository->findAll());
    }

    public function takeOrderAction(CardOrder $cardOrder)
    {
        $this->redirect('takeOrderConfirmation');
    }

    public function takeOrderConfirmation()
    {

    }
}
