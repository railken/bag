<?php

use PHPUnit\Framework\TestCase;
use Railken\Bag;

class BasicTest extends TestCase
{

    public function testInstance()
    {
        $bag = new Bag();
    }

    public function testOnly()
    {   

        $bag = new Bag(['username' => 'admin', 'password' => 'admin', 'email' => 'admin@admin.it']);

        $bag1 = $bag->only(['username']);

        $this->assertEquals(['username' => 'admin'], $bag1->all());
    }
}