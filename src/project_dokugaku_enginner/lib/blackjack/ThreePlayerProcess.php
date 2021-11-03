<?php

namespace BlackJack;

require_once('ThreePlayer.php');
require_once('Process.php');

class ThreePlayerProcess implements Process
{
    public function __construct()
    {
    }

    public function proceedProcess()
    {
        $threePlayer = new ThreePlayer('あなた', 'プレイヤー２', 'プレイヤー３');
        $cardsOfThreePlayer = $threePlayer->drawCard();
        $dealer = new Dealer($cardsOfThreePlayer[6]);
        $dealer->drawCard();
        $scoreOfPlayer1 = $threePlayer->displayScoreOfPlayer1($cardsOfThreePlayer[0], $cardsOfThreePlayer[1]);
        $player1Info = $threePlayer->addCardOfPlayer1($cardsOfThreePlayer[6], $scoreOfPlayer1);
        $scoreOfPlayer2 = $threePlayer->displayScoreOfPlayer2($cardsOfThreePlayer[2], $cardsOfThreePlayer[3]);
        $player2Info = $threePlayer->addCardOfPlayer2($player1Info[0], $scoreOfPlayer2);
        $scoreOfPlayer3 =
            $threePlayer->displayScoreOfPlayer3($cardsOfThreePlayer[4], $cardsOfThreePlayer[5]);
        $player3Info = $threePlayer->addCardOfPlayer3($player2Info[0], $scoreOfPlayer3);

        $dealer->displayScore($dealer->card1, $dealer->card2);
        $dealer->addCard($player3Info[0], $dealer->score);
        //ここを改善する
        $result = $this->judge($player1Info[1], $player2Info[1], $player3Info[1], $dealer->score);
        echo $result;
        echo 'ブラックジャックを終了します' . PHP_EOL;
    }

    public function judge(int $scoreOfPlayer1, int $scoreOfPlayer2, int $scoreOfPlayer3, int $scoreOfDealer): string
    {
        $scores = [
            'あなた' => $scoreOfPlayer1,
            'プレイヤー２' => $scoreOfPlayer2,
            'プレイヤー3' => $scoreOfPlayer3,
            'ディーラー' => $scoreOfDealer
        ];
        arsort($scores, SORT_NUMERIC);
        $filterScores = array_filter($scores, fn ($score) => $score < 22);
        array_values($filterScores);
        if (count($filterScores) === 0) {
            return '今回の勝負は引き分けです' . PHP_EOL;
        }
        if (count($filterScores) !== count(array_unique($filterScores))) {
            $arg = array_count_values($filterScores);
            if ($arg[max(array_unique($filterScores))] >= 2) {
                return '今回の勝負は引き分けです' . PHP_EOL;
            }
        }
        foreach ($filterScores as $key => $value) {
            $firstKey = $key;
            break;
        }
        return "{$firstKey}の勝ちです！" . PHP_EOL;
    }
}
