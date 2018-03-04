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
use Sto\Theaterinfo\Domain\Repository\CardOrderRepository;
use Sto\Theaterinfo\Domain\Service\CardOrderMailService;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Property\TypeConverter\ObjectConverter;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * Controller for displaying play information
 */
class CardOrderController extends ActionController
{
    /**
     * @var \Sto\Theaterinfo\Domain\Service\CardOrderMailService
     */
    private $cardOrderMailService;

    /**
     * @var \Sto\Theaterinfo\Domain\Repository\CardOrderPlayRepository
     */
    private $cardOrderPlayRepository;

    /**
     * @var \Sto\Theaterinfo\Domain\Repository\CardOrderRepository
     * */
    private $cardOrderRepository;

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

    public function injectCardOrderMailService(CardOrderMailService $cardOrderMailService)
    {
        $this->cardOrderMailService = $cardOrderMailService;
    }

    public function injectCardOrderPlayRepository(CardOrderPlayRepository $cardOrderPlayRepository)
    {
        $this->cardOrderPlayRepository = $cardOrderPlayRepository;
    }

    public function injectCardOrderRepository(CardOrderRepository $cardOrderRepository)
    {
        $this->cardOrderRepository = $cardOrderRepository;
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
        $this->cardOrderRepository->addAndPersist($cardOrder);
        $this->cardOrderMailService->sendCardOrderMails($cardOrder);
        $this->redirect('takeOrderConfirmation', null, null, ['cardOrder' => $cardOrder]);
    }

    /**
     * @param \Sto\Theaterinfo\Domain\Model\CardOrder|null $cardOrder
     * @ignorevalidation $cardOrder
     */
    public function takeOrderConfirmationAction(CardOrder $cardOrder)
    {
        $this->view->assign('cardOrder', $cardOrder);
    }

    /**
     * Returns a translated error message for the current controller action.
     *
     * @return string|boolean The flash message or FALSE if no flash message should be set
     * @api
     */
    protected function getErrorFlashMessage()
    {
        $translationKey = 'error.controller.cardOrder.action.' . $this->actionMethodName;
        $errorMessage = LocalizationUtility::translate($translationKey, $this->extensionName);
        if (!isset($errorMessage)) {
            return $translationKey;
        }
        return $errorMessage;
    }
}
