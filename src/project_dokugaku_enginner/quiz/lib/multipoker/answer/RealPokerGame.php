<?php

class RealPokerGame
{
    public function __construct(array $cards1, array $card2)
    {
        $this->cards1 = $cards1;
        $this->cards2 = $card2;
    }

    public function start(): array
    {
        $hands = [];
        foreach ([$this->cards1, $this->cards2] as $cards) {
            $pokerCards = array_map(fn ($card) => new RealPokerCard($card), $cards);
            
        }
    }
}
