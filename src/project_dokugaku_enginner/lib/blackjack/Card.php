<?php



class Card
{
    const CARD_SCORES = [

    ];

    const CARD_MARKS = ['S', 'C', 'H', 'D'];

    const CARD_NUMS = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13];

    public function __construct()
    {
        $this->cards = $this->prepareCard();
    }

    private function prepareCard():array
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

