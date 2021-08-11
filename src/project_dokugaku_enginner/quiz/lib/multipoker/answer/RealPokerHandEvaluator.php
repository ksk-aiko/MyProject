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
}