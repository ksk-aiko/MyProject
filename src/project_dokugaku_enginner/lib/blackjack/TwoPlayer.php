<?php


require_once('Player.php');

class TwoPlayer implements Participant
{
    public Player $player1;
    public Player $player2;
}