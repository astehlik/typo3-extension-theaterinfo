<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\Domain\Model\Enumeration;

use TYPO3\CMS\Core\Type\Enumeration;

class Gender extends Enumeration
{
    public const FEMALE = 1;

    public const MALE = 0;
}
