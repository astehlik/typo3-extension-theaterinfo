<?php
declare(strict_types=1);

namespace Sto\Theaterinfo\Domain\Model;

class CardOrderDate
{
    /**
     * @var \DateTime
     */
    protected $dateAndTime;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $location;

    public function getDateAndTime(): \DateTime
    {
        return $this->dateAndTime;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getLocation(): string
    {
        return $this->location;
    }
}
