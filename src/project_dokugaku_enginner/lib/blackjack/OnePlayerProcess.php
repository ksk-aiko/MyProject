<?php

namespace BlackJack;

require_once('ManualPlayer.php');
require_once('OnePlayer.php');

class OnePlayerProcess
{
    public function __construct()
    {
    }

    public function onePlayerProcess()
    {
        $player1 = new ManualPlayer('あなた');
        $onePlayer = new OnePlayer($player1);
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
            $this->judge($scoreOfPlayer, $scoreOfDealer);
        } else {
            echo 'ディーラーの勝ちです' . PHP_EOL;
        }
    }

    private function judge(int $scoreOfPlayer, int $scoreOfDealer): void
    {
        if ($scoreOfDealer >= 22) {
            echo 'あなたの勝ちです！' . PHP_EOL;
        } elseif ($scoreOfPlayer > $scoreOfDealer) {
            echo 'あなたの勝ちです！' . PHP_EOL;
        } elseif ($scoreOfPlayer < $scoreOfDealer) {
            echo 'ディーラーの勝ちです' . PHP_EOL;
        } else {
            echo '今回の勝負は引き分けです' . PHP_EOL;
        }

        echo 'ブラックジャックを終了します' . PHP_EOL;
    }
}
