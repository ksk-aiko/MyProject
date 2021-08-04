<?php

require_once(__DIR__ . '/MultiPokerCard.php');
require_once(__DIR__ . '/MultiPokerHandEvaluator.php');

class MultiPokerThree extends MultiPokerHandEvaluator
{
    private const HIGH_CARD = 'high card';
    private const STRAIGHT = 'straight';
    private const PAIR = 'pair';
    private const THREE_CARD = 'three of a kind';

    public function getHand(array $pokerCards)
    {
        $cardRanks = array_map(fn ($pokerCard) => $pokerCard->getRank(), $pokerCards);
        $name = self::HIGH_CARD;
        if ($this->isStraight($cardRanks[0], $cardRanks[1], $cardRanks[2])) {
            $name = self::STRAIGHT;
        } elseif ($this->isPair($cardRanks[0], $cardRanks[1], $cardRanks[2])) {
            $name = self::PAIR;
        } elseif ($this->isThreeCard($cardRanks[0], $cardRanks[1], $cardRanks[2])) {
            $name = self::THREE_CARD;
        }

        return $name;
    }

    private function isStraight(int $cardRank1, int $cardRank2, int $cardRank3): bool
    {
        $cardRanks = [$cardRank1, $cardRank2, $cardRank3];
        if (abs(max($cardRanks) - min($cardRanks)) === 2) {
            return true;
        } elseif (abs(max($cardRanks) - min($cardRanks)) === 12 && (array_sum($cardRanks) === 26 || array_sum($cardRanks) === 13)) {
            return true;
        } else {
            return false;
        }
    }

    private function isPair(int $cardRank1, int $cardRank2, int $cardRank3): bool
    {
        if ($cardRank1 === $cardRank2) {
            return true;
        } elseif ($cardRank2 === $cardRank3) {
            return true;
        } elseif ($cardRank3 === $cardRank1) {
            return true;
        } else {
            return false;
        }
    }

    private function isThreeCard(int $cardRank1, int $cardRank2, int $cardRank3): bool
    {
        if ($cardRank1 === $cardRank2) {
            if ($cardRank2 === $cardRank3) {
                return true;
            }
        }

        return false;
    }
}
