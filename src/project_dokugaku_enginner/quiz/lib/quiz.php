<?php

/*
【クイズ】テレビの視聴時間

◯お題
あなたはテレビが好きすぎて、プログラミングの学習が捗らないことに悩んでいました。
テレビをやめれば学習時間が増えることは分かっているのですけど、テレビをすぐに辞めることができないでいます。
そこで、一日のテレビの視聴分数を記録することから始めようと思い、プログラムを書くことにしました。
テレビを見るたびにチャンネルごとの視聴分数をメモしておき、一日の終わりに記録します。テレビの合計視聴時間と、チャンネルごとの視聴分数と視聴回数を出力してください。

◯インプット
入力は以下の形式で与えられます。

テレビのチャンネル 視聴分数 テレビのチャンネル 視聴分数 ...

ただし、同じチャンネルを複数回見た時は、それぞれ分けて記録すること。

チャンネル：数値を指定すること。1〜12の範囲とする（1ch〜12ch）
視聴分数：分数を指定すること。1〜1440の範囲とする

◯アウトプット
テレビの合計視聴時間
テレビのチャンネル 視聴分数 視聴回数
テレビのチャンネル 視聴分数 視聴回数
...

ただし、閲覧したチャンネルだけ出力するものとする。

視聴時間：時間数を出力すること。小数点一桁までで、端数は四捨五入すること

◯インプット例

1 30 5 25 2 30 1 15

◯アウトプット例

1.7
1 45 2
2 30 1
5 25 1

◯実行コマンド例
php quiz.php 1 30 5 25 2 30 1 15
*/
function totalViewTime($array)
{
    $totalViewTime = 0;
    for ($i = 0; $i < count($array); $i++) {
        $viewMinutes = (int) $array[$i][1];
        $totalViewTime += $viewMinutes;
    }
    return $totalViewTime;
}


function showViews($array)
{
    foreach ($array as $view) {
        echo (int) $view[0] . ' ' . (int) $view[1] . PHP_EOL;
    }
}

function addCount($array)
{
    for ($i = 0; $i < count($array); $i++) {
        $array[$i][2] = 1;
    }
    return $array;
}

function mergeAssoc($array)
{
    if ($array[0][0] === $array[3][0]) {
        $array[0][1] += $array[3][1];
        $array[0][2] += $array[3][2];
        array_pop($array);
        return $array;
    }
}

function showResult($array)
{
    foreach ($array as $view) {
        echo $view[0] . ' ' . $view[1] . ' ' . $view[2] . PHP_EOL;
    }
}

$file = array_shift($argv);
//2の意味がわかりにくいので、定数で定義
// $views = array_chunk($argv, 2);
const SPLIT_LENGTH = 2;
$views = array_chunk($argv, SPLIT_LENGTH);
for ($i = 0; $i < count($views); $i++) {
    $views[$i][] = 0;
}
$totalViewTime = totalViewTime($views);
$totalHour = $totalViewTime / 60;
echo round($totalHour, 1) . PHP_EOL;
$countAdded = addCount($views);
$mergedArray = mergeAssoc($countAdded);
showResult($mergedArray);
