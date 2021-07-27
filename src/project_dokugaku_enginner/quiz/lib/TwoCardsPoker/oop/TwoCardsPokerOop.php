<?php

require_once(__DIR__ . '/Rank.php');

const CARDS = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];

define('CARD_RANK', (function () {
   $cardRanks = [];
   foreach (CARDS as $index => $card) {
       $cardRanks[$card] = $index + 1;
   }
   return $cardRanks;
})());


class TwoCardsPokerOop
{
    

    public function __construct(array $cards1, array $cards2)
    {
        $this->cards1 = $cards1;
        $this->cards2 = $cards2;
    }

    public function start()
    {
        $rank = new Rank($this->cards1, $this->cards2);
        $results = $rank->convert();
        return $results;
    }
}