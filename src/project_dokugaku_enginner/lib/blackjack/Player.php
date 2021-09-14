<?php

require_once('Participant.php');
require_once('Card.php');

class Player implements Participant
{
    public function __construct()
    {
    }

    public function drawCard():array
    {
        $card = new Card();
        $cards = $card->cards;
        shuffle($cards);
        $this->card1 = array_shift($cards);
        echo "あなたの引いたカードは{$this->card1}です". PHP_EOL;
        shuffle($cards);
        $this->card2 = array_shift($cards);
        echo "あなたの引いたカードは{$this->card2}です". PHP_EOL;
        return $cards;

    }
}