<?php
declare(strict_types=1);

namespace Sto\Theaterinfo\Domain\Validator;

use TYPO3\CMS\Extbase\Validation\Error;
use TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator;

class CardOrderValidator extends AbstractValidator
{
    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to result.
     *
     * @param \Sto\Theaterinfo\Domain\Model\CardOrder $value
     */
    protected function isValid($value)
    {
        if (!$value->hasOrderedCards()) {
            $this->result->forProperty('rows')->addError(new Error('No cards orderd.', 1520190410));
        }
    }
}
