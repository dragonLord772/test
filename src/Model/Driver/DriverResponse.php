<?php

namespace App\Model\Driver;

class DriverResponse
{
    public function __construct(private int $id)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }
}
