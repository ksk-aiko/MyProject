<?php

const CARDS = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 1]

function showDown(string $card1_1, string $card1_2, string $card2_1, string $card2_2) {
// プレイヤー１の役を判定する
    // カードの数値部分のみ取り出す
    $numCard1_1 = substr($card1_1, 1);
    $numCard1_2 = substr($card1_2, 1);
if ($numCard1_1 === $numCard1_2) {
    $role1 = 'pair';
}
// プレイヤー2の役を判定する

// ２つの役を比較する

// 勝者を決める

//引き分けの場合は $winner = 0;


    return [$role1, $role2, $winner];
}
