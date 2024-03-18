<?php

namespace App\Dto\Response\Car;

class CarResponse
{
    public int $id;
    public string $color;
    public string $brand;
    public iterable $drivers;
}
