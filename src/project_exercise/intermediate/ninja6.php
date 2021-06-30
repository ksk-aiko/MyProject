<?php

$list =['a', 'b', 'a', 'a', 'A', '1', 'b', 1];
$arrayAssoc = array_count_values($list);
foreach ($arrayAssoc as $key => $value) {
    echo "{$key}:{$value}" . nl2br(PHP_EOL);
}
