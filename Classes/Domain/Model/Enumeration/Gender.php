<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\Domain\Model\Enumeration;

enum Gender: int
{
    case FEMALE = 1;

    case MALE = 3;

    case UNSPECIFIED = 0;
}
