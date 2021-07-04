<?php

$list =['a', 'b', 'a', 'a', 'A', '1', 'b', 1];
// $arrayAssoc = array_count_values($list);
// foreach ($arrayAssoc as $key => $value) {
//     echo "{$key}:{$value}" . nl2br(PHP_EOL);
// }

$array = [];
foreach ($list as $item) {
    if (!array_key_exists($item, $array)) {
        $array[$item] = 1;
    } else {
        $array[$item]++;
    }
}

foreach ($array as $key => $value) {
    echo "{$key}:{$value}" . PHP_EOL;
    
}
