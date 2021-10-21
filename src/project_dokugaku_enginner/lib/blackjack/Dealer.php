<?php

require_once('Participant.php');
require_once('Player.php');

class Dealer implements Participant
{
    public array $cards;
    public string $card1;
    public string $card2;
    public int $score;

    public function __construct(array $remainCards)
    {
        $this->cards = $remainCards;
    }

    public function drawCard()
    {
        shuffle($this->cards);
        $this->card1 = array_shift($this->cards);
        shuffle($this->cards);
        $this->card2 = array_shift($this->cards);
        echo "ディーラーの引いたカードは{$this->card1}です" . PHP_EOL;
        echo "ディーラーの引いたもう一枚のカードは分かりません" . PHP_EOL;
        return $this->cards;
    }

    public function displayScore(string $card1, string $card2): int
    {
        // echo 'ディーラーのターンに入ります' . PHP_EOL;
        echo "ディーラーの引いた２枚目のカードは{$this->card2}でした" . PHP_EOL;
        $key1 = substr($card1, 1, strlen($card1) - 1);
        $key2 = substr($card2, 1, strlen($card2) - 1);
        $score = Card::CARD_SCORES[$key1] + Card::CARD_SCORES[$key2];
        echo "ディーラーの現在の得点は{$score}点です" . PHP_EOL;
        $this->score = $score;
        return $score;
    }

    public function addCard(array $remainCards, int $score): int
    {
        while ($score < 17) {
            shuffle($remainCards);
            $card = array_shift($remainCards);
            echo "ディーラーの引いたカードは{$card}です" . PHP_EOL;
            if ($this->isAce($card)) {
                $scoreOfAce = $this->determineAceScore($score);
                $score += $scoreOfAce;
            } else {
                $score += Card::CARD_SCORES[substr($card, 1, strlen($card) - 1)];
            }
            echo "ディーラーの現在の得点は{$score}点です" . PHP_EOL;
        }
        $this->score = $score;
        return $score;
    }

    private function isAce(string $card): bool
    {
        $cardNumber = (int) substr($card, 1, strlen($card) - 1);

        if ($cardNumber === 1) {
            return true;
        } else {
            return false;
        }
    }

    private function determineAceScore(int $score): int
    {
        if ($score <= 11) {
            $scoreOfAce = 10;
        } else {
            $scoreOfAce = 1;
        }

        return $scoreOfAce;
    }
}
