<?php

const CARDS = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 1];

function showDown(string $card1_1, string $card1_2, string $card2_1, string $card2_2) {
// プレイヤー１の役を判定する
    // カードの数値部分のみ取り出す
    $numCard1_1 = substr($card1_1, 1);
    $numCard1_2 = substr($card1_2, 1);
    if ($numCard1_1 === $numCard1_2) {
        $role1 = 'pair';
    } elseif (abs($numCard1_1 - $numCard1_2) === 1 || abs($numCard1_1 - $numCard1_2) === 12 ) {
        $role1 = 'straight';
    } else {
        $role1 = 'high card';
    }

// プレイヤー2の役を判定する
    $numCard2_1 = substr($card2_1, 1);
    $numCard2_2 = substr($card2_2, 1);
    if ($numCard2_1 === $numCard2_2) {
        $role2 = 'pair';
    } elseif (abs($numCard2_1 - $numCard2_2) === 1 || abs($numCard2_1 - $numCard2_2) === 12) {
        $role2 = 'straight';
    } else {
        $role2 = 'high card';
    }

    // ２つの役を比較する
        // 役が違う場合
    if ($role1=== 'pair' && $role2 === 'straight') {
        $winner = 1;
    } elseif ($role1 === 'pair' && $role2 === 'highcard') {
        $winner = 1;
    } elseif ($role1 === 'straight' && $role2 === 'pair') {
        $winner = 2;
    } elseif ($role1 === 'straight' && $role2 === 'highcard') {
        $winner = 1;
    } elseif ($role1 === 'highcard' && $role2 === 'pair') {
        $winner = 2;
    } elseif ($role1 === 'highcard' && $role2 === 'straight') {
        $winner = 2;
    }

        // 役が同じ場合
    if ($role1 === 'high card' && $role2 === 'high card') {
        $max1 = max([$numCard1_1, $numCard1_2]);
        $max2 = max([$numCard2_1, $numCard2_2]);
        if ($max1 > $max2) {
            $winner = 1;
        } elseif ($max1 < $max2) {
            $winner = 2;
        } else {
            $min1 = min([$numCard1_1, $numCard1_2]);
            $min2 = min([$numCard2_1, $numCard2_2]);
            if ($min1 > $min2) {
                $winner = 1;
            } elseif ($min1 < $min2) {
                $winner = 2;
            } else {
                $winner = 0;
            }
        }
    } elseif ($role1 === 'pair' && $role2 === 'pair') {
        if ($numCard1_1 > $numCard2_1) {
            $winner = 1;
        } elseif ($numCard1_1 < $numCard2_1) {
            $winner = 2;
        } else {
            $winner = 0;
        }
    } elseif ($role1 === 'straight' && $role2 === 'straight') {
        $max1 = max([$numCard1_1, $numCard1_2]);
        $max2 = max([$numCard2_1, $numCard2_2]);
        if ($max1 > $max2) {
            $winner = 1;
        } elseif ($max1 < $max2) {
            $winner = 2;
        } else {
            $winner = 0;
        }
    }
// 勝者を決める
//引き分けの場合は $winner = 0;



    return [$role1, $role2, $winner];
}

// $result = showDown('H1', 'D1', 'S3', 'C3');
// var_dump($result);
$result = showDown('SA', 'DK', 'C2', 'CA');
var_dump($result);
