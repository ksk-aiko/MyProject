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

/*
 * タスク分解する
 *
 * データ構造を決める
 * 入力値を取得する
 * データを処理しやすい形に変換する
 * 合計時間を算出する
 * チャンネルごとの視聴分数と視聴回数を算出する
 * 表示する
 *
 * データ構造を決める。ここが一番大事。これを決めれば実装できる
 * [ch => [min, min], ch => [min, min], ...]
 * ie. [1 => [30, 15], 2 => [30] ]
*/

const SPLIT_LENGTH = 2;
//入力値を扱いやすい形（データ構造）に変換する関数
function getInput()
{
    $argument = array_slice($_SERVER['argv'], 1);
    // [[1, 30], [5, 25], ...]
    return array_chunk($argument, SPLIT_LENGTH);
}
//目的のデータ構造に変換する関数
function groupChannelViewingPeriods(array $inputs): array
{
    //配列を初期化、準備
    $channelViewingPeriods = [];
    foreach ($inputs as $input) {
        // キーを準備
        $chan = $input[0];
        // 値を変数に代入
        $min = $input[1];
        // 配列にする
        $mins = [$min];


        if (array_key_exists($chan, $channelViewingPeriods)) {
            $mins = array_merge($channelViewingPeriods[$chan], $mins);
        }
        // [キー => 配列] のデータを作る
        $channelViewingPeriods[$chan] = $mins;
    }
    //配列全体を返す
    return $channelViewingPeriods;
}
//視聴分数の合計時間を算出する関数
function calculateTotalHour(array $channelViewingPeriods): float
{
    $viewingTimes = [];
    foreach ($channelViewingPeriods as $period) {
        //配列$viewingTimesにチャンネルそれぞれの値（配列）を結合して、再代入する
        $viewingTimes = array_merge($viewingTimes, $period);
    }
    //総和を求めて、$totalMinに代入する
    $totalMin = array_sum($viewingTimes);

    //１行で書くとこう↓
    // array_sum(array_merge(...$channelViewingPeriods));

    //単位を時間に変換し、小数点第一位まで表示して値を返す
    return round($totalMin / 60, 1);
}
//結果を表示する関数
function display(array $channelViewingPeriods): void
{
    $totalHour = calculateTotalHour($channelViewingPeriods);
    echo $totalHour . PHP_EOL;
    //配列それぞれのキーと値を取り出して、チャンネル名・合計視聴分数・視聴回数を表示する
    foreach ($channelViewingPeriods as $chan => $mins) {
        echo $chan . ' ' . array_sum($mins) . ' ' . count($mins) . PHP_EOL;
    }
}

$inputs = getInput();
$channelViewingPeriods = groupChannelViewingPeriods($inputs);
display($channelViewingPeriods);
