<?php

namespace BlackJack;

require_once('Card.php');
require_once('BlackJack.php');

interface Player
{
    //     public function drawCard();
    public function displayScore(string $card1, string $card2);
    public function addCard(array $remainCards, int $score);
}
