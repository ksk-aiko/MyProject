<?php

namespace BlackJack;

require_once('Card.php');

class OnePlayer
{
    public string $name;
    public string $card1;
    public string $card2;
    public function __construct(string $name)
    {
        $this->name = $name;
    }


    public function drawCard()
    {
        $card = new Card();
        $cards = $card->cards;
        shuffle($cards);
        $this->card1 = array_shift($cards);
        echo "{$this->name}の引いたカードは{$this->card1}です" . PHP_EOL;
        shuffle($cards);
        $this->card2 = array_shift($cards);
        echo "{$this->name}の引いたカードは{$this->card2}です" . PHP_EOL;
        return $cards;
    }

    public function displayScore(string $card1, string $card2): int
    {
        $preIndexCard1 = mb_strpos($card1, 'の');
        $preIndexCard2 = mb_strpos($card2, 'の');
        $key1 = mb_substr($card1, $preIndexCard1 + 1);
        $key2 = mb_substr($card2, $preIndexCard2 + 1);
        $score = Card::CARD_SCORES[$key1] + Card::CARD_SCORES[$key2];
        echo "{$this->name}の現在の得点は{$score}点です" . PHP_EOL;
        return $score;
    }

    public function addCard(array $remainCards, int $score): array
    {
        $stdin = '';
        while ($score <= 21) {
            echo 'カードを引きますか(Y/N):';
            $stdin = trim(fgets(STDIN));
            if ($stdin === 'Y' || $stdin === 'y') {
                shuffle($remainCards);
                $card = array_shift($remainCards);
                echo "{$this->name}の引いたカードは{$card}です" . PHP_EOL;
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
                echo "点数が21点を超えました。{$this->name}はゲームオーバーです。" . PHP_EOL;
            } else {
                echo "{$this->name}の現在の得点は{$score}点です" . PHP_EOL;
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
}
