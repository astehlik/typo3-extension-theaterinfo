<?php
declare(strict_types=1);

namespace Sto\Theaterinfo\Domain\Validator;

use InvalidArgumentException;
use Sto\Theaterinfo\Domain\Model\CardOrder;
use TYPO3\CMS\Extbase\Validation\Error;
use TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator;

class CardOrderValidator extends AbstractValidator
{
    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to result.
     */
    protected function isValid(mixed $value): void
    {
        if (!$value instanceof CardOrder) {
            throw new InvalidArgumentException(
                'The value must be an instance of \Sto\Theaterinfo\Domain\Model\CardOrder'
            );
        }

        if (!$value->hasOrderedCards()) {
            $this->result->forProperty('rows')->addError(new Error('No cards orderd.', 1520190410));
        }
    }
}
