<?php

namespace BlackJack;

class ThreePlayer
{
    public string $nameOfPlayer1;
    public string $nameOfPlayer2;
    public string $nameOfPlayer3;
    public string $card1_1;
    public string $card1_2;
    public string $card2_1;
    public string $card2_2;
    public string $card3_1;
    public string $card3_2;

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
        $this->card1_1 = array_shift($cards);
        echo "{$this->nameOfPlayer1}の引いたカードは{$this->card1_1}です" . PHP_EOL;
        shuffle($cards);
        $this->card1_2 = array_shift($cards);
        echo "{$this->nameOfPlayer1}の引いたカードは{$this->card1_2}です" . PHP_EOL;
        shuffle($cards);
        $this->card2_1 = array_shift($cards);
        echo "{$this->nameOfPlayer2}の引いたカードは{$this->card2_1}です" . PHP_EOL;
        shuffle($cards);
        $this->card2_2 = array_shift($cards);
        echo "{$this->nameOfPlayer2}の引いたカードは{$this->card2_2}です" . PHP_EOL;
        shuffle($cards);
        $this->card3_1 = array_shift($cards);
        echo "{$this->nameOfPlayer3}の引いたカードは{$this->card3_1}です" . PHP_EOL;
        shuffle($cards);
        $this->card3_2 = array_shift($cards);
        echo "{$this->nameOfPlayer3}の引いたカードは{$this->card3_2}です" . PHP_EOL;
        //ここを改善する
        return [$this->card1_1, $this->card1_2, $this->card2_1, $this->card2_2, $this->card3_1, $this->card3_2, $cards];
    }

    public function displayScoreOfPlayer1(string $card1, string $card2): int
    {
        $key1 = mb_substr($card1, mb_strpos($card1, 'の') + 1);
        $key2 = mb_substr($card2, mb_strpos($card2, 'の') + 1);
        $scoreOfPlayer1 = Card::CARD_SCORES[$key1] + Card::CARD_SCORES[$key2];
        echo "{$this->nameOfPlayer1}の現在の得点は{$scoreOfPlayer1}点です" . PHP_EOL;
        return $scoreOfPlayer1;
    }

    public function displayScoreOfPlayer2(string $card1, string $card2): int
    {
        $key1 = mb_substr($card1, mb_strpos($card1, 'の') + 1);
        $key2 = mb_substr($card2, mb_strpos($card2, 'の') + 1);
        $scoreOfPlayer2 = Card::CARD_SCORES[$key1] + Card::CARD_SCORES[$key2];
        echo "{$this->nameOfPlayer2}の現在の得点は{$scoreOfPlayer2}点です" . PHP_EOL;
        return $scoreOfPlayer2;
    }

    public function displayScoreOfPlayer3(string $card1, string $card2): int
    {
        $key1 = mb_substr($card1, mb_strpos($card1, 'の') + 1);
        $key2 = mb_substr($card2, mb_strpos($card2, 'の') + 1);
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
                } else {
                    $score += Card::CARD_SCORES[mb_substr($card, mb_strpos($card, 'の') + 1)];
                }
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
            } else {
                $score += Card::CARD_SCORES[mb_substr($card, mb_strpos($card, 'の') + 1)];
            }

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
            } else {
                $score += Card::CARD_SCORES[mb_substr($card, mb_strpos($card, 'の') + 1)];
            }

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
        $cardNumber = mb_substr($card, mb_strpos($card, 'の') + 1);

        if ($cardNumber === 'A') {
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
        } else {
            echo '正しい数字を入力してください';
        }

        return $scoreOfAce;
    }

    private function determineAceScore(int $score): int
    {
        $scoreOfAce = 1;
        if ($score <= 11) {
            $scoreOfAce = 10;
        }

        return $scoreOfAce;
    }
}
