<?php

declare(strict_types = 1);

namespace __ONYX_Namespace\Domain;

class Price
{
    public
        $price;
    
    public function __construct(float $price)
    {
        $this->price = $price;
    }
    
    public function getInCents(): float
    {
        return $this->price * 100;
    }
}