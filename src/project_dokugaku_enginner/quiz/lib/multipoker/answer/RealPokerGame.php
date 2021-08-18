<?php

require_once(__DIR__ . '/RealPokerCard.php');
require_once(__DIR__ . '/RealPokerTwoCardRule.php');
require_once(__DIR__ . '/RealPokerThreeCardRule.php');
require_once(__DIR__ . '/RealPokerHandEvaluator.php');
require_once(__DIR__ . '/RealPokerFiveCardRule.php');





class RealPokerGame
{
    public function __construct(array $cards1, array $card2)
    {
        $this->cards1 = $cards1;
        $this->cards2 = $card2;
    }

    public function start(): array
    {
        $hands = [];
        foreach ([$this->cards1, $this->cards2] as $cards) {
            $pokerCards = array_map(fn ($card) => new RealPokerCard($card), $cards);
            $rule = $this->getRule($cards);
            $handEvaluator = new RealPokerHandEvaluator($rule);
            $hands[] = $handEvaluator->getHand($pokerCards);
        }
        $winner = RealPokerHandEvaluator::getWinner($hands[0], $hands[1]);
        return [$hands[0]['name'], $hands[1]['name'], $winner];
    }

    private function getRule(array $cards): RealPokerRule
    {
        $rule = new RealPokerTwoCardRule();

        if (count($cards) === 3) {
            $rule = new RealPokerThreeCardRule();
        } elseif (count($cards) === 5) {
            $rule = new RealPokerFiveCardRule();
        }

        return $rule;
    }

    //ToDo:テストを通す
}
