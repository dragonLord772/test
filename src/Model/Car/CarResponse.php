<?php

namespace App\Model\Car;

class CarResponse
{
    public function __construct(private int $id)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

}
