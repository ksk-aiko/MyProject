<?php

namespace BlackJack;

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
        $scoreOfPlayer = $player->displayScore($player->card1, $player->card2);
        $cardsAndScore = $player->addCard($remainCards, $scoreOfPlayer);
        $remainCards = $cardsAndScore[0];
        $scoreOfPlayer = $cardsAndScore[1];
        if ($scoreOfPlayer <= 21) {
            $scoreOfDealer = $dealer->displayScore($dealer->card1, $dealer->card2);
            $scoreOfDealer = $dealer->addCard($remainCards, $scoreOfDealer);
            $this->judge($scoreOfPlayer, $scoreOfDealer);
        }
        echo 'ディーラーの勝ちです' . PHP_EOL;
        echo 'ブラックジャックを終了します' . PHP_EOL;
    }

    private function judge(int $scoreOfPlayer, int $scoreOfDealer): void
    {
        if ($scoreOfDealer >= 22) {
            echo 'あなたの勝ちです！' . PHP_EOL;
        } elseif ($scoreOfPlayer > $scoreOfDealer) {
            echo 'あなたの勝ちです！' . PHP_EOL;
        } elseif ($scoreOfPlayer < $scoreOfDealer) {
            echo 'ディーラーの勝ちです' . PHP_EOL;
        }
        echo '引き分けです' . PHP_EOL;

        echo 'ブラックジャックを終了します' . PHP_EOL;
    }
}
