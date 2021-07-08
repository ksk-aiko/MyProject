<?php

$url = 'https://example.com/a/b/c.php?d=1&e=2#f';
// $component = parse_url($url, PHP_URL_QUERY);
// $chars = str_split($component);
// echo "{$chars[0]}:{$chars[2]}" . PHP_EOL;
// echo "{$chars[4]}:{$chars[6]}" . PHP_EOL;

$p = parse_url($url);
var_dump($p);
$q = explode("&", $p['query']);
var_dump($q);
foreach ($q as $s) {
    $h = explode("=", $s);
    if (count($h) === 2) {
        echo "{$h[0]}:{$h[1]}" . PHP_EOL;
    }
}
