<?php

require_once(__DIR__ . '/RealPokerCard.php');
require_once(__DIR__ . '/RealPokerRule.php');

class RealPokerTwoCardRule implements RealPokerRule
{
    private const HIGH_CARD = 'high card';
    private const PAIR = 'pair';
    private const STRAIGHT = 'straight';

    private const HAND_RANK = [
        self::HIGH_CARD => 1,
        self::PAIR => 2,
        self::STRAIGHT => 3
    ];

    public function getHand(array $pokerCards): array
    {
        $cardRanks = array_map(fn ($pokerCard) => $pokerCard->getRank(), $pokerCards);

        $primary = max($cardRanks);
        $secondary = min($cardRanks);
        $name = self::HIGH_CARD;

        if ($this->isStraight($cardRanks[0], $cardRanks[1])) {
            $name = self::STRAIGHT;
        } elseif ($this->isPair($cardRanks[0], $cardRanks[1])) {
            $name = self::PAIR;
        }

        return [
            'name' => $name,
            'primary' => $primary,
            'secondary' => $secondary,
            'rank' => self::HAND_RANK[$name]
        ];
    }

    private function isStraight(int $cardRank1, int $cardRank2): bool
    {
        return abs($cardRank1 - $cardRank2) === 1 || $this->isMinMax($cardRank1, $cardRank2);
    }

    private function isMinMax(int $cardRank1, int $cardRank2): bool
    {
        return abs($cardRank1 - $cardRank2) === (max(RealPokerCard::CARD_RANK) - min(RealPokerCard::CARD_RANK));
    }

    private function isPair(int $cardRank1, int $cardRank2): bool
    {
        return $cardRank1 === $cardRank2;
    }
}

    
