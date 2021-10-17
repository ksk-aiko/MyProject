<?php

class AutoPlayer implements Player
{
    public string $name;
    public string $card1;
    public string $card2;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function drawCard(array $remainCards): array
    {
        shuffle($remainCards);
        $this->card1 = array_shift($remainCards);
        echo "プレイヤー２の引いたカードは{$this->card1}です" . PHP_EOL;
        shuffle($remainCards);
        $this->card2 = array_shift($remainCards);
        echo "プレイヤー２の引いたカードは{$this->card2}です" . PHP_EOL;
        return $remainCards;
    }

    public function displayScore(string $card1, string $card2): int
    {
        $key1 = substr($card1, 1, strlen($card1) - 1);
        $key2 = substr($card2, 1, strlen($card2) - 1);
        $score = Card::CARD_SCORES[$key1] + Card::CARD_SCORES[$key2];
        echo "プレイヤー２の現在の得点は{$score}点です" . PHP_EOL;
        return $score;
    }

    public function addCard(array $remainCards, int $score): array
    {
        while ($score < 17) {
            echo 'プレイヤー２のターンです' . PHP_EOL;
            shuffle($remainCards);
            $card = array_shift($remainCards);
            echo "プレイヤー２の引いたカードは{$card}です" . PHP_EOL;
            if ($this->isAce($card)) {
                $scoreOfAce = $this->determineAceScore($score);
                $score += $scoreOfAce;
            } else {
                $score += Card::CARD_SCORES[substr($card, 1, strlen($card) - 1)];
            }
            echo "プレイヤー２の現在の得点は{$score}点です" . PHP_EOL;
        }
        return [$remainCards, $score];
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
