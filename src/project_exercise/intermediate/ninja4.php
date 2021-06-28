<?php

$list = ['A1', 'C2', 'B4', 'D3'];
$reversedList = array_reverse($list);
foreach ($reversedList as $key => $value) {
    echo "{$key}:{$value}<br>";
};
