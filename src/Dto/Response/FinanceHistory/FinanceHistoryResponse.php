<?php

namespace App\Dto\Response\FinanceHistory;

class FinanceHistoryResponse
{
    public int $id;
    public int $driverId;
    public float $amount;
    public \DateTimeInterface $date;
}
