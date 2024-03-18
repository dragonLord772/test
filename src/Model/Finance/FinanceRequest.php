<?php

namespace App\Model\Finance;

use Symfony\Component\Validator\Constraints\NotBlank;

class FinanceRequest
{
    #[NotBlank]
    private int $driverId;
    #[NotBlank]
    private float $amount;
    private \DateTimeInterface $date;

    public function getDriverId(): int
    {
        return $this->driverId;
    }

    public function setDriverId(int $driverId): void
    {
        $this->driverId = $driverId;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): void
    {
        $this->date = $date;
    }
}
