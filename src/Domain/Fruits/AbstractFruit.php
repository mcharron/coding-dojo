<?php

declare(strict_types = 1);

namespace __ONYX_Namespace\Domain\Fruits;

use __ONYX_Namespace\Domain\Fruit;
use __ONYX_Namespace\Domain\Price;

abstract class AbstractFruit implements Fruit
{
    private
        $price;
    
    public function __construct(float $price)
    {
        $this->price = new Price($price);
    }
    
    public function getPrice(): Price
    {
        return $this->price;
    }
}