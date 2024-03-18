<?php

namespace App\Model\DriverCarRelation;

use Symfony\Component\Validator\Constraints\NotBlank;

class DriverCarRelationRequest
{
    #[NotBlank]
    private int $driverId;
    #[NotBlank]
    private int $carId;

    public function __construct(int $driverId, int $carId)
    {
        $this->driverId = $driverId;
        $this->carId = $carId;
    }

    public function getDriverId(): int
    {
        return $this->driverId;
    }

    public function setDriverId(int $driverId): void
    {
        $this->driverId = $driverId;
    }

    public function getCarId(): int
    {
        return $this->carId;
    }

    public function setCarId(int $carId): void
    {
        $this->carId = $carId;
    }

}
