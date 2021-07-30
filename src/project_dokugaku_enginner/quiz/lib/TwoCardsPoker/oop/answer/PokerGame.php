<?php

require_once('PokerPlayer.php');
require_once('PokerCard.php');

class PokerGame
{
    public function __construct(array $cards1, array $cards2)
    {
        $this->cards1 = $cards1;
        $this->cards2 = $cards2;
    }

    public function start(): array
    {
        $playerCardRanks = [ ];
        foreach ([$this->cards1, $this->cards2] as $cards) {
            $pokerCards = array_map(fn ($card) => new PokerCard($card), $cards);
            $player = new PokerPlayer($pokerCards);
            $playerCardRanks[] = $player->getCardRanks();
        }
    }
}