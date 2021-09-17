<?php

require_once('Participant.php');
require_once('Card.php');

class Player implements Participant
{
    public function __construct()
    {
    }

    public function drawCard(): array
    {
        $card = new Card();
        $cards = $card->cards;
        shuffle($cards);
        $this->card1 = array_shift($cards);
        echo "あなたの引いたカードは{$this->card1}です" . PHP_EOL;
        shuffle($cards);
        $this->card2 = array_shift($cards);
        echo "あなたの引いたカードは{$this->card2}です" . PHP_EOL;
        return $cards;
    }

    public function displayScore(string $card1, string $card2): int
    {
        $key1 = substr($card1, 1, strlen($card1) - 1);
        $key2 = substr($card2, 1, strlen($card2) - 1);
        $score = Card::CARD_SCORES[$key1] + Card::CARD_SCORES[$key2];
        echo "あなたの現在の得点は{$score}点です" . PHP_EOL;
        return $score;
    }

    public function addCard(array $remainCards, int $score)
    {
        $stdin = '';
        while ($score <= 21) {
            echo 'カードを引きますか(Y/N):';
            $stdin = trim(fgets(STDIN));
            if ($stdin === 'Y' || $stdin === 'y') {
                shuffle($remainCards);
                $card = array_shift($remainCards);
                echo "あなたの引いたカードは{$card}です" . PHP_EOL;
                $score += Card::CARD_SCORES[substr($card, 1, strlen($card) - 1)];
            } elseif ($stdin === 'N' || $stdin === 'n') {
                break;
            } else {
                echo '正しい文字を入力してください' . PHP_EOL;
            }
            echo "あなたの現在の得点は{$score}点です" . PHP_EOL;
        }
        if ($score > 22) {
            echo 'ゲームオーバーです' . PHP_EOL;
        } else {
            echo 'ディーラーのターンに入ります' . PHP_EOL;
        }
    }
}
