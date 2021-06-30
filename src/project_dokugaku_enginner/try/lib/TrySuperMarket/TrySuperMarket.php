<?php
/*【クイズ】スーパーの支払金額

◯お題
スーパーで買い物したときの支払金額を計算するプログラムを書きましょう。
以下の商品リストがあります。先頭の数字は商品番号です。金額は税抜です。

玉ねぎ 100円
人参 150円
りんご 200円
ぶどう 350円
牛乳 180円
卵 220円
唐揚げ弁当 440円
のり弁 380円
お茶 80円
コーヒー 100円
また、以下の条件を満たすと割引されます。

a. 玉ねぎは3つ買うと50円引き
b. 玉ねぎは5つ買うと100円引き
c. 弁当と飲み物を一緒に買うと20円引き（ただし適用は一組ずつ）
d. お弁当は20〜23時はタイムセールで半額

合計金額（税込み）を求めてください。

◯仕様
金額を計算するcalc関数を定義してください。
calcメソッドは「購入時刻 商品番号 商品番号 商品番号 ...」を引数に取り、合計金額（税込み）を返します。
購入時刻はHH:MM形式（例. 20:00）とし、商品番号は1〜10の整数とします。
同時に買える商品は20個までです。また、購入時刻は9〜23時です。

◯実行例

calc('21:00', [1, 1, 1, 3, 5, 7, 8, 9, 10])  //=> 1298
*/
const TAX = 10;
function discountOnion(array $items):int
{
    //引数で与えられた配列の中の1の回数を返す
    $onionDiscountPrice = 0;
    $countItems = array_count_values($items);
    //1が3以上であれば50円引き、5以上であれば100円引きする
    if ($countItems[1] >= 5) {
        $onionDiscountPrice = 100;
    } elseif ($countItems >= 3) {
        $onionDiscountPrice = 50;
    }

    return $onionDiscountPrice;

}

function setDiscount(array $items):int
{
    $drink = 0;
    $lunchbox = 0;
    foreach ($items as $item) {
        if (LISTS[$item]['type'] === 'drink') {
            $drink++;
        } elseif (LISTS[$item]['type'] === 'lunchbox') {
            $lunchbox++;
        }
    }
    $discountPrice = 0;
    if($drink === 0 && $lunchbox === 0) {
        $discountPrice = 0;
    } elseif ($drink === $lunchbox) {
        $discountPrice = 20;
    }

    return $discountPrice;
}

function timeSale(string $time, $items):int
{
    $timeNumber = strtotime($time);
    $saleStart = strtotime('21:00');
    $saleFinish = strtotime('23:59');
    foreach ($items as $item) {
        $lunchPrice = LISTS[$item]['price'];
        if (LISTS[$item]['type'] === 'lunchbox') {
            if ($saleStart <= $timeNumber && $timeNumber <= $saleFinish) {
                $lunchDiscountPrice = $lunchPrice * 0.5;
            }

        }
    }
    return $lunchDiscountPrice;
}
function calc (string $time, array $items):int
{
    //商品の合計金額を求める
    //配列から値を取り出し、priceキーの値を合計する
    $totalPrice = 0;
    foreach ($items as $item) {
        $totalPrice += LISTS[$item]['price'];
    }
    $onionDiscountPrice = discountOnion($items);
    $totalPrice -= $onionDiscountPrice;
    $discountPrice = setDiscount($items);
    $totalPrice -= $discountPrice;
    $lunchDiscountPrice = timeSale('21:00', $items);
    $totalPrice -= $lunchDiscountPrice;

    $finalPrice = round($totalPrice * ((100 + TAX) / 100));
    return $finalPrice;
}


const LISTS = [

    1 => ['price' => 100, 'type' => ''],
    2 => ['price' => 150, 'type' => ''],
    3 => ['price' => 200, 'type' => ''],
    4 => ['price' => 350, 'type' => ''],
    5 => ['price' => 180, 'type' => 'drink'],
    6 => ['price' => 220, 'type' => ''],
    7 => ['price' => 440, 'type' => 'lunchbox'],
    8 => ['price' => 380, 'type' => 'lunchbox'],
    9 => ['price' => 80, 'type' => 'drink'],
    10 => ['price' => 100, 'type' => 'drink']

];

$test = strtotime('21:00');

var_dump($test);

?>
