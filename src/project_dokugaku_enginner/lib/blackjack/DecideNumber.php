<?php

require_once('Participant.php');

class DecideNumber
{
    public string $card1;
    public string $card2;
    public array $remainCards;
    public int $score;
    
    public function __construct(Participant $player )
    {

        $this->player = $player;
    }

    public function drawCard()
    {
        return $this->player->drawCard();
    }

    public function displayScore(): int
    {
        return $this->player->displayScore();
    }

    public function addCard(array $remainCards, int $score): array
    {
        return $this->player->addCard($remainCards, $score);
    }
}