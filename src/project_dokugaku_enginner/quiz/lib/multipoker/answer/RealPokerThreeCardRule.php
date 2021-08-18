<?php

require_once(__DIR__ . '/RealPokerCard.php');
require_once(__DIR__ . '/RealPokerRule.php');

class RealPokerThreeCardRule implements RealPokerRule
{
    private const HIGH_CARD = 'high card';
    private const PAIR = 'pair';
    private const STRAIGHT = 'straight';
    private const THREE_OF_A_KIND = 'three of a kind';

    private const HAND_RANK = [
        self::HIGH_CARD => 1,
        self::PAIR => 2,
        self::STRAIGHT => 3,
        self::THREE_OF_A_KIND => 4
    ];

    public function getHand(array $pokerCards): array
    {
        $cardRanks = array_map(fn($pokerCard) => $pokerCard->getRank(), $pokerCards);

        rsort($cardRanks);
        $primary = $cardRanks[0];
        $secondary = $cardRanks[1];
        $third = $cardRanks[2];

        $name = self::HIGH_CARD;

        if ($this->isThreeOfAKind($cardRanks)) {
            $name = self::THREE_OF_A_KIND;
        } elseif ($this->isStraight($cardRanks)){
            $name = self::STRAIGHT;
            if ($cardRanks === [max($cardRanks), min($cardRanks) + 1, min($cardRanks)]) {
                $primary = $cardRanks[1];
                $secondary = $cardRanks[2];
                $third = $cardRanks[0];
            }
        } elseif ($this->isPair($cardRanks)) {
            $name = self::PAIR;
        }

        return [
            'name' => $name,
            'rank' => self::HAND_RANK[$name],
            'primary' => $primary,
            'secondary' => $secondary,
            'third' => $third,
        ];
    }

    private function isThreeOfAKind(array $cardRanks): bool
    {
        return count(array_unique($cardRanks)) === 1;
    }

    private function isStraight(array $cardRanks): bool
    {
        sort($cardRanks);
        return range($cardRanks[0], $cardRanks[0] + count($cardRanks) - 1) === $cardRanks || $this->isMinMax($cardRanks);
    }

    private function isMinMax(array $cardRanks): bool
    {
        return $cardRanks === [min(RealPokerCard::CARD_RANK), min(RealPokerCard::CARD_RANK) + 1, max(RealPokerCard::CARD_RANK)];
    }

    private function isPair(array $cardRanks): bool
    {
        return count(array_unique($cardRanks)) === 2;
    }
}