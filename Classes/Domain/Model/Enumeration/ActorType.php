<?php

declare(strict_types=1);

namespace Sto\Theaterinfo\Domain\Model\Enumeration;

enum ActorType: int
{
    case COMPANY = 1;

    case PERSON = 0;
}
