<?php

namespace App;

use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

class Hello
{
    private FlashBagInterface $flashBag;

    public function __construct(FlashBagInterface $flashBag)
    {
        $this->flashBag = $flashBag;
    }
    
    public function main(): string
    {
        $this->flashBag->set('foo', 'bar');

        return "Hello world!";
    }
}
