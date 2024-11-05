<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\ViewHelpers\Math;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class AddViewHelper extends AbstractViewHelper
{
    public function initializeArguments(): void
    {
        $this->registerArgument('summand', 'mixed', 'The summand that should be added', true);
    }

    public function render()
    {
        $summand1 = $this->renderChildren();
        $summand2 = $this->arguments['summand'];
        return $summand1 + $summand2;
    }
}
