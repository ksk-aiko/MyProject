<?php

$list = [-1, 0, 1, "2", "3A", 4.1, [5], "1,000", 1001];
//配列から整数のみ取り出した配列を作成

//foreachで1要素ずつ出力
foreach ($list as $number) {
    if (is_numeric($number)) {
        echo $number . nl2br(PHP_EOL);
    }
}
