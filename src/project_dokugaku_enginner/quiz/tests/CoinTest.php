<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/vending_machine/Coin.php');

class CoinTest extends TestCase
{
    public function testCoin()
    {
        $coin = new Coin();
        $this->assertSame(0, $coin->depositCoin(150));
        $this->assertSame(100, $coin->depositCoin(100));
        $this->assertSame(0, $coin->depositCoin(0));
    }

}
