<?php 

require_once(__DIR__ . '/MultiPokerCard.php');

class MultiPokerPlayer
{
    public function __construct(array $pokerCards)
    {
        $this->pokerCards = $pokerCards;
    }

    public function getCardRanks(): array
    {
        return array_map(fn ($pokerCard) => $pokerCard->getRank(), $this->pokerCards);
    }
}