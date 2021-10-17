<?php

require_once('ManualPlayer.php');
require_once('Player.php');

class OnePlayer implements Participant
{

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    public function drawCard()
    {
        return $this->player->drawCard();
    }

    public function displayScore()
    {
        return $this->player->displayScore($this->player->card1, $this->player->card2);
    }

    public function addCard(array $remainCards, int $score)
    {
        return $this->player->addCard($remainCards, $score);
    }
}
