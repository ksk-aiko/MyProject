<?php
/*
データ構造
{ch => [min, min, min...], ch => [min, min , min...]}
視聴回数は配列の要素数から算出する
*/

const SPLIT_LENGTH = 2;

function getInput()
{
    //コマンドラインからの入力を配列で取得
    $arguments = array_slice($_SERVER['argv'], 1);
    //配列を2個ずつ区切って、配列として返す
    // $chunkedArg = array_chunk($arguments, 2);←マジックナンバーは使わない
    $chunkedArg = array_chunk($arguments, SPLIT_LENGTH);
    return $chunkedArg;
}

function groupChannelViewingPeriod($inputs)
{
    //作りたいものの大枠から作っていく
    $channelViewingPeriods = [];
    //中身を作る
    foreach ($inputs as $input) {
        $chan = $input[0];
        $min = $input[1];
        $mins = [$min];

        if (array_key_exists($chan, $channelViewingPeriods)) {
            $mins = array_merge($channelViewingPeriods[$chan], $mins); //今どの枠にいるのか考えろ！
        }
        $channelViewingPeriods[$chan] = $mins;
    }
    return $channelViewingPeriods; //繰り返しの範囲をよく見ろ！
}

function calculateTotalViewingHour(array $channelViewingPeriods): float//←型をしっかり明示する
{
        $viewingTimes = [];
        foreach ($channelViewingPeriods as $channelViewing) {
            $viewingTimes = array_merge($viewingTimes, $channelViewing);
        }
        $totalMin = array_sum($viewingTimes);
        return round($totalMin/60, 1);
}

function display($channelViewingPeriods): void
{
    $totalHour = calculateTotalViewingHour($channelViewingPeriods);
    echo $totalHour. PHP_EOL;
    foreach ($channelViewingPeriods as $chan => $mins) {
        echo $chan . ' ' . array_sum($mins) . ' ' . count($mins) . PHP_EOL;
    }
}

// $input = getInput();←実体を正確に表す変数名にする
$inputs = getInput();
$channelViewingPeriods = groupChannelViewingPeriod($inputs);
display($channelViewingPeriods);
