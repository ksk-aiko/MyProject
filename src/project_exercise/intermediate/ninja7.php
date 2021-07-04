<?php

$list[] = ['name' => 'A', 'test' => [10, 3, 5]];
$list[] = ['name' => 'B', 'test' => [7, 9]];
$list[] = ['name' => 'C', 'test' => []];
$list[] = ['name' => 'D', 'test' => ""];
$list[] = ['name' => 'E', 'test' => [7]];
$list[] = ['name' => 'F', 'hoge' => []];


$nameAndAvr = [];
foreach ($list as $nameAndScore) {

    $nameAndAvr[] = [$nameAndScore['name'] => (array_sum($nameAndScore['test'])) / count($nameAndScore['test'])];

}

var_dump($nameAndAvr);

foreach ($nameAndAvr as $key => $value) {
    if (!is_int($value)) {
        $value = 0;
    }
    echo "{$key}:{$value}" . nl2br(PHP_EOL);
}
