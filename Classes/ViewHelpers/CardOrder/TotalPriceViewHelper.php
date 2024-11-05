<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\ViewHelpers\CardOrder;

use Sto\Theaterinfo\Domain\Model\CardOrder;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class TotalPriceViewHelper extends AbstractViewHelper
{
    public function initializeArguments(): void
    {
        $this->registerArgument('cardOrder', CardOrder::class, 'The card order.', true);
        $this->registerArgument('shippingCosts', 'float', 'The shipping costs from the settings.', true);
    }

    public function render()
    {
        $cardOrder = $this->getCardOrderFromArguments();
        $shippingCosts = $this->arguments['shippingCosts'];
        return $cardOrder->getTotalPrice() + $shippingCosts;
    }

    private function getCardOrderFromArguments(): CardOrder
    {
        return $this->arguments['cardOrder'];
    }
}
