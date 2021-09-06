<?php

require_once('PokerCard.php');
require_once('PokerRule.php');

class PokerHandEvaluator
{
    public function __construct(PokerRule $rule)
    {
        $this->rule = $rule;
    }

    public function getHand(array $pokerCards)
    {
        return $this->rule->getHand($pokerCards);
    }
}