<?php

declare(strict_types = 1);

namespace __ONYX_Namespace\Domain\Iterator;
use __ONYX_Namespace\Domain\Fruits;

class Cherry extends \FilterIterator
{
    public function accept(): bool
    {
        $cherry = $this->getInnerIterator()->current();
        if ($cherry instanceof Fruits\Cherry)
        {
            return true;
        }
        
        return false;
    }
}