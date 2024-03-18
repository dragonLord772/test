<?php

namespace App\Dto\Transformer\Driver;

use App\Dto\Response\Driver\DriverCarResponse;
use App\Dto\Transformer\AbstractTransformer;
use App\Entity\Car;

class DriverCarTransformer extends AbstractTransformer
{
    /**
     * @param Car $object
     */
    public function transformFromObject($object): DriverCarResponse
    {
        $dto = new DriverCarResponse();
        $dto->id = $object->getId();
        $dto->color = $object->getColor();
        $dto->brand = $object->getBrand();

        return $dto;
    }
}
