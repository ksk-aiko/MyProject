<?php

// 台形の面積を求める
// 公式を使う
// 関数を定義する
function trapezoidalArea(int $upper, int $bottom, int $height): int
{
    return (($upper + $bottom) * $height) / 2;
}

$area = trapezoidalArea(4, 8, 16);
echo $area . PHP_EOL;
