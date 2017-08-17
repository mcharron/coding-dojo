<?php

declare(strict_types = 1);

namespace __ONYX_Namespace\Domain;

interface Fruit
{
    public function getPrice(): Price;
}