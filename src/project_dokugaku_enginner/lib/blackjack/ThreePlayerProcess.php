<?php

namespace BlackJack;

require_once('ManualPlayer.php');
require_once('AutoPlayer.php');
require_once('TwoPlayer.php');

class ThreePlayerProcess
{
    public function __construct()
    {
    }

    public function threePlayerProcess()
    {
        $player1 = new ManualPlayer('あなた');
        $player2 = new AutoPlayer('プレイヤー２');
        $player3 = new AutoPlayer('プレイヤー3');

        $threePlayer = new ThreePlayer($player1, $player2, $player3);
        $cardsOfThreePlayer = $threePlayer->drawCard();
        $dealer = new Dealer($cardsOfThreePlayer[6]);
        $dealer->drawCard();
        $scoreOfPlayer1 = $threePlayer->displayScoreOfPlayer1($cardsOfThreePlayer[0], $cardsOfThreePlayer[1]);
        $scoreOfPlayer2 = $threePlayer->displayScoreOfPlayer2($cardsOfThreePlayer[2], $cardsOfThreePlayer[3]);
        $scoreOfPlayer3 =
            $threePlayer->displayScoreOfPlayer3($cardsOfThreePlayer[4], $cardsOfThreePlayer[5]);
        $cardsAndScoreOfPlayer1 = $threePlayer->addCardOfPlayer1($cardsOfThreePlayer[6], $scoreOfPlayer1);
        $remainCardsAndScoreOfPlayer2 = $threePlayer->addCardOfPlayer2($cardsAndScoreOfPlayer1[0], $scoreOfPlayer2);
        $cardsAndScoreOfPlayer3 = $threePlayer->addCardOfPlayer3($remainCardsAndScoreOfPlayer2[0], $scoreOfPlayer3);

        $dealer->displayScore($dealer->card1, $dealer->card2);
        $dealer->addCard($cardsAndScoreOfPlayer3[0], $dealer->score);
        $this->judge($cardsAndScoreOfPlayer1[1], $remainCardsAndScoreOfPlayer2[1], $cardsAndScoreOfPlayer3[1], $dealer->score);
        echo 'ブラックジャックを終了します' . PHP_EOL;
    }

    private function judge(int $scoreOfPlayer1, int $scoreOfPlayer2, int $scoreOfPlayer3, int $scoreOfDealer): void
    {
        $scores = [
            'あなた' => $scoreOfPlayer1,
            'プレイヤー２' => $scoreOfPlayer2,
            'プレイヤー3' => $scoreOfPlayer3,
            'ディーラー' => $scoreOfDealer
        ];
        arsort($scores, SORT_NUMERIC);
        $filterScores = array_filter($scores, fn ($score) => $score < 22);
        if (count(array_unique($filterScores)) === 1) {
            echo '今回の勝負は引き分けです' . PHP_EOL;
        } else {
            foreach ($filterScores as $key => $value) {
                $firstKey = $key;
                break;
            }
            echo "{$firstKey}の勝ちです！" . PHP_EOL;
        }
    }
}
