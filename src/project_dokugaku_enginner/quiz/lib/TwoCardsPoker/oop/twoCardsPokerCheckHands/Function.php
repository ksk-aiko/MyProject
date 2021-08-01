<?php

function whetherStraight(array $playerCardRank): bool
{
    if (abs($playerCardRank[0] - $playerCardRank[1]) === 1) {
        return true;
    } else {
        return false;
    }
}

function whetherPair(array $playerCardRank): bool
{
    if ($playerCardRank[0] === $playerCardRank[1]) {
        return true;
    } else {
        return false;
    }
}
