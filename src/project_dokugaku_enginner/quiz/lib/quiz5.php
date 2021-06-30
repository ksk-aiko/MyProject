<?php
/*
$ages = [
    'Nakata' => 34,
    'Abe' => 25,
    'Kato' => 32,
    'Watanabe' => 29,
    'Fukuzawa' => 42,
];
*/

/*
//名前の昇順
$ages = [
    'Nakata' => 34,
    'Abe' => 25,
    'Kato' => 32,
    'Watanabe' => 29,
    'Fukuzawa' => 42,
];
ksort($ages);
*/


//年齢の降順
$ages = [
    'Nakata' => 34,
    'Abe' => 25,
    'Kato' => 32,
    'Watanabe' => 29,
    'Fukuzawa' => 42,
];
arsort($ages);
var_dump($ages);
