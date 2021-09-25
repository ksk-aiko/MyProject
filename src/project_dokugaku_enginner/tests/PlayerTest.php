<?php

require_once(__DIR__ . '/../lib/blackjack/Player.php');

use PHPUnit\Framework\TestCase;
use BlackJack\Player;

class PlayerTest extends TestCase
{
    public function testIsAce()
    {
        $player1 = new Player();
        $this->assertSame(true, $player1->isAce('H1'));
        $this->assertSame(true, $player1->isAce('S1'));
        $this->assertSame(false, $player1->isAce('D4'));
        $this->assertSame(false, $player1->isAce('C9'));
    }
}
