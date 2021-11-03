<?php

namespace BlackJack;

class Card
{
    public const CARD_SCORES = [
        'A' => 10,
        2 => 2,
        3 => 3,
        4 => 4,
        5 => 5,
        6 => 6,
        7 => 7,
        8 => 8,
        9 => 9,
        10 => 10,
        'J' => 10,
        'Q' => 10,
        'K' => 10
    ];

    public const CARD_MARKS = ['スペード', 'クラブ', 'ハート', 'ダイヤ'];

    public const CARD_NUM = ['A', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'];

    public $cards;

    public function __construct()
    {
        $this->cards = $this->prepareCard();
    }

    private function prepareCard(): array
    {
        $cards = [];
        foreach (self::CARD_MARKS as $mark) {
            foreach (self::CARD_NUM as $num) {
                $cards[] = "{$mark}の{$num}";
            }
        }
        return $cards;
    }
}
