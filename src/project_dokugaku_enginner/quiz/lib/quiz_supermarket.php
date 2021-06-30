<?php

function getInput()
{
    $arguments = $_SERVER['argv'];
    $arg = array_slice($arguments, 1);
    // $time = $arg[0];
    $arrayId = array_slice($arg, 1);
    return $arrayId;
}

function getTime()
{
    $arguments = $_SERVER['argv'];
    $arg = array_slice($arguments, 1);
    $time = array_shift($arg);
    $formattedTime = $time[0] . $time[1] . PHP_EOL;
    return  (int) $formattedTime;
}

function getNameAndPrice(array $arrayId): array
{
    $buyAssoc = [];
    foreach ($arrayId as $id) {
        $buyAssoc[] = LISTS[$id];
    }
    return $buyAssoc;
}

function getEachPrice($buyAssoc)
{
    $buyPrice = array_column($buyAssoc, 'price');
    return $buyPrice;
}

function discount(array $arrayId)
{
    $countValues = array_count_values($arrayId);
    return $countValues;
}

function calculate(array $buyPrice, array $countValues): int
{
    $payment = array_sum($buyPrice);
    // var_dump($payment);
    if ($countValues['1'] >= 3 && $countValues['1'] < 5) {
        $payment -= 50;
    } elseif ($countValues['1'] >= 5) {
        $payment -= 100;
    }
    // var_dump($payment);
    return $payment;
}

function setDiscount()
{
    $boxLunches = [7, 8];
    $drinks = [5, 9, 10];
    $discountSets = [];
    foreach ($boxLunches as $boxLunch) {
        foreach ($drinks as $drink) {
            $discountSets[] = [$boxLunch, $drink];
        }
    }
    return $discountSets;
}

function discountLunchDrink($arrayId, $discountSets, $firstPayment)
{
    $commons = [];
    foreach ($discountSets as $discountSet) {
        $common = array_intersect($arrayId, $discountSet);
        if (count($common) === 2) {
            $commons[] = $common;
        }
    }
    $discountTimes = count($commons);
    $secondPayment = $firstPayment - (20 * $discountTimes);
    return $secondPayment;
}

function discountTime($formattedTime, $secondPayment)
{
    if ($formattedTime >= 20 && $formattedTime <= 23) {
        $payment = $secondPayment / 2;
    } else {
        $payment = $secondPayment;
    }
    return $payment;
}

const TAX = 1.1;
const LISTS = [
    1 => [
        'name' => '玉ねぎ',
        'price' => 100
    ],
    2 => [
        'name' => '人参',
        'price' => 150
    ],
    3 => [
        'name' => 'りんご',
        'price' => 200
    ],
    4 => [
        'name' => 'ぶどう',
        'price' => 350
    ],
    5 => [
        'name' => '牛乳',
        'price' => 180
    ],
    6 => [
        'name' => '卵',
        'price' => 220
    ],
    7 => [
        'name' => '唐揚げ弁当',
        'price' => 440
    ],
    8 => [
        'name' => 'のり弁',
        'price' => 380
    ],
    9 => [
        'name' => 'お茶',
        'price' => 80
    ],
    10 => [
        'name' => 'コーヒー',
        'price' => 100
    ]

];
$arrayId = getInput();
$formattedTime = getTime();
$countValues = discount($arrayId);
$buyAssoc = getNameAndPrice($arrayId);
$buyPrice = getEachPrice($buyAssoc);
$firstPayment = calculate($buyPrice, $countValues);
$discountSets = setDiscount();
$secondPayment = discountLunchDrink($arrayId, $discountSets, $firstPayment);
$payment = discountTime($formattedTime, $secondPayment);
$totalPayment = round($payment * TAX);
echo $totalPayment . PHP_EOL;
