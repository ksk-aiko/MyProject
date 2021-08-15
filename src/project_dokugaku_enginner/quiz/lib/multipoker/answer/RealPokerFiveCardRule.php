<?php

require_once(__DIR__ . '/RealPokerCard.php');
require_once(__DIR__ . '/RealPokerRule.php');

class RealPokerFiveCardRule implements RealPokerRule
{
    private const HIGH_CARD = 'high card';
    private const ONE_PAIR = 'one pair';
    private const TWO_PAIR = 'two pair';
    private const STRAIGHT = 'straight';
    private const THREE_OF_A_KIND = 'three of a kind';
    private const FULL_HOUSE = 'full house';
    private const FOUR_OF_A_KIND = 'four of a kind';

    public function getHand(array $pokerCards): string
    {
        $cardRanks = array_map(fn ($pokerCard) => $pokerCard->getRank(), $pokerCards);
        $name = self::HIGH_CARD;

        if ($this->isFullHouse($cardRanks)) {
            $name = self::FULL_HOUSE;
        } elseif ($this->isFourOfAKind($cardRanks)) {
            $name = self::FOUR_OF_A_KIND;
        } elseif ($this->isTwoPair($cardRanks)) {
            $name = self::TWO_PAIR;
        } elseif ($this->isThreeOfAKind($cardRanks)) {
            $name = self::THREE_OF_A_KIND;
        } elseif ($this->isStraight($cardRanks)) {
            $name = self::STRAIGHT;
        } elseif ($this->isOnePair($cardRanks)) {
            $name = self::ONE_PAIR;
        }
        return $name;
    }

    private function isFourOfAKind(array $cardRanks): bool
    {
        return count(array_unique($cardRanks)) === 2;
    }

    private function isFullHouse(array $cardRanks): bool
    {
        sort($cardRanks);
        $result = array_count_values($cardRanks);
        if ($result[$cardRanks[0]] === 2 && $result[$cardRanks[4]] === 3) {
            return true;
        } elseif ($result[$cardRanks[0]] === 3 && $result[$cardRanks[4]] === 2) {
            return true;
        } else {
            return false;
        }
    }
    

    private function isThreeOfAKind(array $cardRanks): bool
    {
        return count(array_unique($cardRanks)) === 3;
    }

    private function isStraight(array $cardRanks): bool
    {
        sort($cardRanks);
        return range($cardRanks[0], $cardRanks[0] + count($cardRanks) - 1) === $cardRanks || $this->isMinMax($cardRanks);
    }

    private function isMinMax(array $cardRanks): bool
    {
        return $cardRanks === [min(RealPokerCard::CARD_RANK), min(RealPokerCard::CARD_RANK) + 1, min(RealPokerCard::CARD_RANK) + 2, min(RealPokerCard::CARD_RANK) + 3, max(RealPokerCard::CARD_RANK)];
    }

    private function isOnePair(array $cardRanks): bool
    {
        return count(array_unique($cardRanks)) === 4;
    }

    private function isTwoPair(array $cardRanks): bool
    {
        $twoPairArray = ['2' => 2];
        sort($cardRanks);
        $result = array_count_values($cardRanks);
        $result2 = array_values($result);
        $result3 = array_count_values($result2);
        return $twoPairArray === $result3;
    }
}
