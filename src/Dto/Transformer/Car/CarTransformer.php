<?php

namespace App\Dto\Transformer\Car;

use App\Dto\Response\Car\CarResponse;
use App\Dto\Transformer\AbstractTransformer;
use App\Entity\Car;

class CarTransformer extends AbstractTransformer
{
    public function __construct(private CarDriverTransformer $driverTransformer)
    {
    }

    /**
     * @param Car $object
     */
    public function transformFromObject($object): CarResponse
    {
        $dto = new CarResponse();
        $dto->id = $object->getId();
        $dto->color = $object->getColor();
        $dto->brand = $object->getBrand();
        $dto->drivers = $this->driverTransformer->transformFromObjects($object->getDrivers());

        return $dto;
    }
}
