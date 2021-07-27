<?php

require_once(__DIR__ . '/TwoCardsPokerOop.php');

$game = new TwoCardsPokerOop(['CA', 'DA'], ['C10', 'H10']);
$results = $game->start();
print_r($results);