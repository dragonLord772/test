<?php

namespace App\Dto\Response\Driver;

class DriverResponse
{
    public int $id;
    public string $name;
    public string $phone;
    public float $currentAccount;
    public iterable $cars;

}
