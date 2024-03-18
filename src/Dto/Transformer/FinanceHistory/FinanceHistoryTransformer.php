<?php

namespace App\Dto\Transformer\FinanceHistory;

use App\Dto\Response\FinanceHistory\FinanceHistoryResponse;
use App\Dto\Transformer\AbstractTransformer;

class FinanceHistoryTransformer extends AbstractTransformer
{
    public function __construct()
    {
    }

    public function transformFromObject($object): FinanceHistoryResponse
    {
        $dto = new FinanceHistoryResponse();
        $dto->id = $object->getId();
        $dto->driverId = $object->getDriverId();
        $dto->amount = $object->getAmount();
        $dto->date = $object->getDate();

        return $dto;
    }

}
