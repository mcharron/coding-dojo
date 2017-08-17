<?php

declare(strict_types = 1);

namespace __ONYX_Namespace\Domain\Iterator;
use __ONYX_Namespace\Domain\Fruits;

class Pomme extends \FilterIterator
{
    public function accept(): bool
    {
        $cherry = $this->getInnerIterator()->current();
        if ($cherry instanceof Fruits\Apples\Pomme)
        {
            return true;
        }
        
        return false;
    }
}