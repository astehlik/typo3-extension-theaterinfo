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
 * Controller for displaying play information.
 */
class CardOrderController extends ActionController
{
    private CardOrderMailService $cardOrderMailService;

    private CardOrderPlayRepository $cardOrderPlayRepository;

    private CardOrderRepository $cardOrderRepository;

    public function initializeAction(): void
    {
        $cardOrderArgument = $this->arguments->getArgument('cardOrder');
        $cardOrderMappingConfig = $cardOrderArgument->getPropertyMappingConfiguration();
        $cardOrderMappingConfig->forProperty('rows')->setTypeConverterOption(
            ObjectConverter::class,
            ObjectConverter::CONFIGURATION_TARGET_TYPE,
            ObjectStorage::class . '<' . CardOrderRow::class . '>'
        );
    }

    public function injectCardOrderMailService(CardOrderMailService $cardOrderMailService): void
    {
        $this->cardOrderMailService = $cardOrderMailService;
    }

    public function injectCardOrderPlayRepository(CardOrderPlayRepository $cardOrderPlayRepository): void
    {
        $this->cardOrderPlayRepository = $cardOrderPlayRepository;
    }

    public function injectCardOrderRepository(CardOrderRepository $cardOrderRepository): void
    {
        $this->cardOrderRepository = $cardOrderRepository;
    }

    /**
     * @Extbase\IgnoreValidation("cardOrder")
     */
    public function orderFormAction(?CardOrder $cardOrder = null): ResponseInterface
    {
        $this->view->assign('cardOrder', $cardOrder);
        $this->view->assign('cardOrderPlays', $this->cardOrderPlayRepository->findAll());

        return $this->htmlResponse();
    }

    public function takeOrderAction(?CardOrder $cardOrder): ResponseInterface
    {
        $this->cardOrderRepository->addAndPersist($cardOrder);
        $this->cardOrderMailService->sendCardOrderMails($cardOrder);
        return $this->redirect('takeOrderConfirmation', null, null, ['cardOrder' => $cardOrder]);
    }

    /**
     * @Extbase\IgnoreValidation("cardOrder")
     */
    public function takeOrderConfirmationAction(?CardOrder $cardOrder): ResponseInterface
    {
        $this->view->assign('cardOrder', $cardOrder);

        return $this->htmlResponse();
    }

    /**
     * Returns a translated error message for the current controller action.
     *
     * @return string The flash message or FALSE if no flash message should be set
     */
    protected function getErrorFlashMessage(): string
    {
        $translationKey = 'error.controller.cardOrder.action.' . $this->actionMethodName;
        $errorMessage = LocalizationUtility::translate($translationKey, $this->request->getControllerExtensionName());
        if (!isset($errorMessage)) {
            return $translationKey;
        }
        return $errorMessage;
    }
}
