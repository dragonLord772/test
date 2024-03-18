<?php

namespace App\Dto\Transformer\Car;

use App\Dto\Response\Car\CarDriverResponse;
use App\Dto\Transformer\AbstractTransformer;
use App\Entity\Driver;

class CarDriverTransformer extends AbstractTransformer
{
    /**
     * @param Driver $object
     */
    public function transformFromObject($object): CarDriverResponse
    {
        $dto = new CarDriverResponse();
        $dto->id = $object->getId();
        $dto->name = $object->getName();

        return $dto;
    }
}
