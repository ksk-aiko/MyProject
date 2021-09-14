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

    public function displayScore(string $card1, string $card2): int
    {
        $key1 = substr($card1, 1, strlen($card1) - 1);
        $key2 = substr($card2, 1, strlen($card1) - 1);
        $score = Card::CARD_SCORES[$key1] + Card::CARD_SCORES[$key2];
        echo "あなたの現在の得点は{$score}です";
        return $score;
    }
}