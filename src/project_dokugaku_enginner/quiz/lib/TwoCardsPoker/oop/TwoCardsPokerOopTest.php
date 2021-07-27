<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/TwoCardsPokerOop.php');

class TwoCardsPokerOopTest extends TestCase
{
    public function testStart()
    {
        $game = new TwoCardsPokerOop(['CA', 'DA'], ['C10', 'H10']);
        $this->assertSame([[13, 13], [9, 9]], $game->start());
    }
}