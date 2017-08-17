<?php

declare(strict_types = 1);

namespace __ONYX_Namespace\Domain\Fruits;

class Apple extends AbstractFruit
{
    private const
        PRICE = 1;
    
    public function __construct()
    {
        parent::__construct(self::PRICE);
    }
}