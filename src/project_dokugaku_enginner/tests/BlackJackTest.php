<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/blackjack/BlackJack.php');

class BlackJackTest extends TestCase
{
    public function testStart()
    {
        $player = new Player();
        $this->assertSame('');
    }
}