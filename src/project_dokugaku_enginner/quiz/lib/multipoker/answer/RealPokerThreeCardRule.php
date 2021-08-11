<?php

require_once(__DIR__ . '/RealPokerCard.php');
require_once(__DIR__ . '/RealPokerRule.php');

class RealPokerThreeCardRule implements RealPokerRule
{
    private const HIGH_CARD = 'high card';
    private const PAIR = 'pair';
    private const STRAIGHT = 'straight';
    private const THREE_OF_A_KIND = 'three of a kind';

    public function getHand(array $pokerCards): string
    {
        $cardRanks = array_map(fn($pokerCard) => $pokerCard->getRank(), $pokerCards);
        $name = self::HIGH_CARD;

        if ($this->isThreeOfAKind($cardRanks)) {
            $name = self::THREE_OF_A_KIND;
        } elseif ($this->isStraight($cardRanks)){
            $name = self::STRAIGHT;
        } elseif ($this->isPair($cardRanks)) {
            $name = self::PAIR;
        }

        return $name;
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