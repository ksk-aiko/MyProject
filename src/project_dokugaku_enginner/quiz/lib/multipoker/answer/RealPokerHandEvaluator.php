<?php

class RealPokerHandEvaluator
{
    public function __construct(RealPokerRule $rule)
    {
        $this->rule = $rule;
    }

    public function getHand(array $pokerCards)
    {
        return $this->rule->getHand($pokerCards);
    }

    public static function getWinner(array $hands1, array $hands2):int
    {
       foreach (['rank', 'primary', 'secondary', 'third'] as $k) {
            if ($hands1[$k] > $hands2[$k]) {
                return 1;
            } elseif ($hands1[$k] < $hands2[$k]) {
                return 2;
            } else {
                return 0;
            }
       }
    }
}