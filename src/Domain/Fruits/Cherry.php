<?php

declare(strict_types = 1);

namespace __ONYX_Namespace\Domain\Fruits;

class Cherry extends AbstractFruit
{
    private const
        PRICE = 0.75;
    
    public function __construct()
    {
        parent::__construct(self::PRICE);
    }
}