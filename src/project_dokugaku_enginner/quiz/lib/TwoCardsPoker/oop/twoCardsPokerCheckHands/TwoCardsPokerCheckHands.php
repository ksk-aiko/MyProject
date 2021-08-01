<?php

require_once(__DIR__ . '/PokerCardCheckHands.php');
require_once(__DIR__ . '/PokerPlayerCheckHands.php');
require_once(__DIR__ . '/CheckHands.php');


class TwoCardsPokerCheckHands
{
    public function __construct(array $cards1, array $cards2)
    {
        $this->cards1 = $cards1;
        $this->cards2 = $cards2;
    }

    public function start(): array
    {
        $playerCardRanks = [];
        foreach ([$this->cards1, $this->cards2] as $cards) {
            $pokerCards = array_map(fn ($card) => new PokerCardCheckHands($card), $cards);
            $player = new PokerPlayerCheckHands($pokerCards);
            $playerCardRanks[] = $player->getCardRanks();
        }
        $results = new CheckHands($playerCardRanks);
        $hands = $results->hands();
        return $hands;
    }
}
