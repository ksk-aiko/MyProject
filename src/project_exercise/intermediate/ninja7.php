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

$array = [];
for ($i=0; $i<count($nameAndAvr); $i++) {
    foreach ($nameAndAvr[$i] as $key => $value) {
        if (!is_int($value)) {
            $value = 0;
        }
        $array[$key] = $value;
    }
}

arsort($array);

foreach ($array as $key => $value) {
    echo "{$key}:{$value}" . PHP_EOL;
}
