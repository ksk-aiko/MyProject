<?php

$list = [1, 2, [3, [4, 5], 6, 7], 8, [9]];

function is_numric_re($list) {
    foreach ($list as $num) {
        if (is_array($num)) {
            is_numric_re($num);
        } else {
            echo $num . nl2br(PHP_EOL);
        }
    }
}

is_numric_re($list);
