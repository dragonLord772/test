<?php

namespace App\Model\Car;

use Symfony\Component\Validator\Constraints\NotBlank;

class CarCreateRequest
{
    #[NotBlank]
    private string $brand;
    #[NotBlank]
    private string $licensePlate;
    #[NotBlank]
    private string $color;

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): CarCreateRequest
    {
        $this->brand = $brand;
        return $this;
    }

    public function getLicensePlate(): string
    {
        return $this->licensePlate;
    }

    public function setLicensePlate(string $licensePlate): CarCreateRequest
    {
        $this->licensePlate = $licensePlate;
        return $this;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): CarCreateRequest
    {
        $this->color = $color;
        return $this;
    }
}
