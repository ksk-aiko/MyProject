<?php


require_once('Player.php');

class ThreePlayer implements Participant
{
    public Player $player1;
    public Player $player2;
    public Player $player3;
}