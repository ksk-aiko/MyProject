<?php

$list = ['A1', 'A2', 'A3', 'A4'];
array_splice($list, 1, 1);
foreach ($list as $key => $value) {
    echo $key . ':' . $value . nl2br(PHP_EOL);
}
