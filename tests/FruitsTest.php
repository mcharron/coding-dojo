<?php

declare(strict_types = 1);

namespace __ONYX_Namespace;

use __ONYX_Namespace\Domain\Cart;
use __ONYX_Namespace\Domain\Fruits\Cherry;
use __ONYX_Namespace\Domain\Fruits\Banana;
use PHPUnit\Framework\TestCase;

class FruitsTest extends TestCase
{
    public function testGetPrice()
    {
        $banana = new Banana();
        $this->assertEquals(150, $banana->getPrice()->getInCents());
    }
    
    public function testCompute()
    {
        $cart = new Cart();
        $cart->addFruit(new Banana());
        
        $this->assertEquals(150, $cart->compute());
        
        $cart->addFruit(new Cherry());
        $cart->addFruit(new Cherry());
        
        $this->assertEquals(280, $cart->compute());
    }
}