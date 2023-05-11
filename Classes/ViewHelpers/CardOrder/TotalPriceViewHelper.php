<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\ViewHelpers\CardOrder;

use Sto\Theaterinfo\Domain\Model\CardOrder;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class TotalPriceViewHelper extends AbstractViewHelper
{
    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {
        $cardOrder = static::getCardOrderFromArguments($arguments);
        $shippingCosts = $arguments['shippingCosts'];
        return $cardOrder->getTotalPrice() + $shippingCosts;
    }

    private static function getCardOrderFromArguments(array $arguments): CardOrder
    {
        return $arguments['cardOrder'];
    }

    public function initializeArguments(): void
    {
        $this->registerArgument('cardOrder', CardOrder::class, 'The card order.', true);
        $this->registerArgument('shippingCosts', 'float', 'The shipping costs from the settings.', true);
    }
}
