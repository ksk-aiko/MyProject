<?php

require_once('MultiPokerCard.php');

abstract class MultiPokerHandEvaluator
{
    private const HIGH_CARD = 'high card';
    private const PAIR = 'pair';
    private const STRAIGHT = 'straight';
    private const THREE_CARD = 'three card';

    // public function getHand(array $pokerCards): string
    // {
    //     $cardRanks = array_map(fn ($pokerCard) => $pokerCard->getRank(), $pokerCards);
    //     $name = self::HIGH_CARD;

    // if ($this->isStraight($cardRanks[0], $cardRanks[1])) {
    //     $name = self::STRAIGHT;
    // } elseif ($this->isPair($cardRanks[0], $cardRanks[1])) {
    //     $name = self::PAIR;
    // }

    // return $name;

    abstract public function getHand(array $pokerCards);
}
