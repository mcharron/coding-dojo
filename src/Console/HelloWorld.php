<?php

namespace __ONYX_Namespace\Console;

use __ONYX_Namespace\Domain\Cart;
use __ONYX_Namespace\Domain\Fruits\Apple;
use __ONYX_Namespace\Domain\Fruits\Cherry;
use __ONYX_Namespace\Domain\Fruits\Banana;
use __ONYX_Namespace\Domain\Fruits\Apples\Mele;
use __ONYX_Namespace\Domain\Fruits\Apples\Pomme;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloWorld extends Command
{
    protected function configure()
    {
        $this->setName('hello')
            ->setDescription('Say hello world')
            ->addOption('fruits', null, InputOption::VALUE_REQUIRED);

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $inputFruits = $input->getOption('fruits');

        $fruitsClosure = [
            'cherry' => function(){
                return new Cherry();
            },
            'apple' => function(){
                return new Apple();
            },
            'banana' => function(){
                return new Banana();
            },
            'pomme' => function(){
                return new Pomme();
            },
            'mele' => function(){
                return new Mele();
            },
        ];
        
        $this->output = $output;

        $cart = new Cart();

        $fruits = explode(',', $inputFruits);
        foreach ($fruits as $fruit)
        {
            $cart->addFruit($fruitsClosure[$fruit]());
        }
        $this->outputFruits($inputFruits, $cart->compute());
    }
    
    private function outputFruits($fruit, $amount)
    {
        $this->output->writeln(sprintf(
            '%s -> %s',
            $fruit,
            $amount
        ));
    }
}
