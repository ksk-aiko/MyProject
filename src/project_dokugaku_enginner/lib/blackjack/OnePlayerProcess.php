<?php

namespace BlackJack;

require_once('OnePlayer.php');
require_once('Process.php');

class OnePlayerProcess implements Process
{
    public function __construct()
    {
    }

    public function proceedProcess()
    {
        $onePlayer = new OnePlayer('あなた');
        $remainCards = $onePlayer->drawCard();
        $dealer = new Dealer($remainCards);
        $remainCards = $dealer->drawCard();
        $scoreOfPlayer = $onePlayer->displayScore($onePlayer->card1, $onePlayer->card2);
        $onePlayer->remainCards = $remainCards;
        $onePlayer->score = $scoreOfPlayer;
        $cardsAndScore = $onePlayer->addCard($remainCards, $scoreOfPlayer);
        $remainCards = $cardsAndScore[0];
        $scoreOfPlayer = $cardsAndScore[1];
        if ($scoreOfPlayer <= 21) {
            $scoreOfDealer = $dealer->displayScore($dealer->card1, $dealer->card2);
            $scoreOfDealer = $dealer->addCard($remainCards, $scoreOfDealer);
            $result = $this->judge($scoreOfPlayer, $scoreOfDealer);
            echo $result;
        } else {
            echo 'ディーラーの勝ちです' . PHP_EOL;
        }
        echo 'ブラックジャックを終了します' . PHP_EOL;
    }

    private function judge(int $scoreOfPlayer, int $scoreOfDealer): string
    {
        if ($scoreOfDealer >= 22) {
            return 'あなたの勝ちです！' . PHP_EOL;
        } elseif ($scoreOfPlayer > $scoreOfDealer) {
            return 'あなたの勝ちです！' . PHP_EOL;
        } elseif ($scoreOfPlayer < $scoreOfDealer) {
            return 'ディーラーの勝ちです' . PHP_EOL;
        } else {
            return '今回の勝負は引き分けです' . PHP_EOL;
        }


        echo 'ブラックジャックを終了します' . PHP_EOL;
    }
}
