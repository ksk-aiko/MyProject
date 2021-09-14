<?php

require_once('Participant.php');
require_once('Player.php');

class Dealer implements Participant
{
    public function __construct(array $remainCards)
    {
        $this->cards = $remainCards;
    }

    public function drawCard()
    {
        shuffle($this->cards);
        $this->card1 = array_shift($this->cards);
        shuffle($this->cards);
        $this->card2 = array_shift($this->cards);
        echo "ディーラーの引いたカードは{$this->card1}です" . PHP_EOL;
        echo "ディーラーの引いたもう一枚のカードは分かりません" . PHP_EOL;
    }
}
