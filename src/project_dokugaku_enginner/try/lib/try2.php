<?php

const SPLIT_LENGTH = 2;
const BREADS = [
    1 => 100,
    2 => 120,
    3 => 150,
    4 => 250,
    5 => 80,
    6 => 120,
    7 => 100,
    8 => 180,
    9 => 50,
    10 => 300
];
const TAX = 10;

function getInput(): array
{
    $argument = array_slice($_SERVER['argv'], 1);
    $args = array_chunk($argument, SPLIT_LENGTH);
    $sales = [];
    foreach ($args as $arg) {
        $sales[$arg[0]] = (int) $arg[1];
    }
    return $sales;
}

function calculateTotalSales(array $sales): int
{
    //総売上を定義する
    $sum = 0;
    //①入力された配列のキーと値の情報を元に、定数（配列）にアクセスする。
    //②①で抽出したデータから売上を求め、総売上に再代入する
    foreach ($sales as $number => $sold) {
        $sum += BREADS[$number] * $sold;
    }
    //③税率を加味し、結果を返す
    return $sum * ((100 + TAX) / 100);
}

function showMaxSales(array $sales): array
{
    //連想配列の値のみを、配列として返し、最大値を求める
    $max = max(array_values($sales));
    //最大値からキーを割り出し、そのキーを返す
    return array_keys($sales, $max);
}
function showMinSales(array $sales): array
{
    //上に同じ
    $min = min(array_values($sales));
    return array_keys($sales, $min);
}


function display(array ...$results): void
{
    foreach ($results as $result) {
        echo implode(' ', $result) . PHP_EOL;
    }
}




$sales = getInput();
display([calculateTotalSales($sales)], showMaxSales($sales), showMinSales($sales));
