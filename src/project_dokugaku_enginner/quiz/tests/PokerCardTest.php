<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/TwoCardsPoker/oop/answer/PokerCard.php');

class PokerCardTest extends TestCase
{
    public function testGetRank()
    {
        $card = new PokerCard('C10');
        $this->assertSame(9, $card->getRank());
    }
}