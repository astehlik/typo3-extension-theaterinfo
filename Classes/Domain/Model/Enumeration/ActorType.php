<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\Domain\Model\Enumeration;

use TYPO3\CMS\Core\Type\Enumeration;

class ActorType extends Enumeration
{
    public const COMPANY = 1;

    public const PERSON = 0;
}
