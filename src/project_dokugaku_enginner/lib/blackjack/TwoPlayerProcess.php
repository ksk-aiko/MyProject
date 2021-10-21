<?php

require_once('ManualPlayer.php');
require_once('AutoPlayer.php');
require_once('TwoPlayer.php');

class TwoPlayerProcess
{
    public function __construct()
    {
        
    }

    public function twoPlayerProcess()
    {
        $player1 = new ManualPlayer('あなた');
        $player2 = new AutoPlayer('プレイヤー２');
        $twoPlayer = new TwoPlayer($player1, $player2);
        $cardsOfTwoPlayer = $twoPlayer->drawCard();
        $dealer = new Dealer($cardsOfTwoPlayer[4]);
        $dealer->drawCard();
        $scoreOfPlayer1 = $twoPlayer->displayScoreOfPlayer1($cardsOfTwoPlayer[0], $cardsOfTwoPlayer[1]);
        $scoreOfPlayer2 = $twoPlayer->displayScoreOfPlayer2($cardsOfTwoPlayer[2], $cardsOfTwoPlayer[3]);
        $cardsAndScoreOfPlayer1 = $twoPlayer->addCardOfPlayer1($cardsOfTwoPlayer[4], $scoreOfPlayer1);
        $remainCardsAndScoreOfPlayer2 = $twoPlayer->addCardOfPlayer2($cardsAndScoreOfPlayer1[0], $scoreOfPlayer2);
        $dealer->displayScore($dealer->card1, $dealer->card2);
        $dealer->addCard($remainCardsAndScoreOfPlayer2[0], $dealer->score);
        $this->judge($cardsAndScoreOfPlayer1[1], $remainCardsAndScoreOfPlayer2[1], $dealer->score);
    }

    private function judge(int $scoreOfPlayer1, int $scoreOfPlayer2, int $scoreOfDealer): void
    {
        $arg = [
            'あなた' => $scoreOfPlayer1,
            'プレイヤー２' => $scoreOfPlayer2,
            'ディーラー' => $scoreOfDealer
        ];
        arsort($arg, SORT_NUMERIC);
       
    }
}
