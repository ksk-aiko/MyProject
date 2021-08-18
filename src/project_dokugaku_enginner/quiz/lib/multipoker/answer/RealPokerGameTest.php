<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/RealPokerGame.php');

class RealPokerGameTest extends TestCase
{
    public function testStart()
    {
        // カードが2枚の場合
        $game1 = new RealPokerGame(['CA', 'DA'], ['C9', 'H10']);
        $this->assertSame(['pair', 'straight', 2], $game1->start());

        // カードが3枚の場合
        $game2 = new RealPokerGame(['C2', 'D2', 'S2'], ['C10', 'H9', 'DJ']);
        $this->assertSame(['three of a kind', 'straight', 1], $game2->start());

        // $game3 = new RealPokerGame(['C2', 'D2', 'S2', 'H2', 'C3'], ['C10', 'H9', 'DK', 'DQ', 'SJ']);
        // $this->assertSame(['four of a kind', 'straight'], $game3->start());
    }
}
