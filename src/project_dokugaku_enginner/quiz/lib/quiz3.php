<?php

const MAX_NAME_LENGTH = 10;

echo '名前を入力してください' . PHP_EOL;
$name = trim(fgets(STDIN));
//数字の１０が何を意味しているのかわかりにくいので、定数で表現。
// if (mb_strlen($name) < 10)
if (mb_strlen($name) < MAX_NAME_LENGTH) {
    echo '名前の長さはOK！' . PHP_EOL;
} else {
    echo '名前が長すぎます' . PHP_EOL;
}
