<?php

$list1 = [1, "a", "3" => "b", "c" => 2];
$list2 = [-1, 0, "3" => "d", "c" => 1];

print_r(array_merge($list1, $list2));
