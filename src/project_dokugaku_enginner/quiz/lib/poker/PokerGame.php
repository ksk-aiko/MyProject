<?php

class PokerGame
{
    public function __construct(array $cards1, array $cards2)
    {
        $this->cards1 = $cards1;
        $this->cards2 = $cards2;
    }

    public function start()
    {
        return [$this->cards1, $this->cards2];
    }
}