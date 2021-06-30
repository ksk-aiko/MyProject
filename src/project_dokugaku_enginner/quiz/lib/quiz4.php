<?php

//1.trueと表示される←正解！
//2.1がbool型で判定されるため←正解！
//3.
//整数の型宣言をする←不正解でした！

/*
$number = 1;
    switch($number) {
    case true:
        echo 'true' . PHP_EOL;
        break;
    case 1:
        echo 1 . PHP_EOL;
        break;
    default:
        echo 'default' . PHP_EOL;
        break;
}
*/

//正解は、「if文を使い、厳密な比較を行う」
//switch文では、暗黙的変換が行われてしまう。
$number = 1;
if ($number === true) {
    echo 'true' . PHP_EOL;
} elseif ($number === 1) {
    echo 1 . PHP_EOL;
} else {
    echo 'default' . PHP_EOL;
}
