<?php

namespace BlackJack;


class ThreePlayer
{
    public string $nameOfPlayer1;
    public string $nameOfPlayer2;
    public string $nameOfPlayer3;
    public string $card1OfPlayer1;
    public string $card2OfPlayer1;
    public string $card1OfPlayer2;
    public string $card2OfPlayer2;
    public string $card1OfPlayer3;
    public string $card2OfPlayer3;

    public function __construct(string $nameOfPlayer1, string $nameOfPlayer2, string $nameOfPlayer3)
    {
        $this->nameOfPlayer1 = $nameOfPlayer1;
        $this->nameOfPlayer2 = $nameOfPlayer2;
        $this->nameOfPlayer3 = $nameOfPlayer3;
    }

    public function drawCard(): array
    {
        $card = new Card();
        $cards = $card->cards;
        shuffle($cards);
        $this->card1OfPlayer1 = array_shift($cards);
        echo "{$this->nameOfPlayer1}の引いたカードは{$this->card1OfPlayer1}です" . PHP_EOL;
        shuffle($cards);
        $this->card2OfPlayer1 = array_shift($cards);
        echo "{$this->nameOfPlayer1}の引いたカードは{$this->card2OfPlayer1}です" . PHP_EOL;
        shuffle($cards);
        $this->card1OfPlayer2 = array_shift($cards);
        echo "{$this->nameOfPlayer2}}の引いたカードは{$this->card1OfPlayer2}です" . PHP_EOL;
        shuffle($cards);
        $this->card2OfPlayer2 = array_shift($cards);
        echo "{$this->nameOfPlayer2}}の引いたカードは{$this->card2OfPlayer2}です" . PHP_EOL;
        shuffle($cards);
        $this->card1OfPlayer3 = array_shift($cards);
        echo "{$this->nameOfPlayer3}}の引いたカードは{$this->card1OfPlayer3}です" . PHP_EOL;
        shuffle($cards);
        $this->card2OfPlayer3 = array_shift($cards);
        echo "{$this->nameOfPlayer3}}の引いたカードは{$this->card2OfPlayer3}です" . PHP_EOL;
        //ここを改善する
        return [$this->card1OfPlayer1, $this->card2OfPlayer1, $this->card1OfPlayer2, $this->card2OfPlayer2, $this->card1OfPlayer3, $this->card2OfPlayer3, $cards];
    }

    public function displayScoreOfPlayer1(string $card1, string $card2): int
    {
        $key1 = mb_substr($card1, 1, mb_strlen($card1) - 1);
        $key2 = mb_substr($card2, 1, mb_strlen($card2) - 1);
        $scoreOfPlayer1 = Card::CARD_SCORES[$key1] + Card::CARD_SCORES[$key2];
        echo "{$this->nameOfPlayer1}の現在の得点は{$scoreOfPlayer1}点です" . PHP_EOL;
        return $scoreOfPlayer1;
    }

    public function displayScoreOfPlayer2(string $card1, string $card2): int
    {
        $key1 = mb_substr($card1, 1, mb_strlen($card1) - 1);
        $key2 = mb_substr($card2, 1, mb_strlen($card2) - 1);
        $scoreOfPlayer2 = Card::CARD_SCORES[$key1] + Card::CARD_SCORES[$key2];
        echo "{$this->nameOfPlayer2}の現在の得点は{$scoreOfPlayer2}点です" . PHP_EOL;
        return $scoreOfPlayer2;
    }

    public function displayScoreOfPlayer3(string $card1, string $card2): int
    {
        $key1 = mb_substr($card1, 1, mb_strlen($card1) - 1);
        $key2 = mb_substr($card2, 1, mb_strlen($card2) - 1);
        $scoreOfPlayer3 = Card::CARD_SCORES[$key1] + Card::CARD_SCORES[$key2];
        echo "{$this->nameOfPlayer3}の現在の得点は{$scoreOfPlayer3}点です" . PHP_EOL;
        return $scoreOfPlayer3;
    }

    public function addCardOfPlayer1(array $remainCards, int $score)
    {
        $stdin = '';
        while ($score <= 21) {
            echo 'カードを引きますか(Y/N):';
            $stdin = trim(fgets(STDIN));
            if ($stdin === 'Y' || $stdin === 'y') {
                shuffle($remainCards);
                $card = array_shift($remainCards);
                echo "{$this->nameOfPlayer1}の引いたカードは{$card}です" . PHP_EOL;
                if ($this->isAce($card)) {
                    $scoreOfAce = $this->chooseAceScore();
                    $score += $scoreOfAce;
                }
                $score += Card::CARD_SCORES[substr($card, 1, strlen($card) - 1)];
            } elseif ($stdin === 'N' || $stdin === 'n') {
                break;
            } else {
                echo '正しい文字を入力してください' . PHP_EOL;
            }

            if ($score >= 22) {
                echo "点数が21点を超えました。{$this->nameOfPlayer1}はゲームオーバーです。'" . PHP_EOL;
            } else {
                echo "{$this->nameOfPlayer1}の現在の得点は{$score}点です" . PHP_EOL;
            }
        }

        return [$remainCards, $score];
    }

    public function addCardOfPlayer2(array $remainCards, int $score)
    {
        while ($score < 17) {
            echo "{$this->nameOfPlayer2}がカードを引きます" . PHP_EOL;
            shuffle($remainCards);
            $card = array_shift($remainCards);
            echo "{$this->nameOfPlayer2}の引いたカードは{$card}です" . PHP_EOL;
            if ($this->isAce($card)) {
                $scoreOfAce = $this->determineAceScore($score);
                $score += $scoreOfAce;
            }
            $score += Card::CARD_SCORES[substr($card, 1, strlen($card) - 1)];

            if ($score >= 22) {
                echo "点数が21点を超えました。{$this->nameOfPlayer2}はゲームオーバーです。" . PHP_EOL;
            } else {
                echo "{$this->nameOfPlayer2}の現在の得点は{$score}点です" . PHP_EOL;
            }
        }
        return [$remainCards, $score];

    }

    public function addCardOfPlayer3(array $remainCards, int $score)
    {
        while ($score < 17) {
            echo "{$this->nameOfPlayer3}がカードを引きます" . PHP_EOL;
            shuffle($remainCards);
            $card = array_shift($remainCards);
            echo "{$this->nameOfPlayer3}の引いたカードは{$card}です" . PHP_EOL;
            if ($this->isAce($card)) {
                $scoreOfAce = $this->determineAceScore($score);
                $score += $scoreOfAce;
            }
            $score += Card::CARD_SCORES[substr($card, 1, strlen($card) - 1)];

            if ($score >= 22) {
                echo "点数が21点を超えました。{$this->nameOfPlayer3}はゲームオーバーです。" . PHP_EOL;
            } else {
                echo "{$this->nameOfPlayer3}の現在の得点は{$score}点です" . PHP_EOL;
            }
        }
        return [$remainCards, $score];

    }

    public function isAce(string $card): bool
    {
        $cardNumber = (int) substr($card, 1, strlen($card) - 1);

        if ($cardNumber === 1) {
            return true;
        }
        return false;
    }

    private function chooseAceScore(): int
    {
        echo 'Aの点数を選んでください(1or10):';
        $stdin = (int) trim(fgets(STDIN));
        if ($stdin === 1) {
            $scoreOfAce = 1;
        } elseif ($stdin === 10) {
            $scoreOfAce = 10;
        }
        echo '正しい数字を入力してください';

        return $scoreOfAce;
    }

    private function determineAceScore(int $score): int
    {
        if ($score <= 11) {
            $scoreOfAce = 10;
        }
        $scoreOfAce = 1;


        return $scoreOfAce;
    }
}
