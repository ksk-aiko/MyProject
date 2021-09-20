<?php

use BlackJack\Player;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    public function testDrawCard()
    {
        $player = new Player();
        $this->assertSame(['H3', 'D9'], $player->drawCard());
    }
}