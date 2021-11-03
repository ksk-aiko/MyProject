<?php

namespace BlackJack;

require_once('TwoPlayer.php');
require_once('Process.php');

class TwoPlayerProcess implements Process
{
    public function __construct()
    {
    }

    public function proceedProcess()
    {
        $twoPlayer = new TwoPlayer('あなた', 'プレイヤー２');
        $cardsOfTwoPlayer = $twoPlayer->drawCard();
        $dealer = new Dealer($cardsOfTwoPlayer[4]);
        $dealer->drawCard();
        $scoreOfPlayer1 = $twoPlayer->displayScoreOfPlayer1($cardsOfTwoPlayer[0], $cardsOfTwoPlayer[1]);
        $cardsAndScoreOfPlayer1 = $twoPlayer->addCardOfPlayer1($cardsOfTwoPlayer[4], $scoreOfPlayer1);
        $scoreOfPlayer2 = $twoPlayer->displayScoreOfPlayer2($cardsOfTwoPlayer[2], $cardsOfTwoPlayer[3]);
        $remainCardsAndScoreOfPlayer2 = $twoPlayer->addCardOfPlayer2($cardsAndScoreOfPlayer1[0], $scoreOfPlayer2);
        $dealer->displayScore($dealer->card1, $dealer->card2);
        $dealer->addCard($remainCardsAndScoreOfPlayer2[0], $dealer->score);
        $result = $this->judge($cardsAndScoreOfPlayer1[1], $remainCardsAndScoreOfPlayer2[1], $dealer->score);
        echo $result;
        echo 'ブラックジャックを終了します' . PHP_EOL;
    }

    private function judge(int $scoreOfPlayer1, int $scoreOfPlayer2, int $scoreOfDealer): string
    {
        $scores = [
            'あなた' => $scoreOfPlayer1,
            'プレイヤー２' => $scoreOfPlayer2,
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
