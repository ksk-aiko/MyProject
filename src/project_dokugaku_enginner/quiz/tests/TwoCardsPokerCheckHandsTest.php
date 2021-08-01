<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/TwoCardsPoker/oop/twoCardsPokerCheckHands/TwoCardsPokerCheckHands.php');

class TwoCardsPokerCheckHandsTest extends TestCase
{
    public function testStart()
    {
        $game = new TwoCardsPokerCheckHands(['CA', 'DA'], ['C9', 'H10']);
        $this->assertSame(['pair', 'straight'], $game->start());
    }
}
