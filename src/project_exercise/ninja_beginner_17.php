<?php

//$xの+を東、-を西とする
//$yの+を北、-を南とする

//方角と地点を表示する関数を定義する
function direcDis(string $direction, int $distance):array
{
    $x = 0;
    $y = 0;

    switch ($direction) {
        case '東':
            $x += $distance;
            break;
        case '西':
            $x -= $distance;
            break;
        case '南':
            $y -= $distance;
            break;
        case '北':
            $y += $distance;
            break;
        default:
            echo '方角を入力してください' . PHP_EOL;


        }
        return array($x, $y);
}
function direcAdd(array $result, string $direction, int $distance):array
{
    $x = $result[0];
    $y = $result[1];

    switch ($direction) {
        case '東':
            $x += $distance;
            break;
        case '西':
            $x -= $distance;
            break;
        case '南':
            $y -= $distance;
            break;
        case '北':
            $y += $distance;
            break;
        default:
            echo '方角を入力してください' . PHP_EOL;


        }
        return array($x, $y);
}

function show(array $result):void
{
    $x = $result[0];
    $y = $result[1];

    if ($x < 0) {
        $direction1 = '西';
    } elseif (0 < $x) {
        $direction1 = '東';
    }

    if ($y < 0) {
        $direction2 = '南';
    } elseif (0 < $y) {
        $direction2 = '北';
    }

    echo $direction1 . abs($x) . 'Km' . $direction2 . abs($y) . 'Km' . PHP_EOL;

    }


$result1 = direcDis('南', 4);
$result2 = direcAdd($result1, '東', 6);
$result3 = direcAdd($result2, '北', 5);
$result4 = direcAdd($result3, '西', 8);
show($result4);
