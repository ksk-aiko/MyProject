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
        $dealer->drawCard();
        
    }


}

