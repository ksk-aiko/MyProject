<?php

require_once('Player.php');
require_once('Dealer.php');


class BlackJack
{
    public function __construct()
    {
        
    }

    public function start()
    {
        echo 'ブラックジャックを開始します' . PHP_EOL;
        $player = new Player();
        $remainCards = $player->drawCard();
        $dealer = new Dealer($remainCards);
        $remainCards = $dealer->drawCard();
        $score = $player->displayScore($player->card1, $player->card2);
        $player->addCard($remainCards, $score);
        
    }


}

