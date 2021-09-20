<?php

namespace BlackJack;

class Card
{
    public const CARD_SCORES = [
        1 => 1,
        2 => 2,
        3 => 3,
        4 => 4,
        5 => 5,
        6 => 6,
        7 => 7,
        8 => 8,
        9 => 9,
        10 => 10,
        11 => 10,
        12 => 10,
        13 => 10
    ];

    public const CARD_MARKS = ['S', 'C', 'H', 'D'];

    public const CARD_NUMS = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13];

    public $cards;

    public function __construct()
    {
        $this->cards = $this->prepareCard();
    }

    private function prepareCard(): array
    {
        $cards = [];
        foreach (self::CARD_MARKS as $mark) {
            foreach (self::CARD_NUMS as $num) {
                $cards[] = $mark . $num;
            }
        }
        return $cards;
    }
}
