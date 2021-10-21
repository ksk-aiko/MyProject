<?php

require_once('Player.php');

class TwoPlayer implements Participant
{
    public Player $player1;
    public Player $player2;

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function drawCard(): array
    {
        $card = new Card();
        $cards = $card->cards;
        shuffle($cards);
        $this->player1->card1 = array_shift($cards);
        echo "あなたの引いたカードは{$this->player1->card1}です" . PHP_EOL;
        shuffle($cards);
        $this->player1->card2 = array_shift($cards);
        echo "あなたの引いたカードは{$this->player1->card2}です" . PHP_EOL;
        shuffle($cards);
        $this->player2->card1 = array_shift($cards);
        echo "プレイヤー２の引いたカードは{$this->player2->card1}です" . PHP_EOL;
        shuffle($cards);
        $this->player2->card2 = array_shift($cards);
        echo "プレイヤー２の引いたカードは{$this->player2->card2}です" . PHP_EOL;
        return [$this->player1->card1, $this->player1->card2, $this->player2->card1, $this->player2->card2, $cards];
    }

    public function displayScoreOfPlayer1(string $card1, string $card2): int
    {
        $key1 = mb_substr($card1, 1, mb_strlen($card1) - 1);
        $key2 = mb_substr($card2, 1, mb_strlen($card2) - 1);
        $scoreOfPlayer1 = Card::CARD_SCORES[$key1] + Card::CARD_SCORES[$key2];
        echo "{$this->player1->name}の現在の得点は{$scoreOfPlayer1}点です" . PHP_EOL;
        return $scoreOfPlayer1;
    }

    public function displayScoreOfPlayer2(string $card1, string $card2): int
    {
        $key1 = mb_substr($card1, 1, mb_strlen($card1) - 1);
        $key2 = mb_substr($card2, 1, mb_strlen($card2) - 1);
        $scoreOfPlayer2 = Card::CARD_SCORES[$key1] + Card::CARD_SCORES[$key2];
        echo "{$this->player2->name}の現在の得点は{$scoreOfPlayer2}点です" . PHP_EOL;
        return $scoreOfPlayer2;
    }

    public function addCardOfPlayer1(array $remainCards, int $score)
    {
        return $this->player1->addCard($remainCards, $score);
    }

    public function addCardOfPlayer2(array $remainCards, int $score)
    {
        return $this->player2->addCard($remainCards, $score);
    }

}