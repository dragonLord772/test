<?php

namespace App\Exception;

use Symfony\Component\HttpFoundation\Response;

class CarNotFoundException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct("car not found", Response::HTTP_NOT_FOUND);
    }

}
