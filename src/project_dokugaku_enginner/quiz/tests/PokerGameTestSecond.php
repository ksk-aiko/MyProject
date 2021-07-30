<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/TwoCardsPoker/oop/answer/PokerGame.php');

class PokerGameTestSecond extends TestCase
{
    public function testStart()
    {
        $game = new PokerGame(['CA', 'DA'], ['C10', 'H10']);
        $this->assertSame([[13, 13], [9, 9]], $game->start());
    }
}
