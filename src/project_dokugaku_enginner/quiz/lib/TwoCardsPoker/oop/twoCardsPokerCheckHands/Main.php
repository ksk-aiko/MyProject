<?php

require_once(__DIR__ . '/TwoCardsPokerCheckHands.php');

$game = new TwoCardsPokerCheckHands(['CA', 'DA'], ['C9', 'H10']);

$hands = $game->start();
var_dump($hands);