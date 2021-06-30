<?php

// 関数を定義する
// 可変長引数にする
function convertToNumber (...$cards):array {
    $results = [];
    foreach ($cards as $card) {
        if (2 <= $card[1] && $card[1] <= 9) {
            $results[] = $card[1];
        } elseif ($card[2] === 0) {
            $results[] = 10;
        } else {
            $results[] = $card[1];
        }
    }
    // 配列を返す
    return $results;
}

// $results = convertToNumber('C7');
