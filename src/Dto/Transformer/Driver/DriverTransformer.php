<?php

namespace App\Dto\Transformer\Driver;

use App\Dto\Response\Driver\DriverResponse;
use App\Dto\Transformer\AbstractTransformer;

class DriverTransformer extends AbstractTransformer
{
    public function __construct(private DriverCarTransformer $transformer)
    {
    }

    public function transformFromObject($object): DriverResponse
    {
        $dto = new DriverResponse();
        $dto->id = $object->getId();
        $dto->name = $object->getName();
        $dto->phone = $object->getPhone();
        $dto->currentAccount = $object->getCurrentAccount();
        $dto->cars = $this->transformer->transformFromObjects($object->getCars());

        return $dto;
    }
}
