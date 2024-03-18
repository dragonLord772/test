<?php

namespace App\Model\Driver;

use Symfony\Component\Validator\Constraints\NotBlank;

class DriverRequest
{
    #[NotBlank]
    private string $name;
    #[NotBlank]
    private string $phone;
    private float $currentAccount;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): DriverRequest
    {
        $this->name = $name;
        return $this;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): DriverRequest
    {
        $this->phone = $phone;
        return $this;
    }

    public function getCurrentAccount(): float
    {
        return $this->currentAccount;
    }

    public function setCurrentAccount(float $currentAccount): DriverRequest
    {
        $this->currentAccount = $currentAccount;
        return $this;
    }
}
