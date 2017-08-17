<?php

declare(strict_types = 1);

namespace __ONYX_Namespace\Domain;

use __ONYX_Namespace\Domain\Iterator;

class Cart
{
    private const
        CHERRY_DISCOUNT = 20,
        BANANA_DISCOUNT = 150,
        POMME_DISCOUNT = 100,
        MELE_DISCOUNT = 100;
    
    private
        $fruits;
        
    public function __construct()
    {
        $this->fruits = [];
    }
    
    public function addFruit(Fruit $fruit)
    {
        $this->fruits[] = $fruit;
    }
    
    public function compute()
    {
        $amount = 0;
        $cherryIterator = new Iterator\Cherry(new \ArrayIterator($this->fruits));
        $nbCherries = iterator_count($cherryIterator);
        $bananaIterator = new Iterator\Banana(new \ArrayIterator($this->fruits));
        $nbBanana = iterator_count($bananaIterator);
        $pommeIterator = new Iterator\Pomme(new \ArrayIterator($this->fruits));
        $nbPomme = iterator_count($pommeIterator);
        $meleIterator = new Iterator\Mele(new \ArrayIterator($this->fruits));
        $nbMele = iterator_count($meleIterator);
        
        foreach ($this->fruits as $fruit)
        {
            $amount += $fruit->getPrice()->getInCents();
        }
        
        $discountCherry = floor($nbCherries / 2) * self::CHERRY_DISCOUNT;
        $discountBanana = floor($nbBanana / 2) * self::BANANA_DISCOUNT;
        $discountPomme = floor($nbPomme / 3) * self::POMME_DISCOUNT;
        $discountMele = floor($nbMele / 2) * self::MELE_DISCOUNT;

        $discount = $discountBanana + $discountCherry + $discountPomme + $discountMele;

        return $amount - $discount;
    }
}