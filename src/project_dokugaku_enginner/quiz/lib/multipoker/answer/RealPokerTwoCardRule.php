<?php

require_once(__DIR__ . '/RealPokerCard.php');
require_once(__DIR__ . '/RealPokerRule.php');

class RealPokerTwoCardRule implements RealPokerRule
{
    private const HIGH_CARD = 'high card';
    private const PAIR = 'pair';
    private const STRAIGHT = 'straight';

    public function getHand(array $pokerCards): string
    {
        $cardRanks = array_map(fn ($pokerCard) => $pokerCard->getRank(), $pokerCards);
        $name = self::HIGH_CARD;
        if ($this->isStraight($cardRanks[0], $cardRanks[1])) {
            $name = self::STRAIGHT;
        } elseif ($this->isPair($cardRanks[0], $cardRanks[1])) {
            $name = self::PAIR;
        }

        return $name;
    }

    private function isStraight(int $cardRank1, int $cardRank2): bool
    {
        return abs($cardRank1 - $cardRank2) === 1 || $this->isMinMax($cardRank1, $cardRank2);
    }

    private function isMinMax(int $cardRank1, int $cardRank2): bool
    {
        return abs($cardRank1 - $cardRank2) === (max(PokerCard::CARD_RANK) - min(PokerCard::CARD_RANK));
    }

    private function isPair(int $cardRank1, int $cardRank2): bool
    {
        return $cardRank1 === $cardRank2;
    }
}

    
