<?php

$path = '/var/www/html/example.com/index.html';
// $disassembledPath = explode('/', $path);
// array_splice($disassembledPath, 3, 0, 'test');
// $result = implode('/', $disassembledPath);
// echo $result . PHP_EOL;

$dir = dirname($path);
$arr = explode('/', $dir);
array_splice($arr, 3, 0, 'test');
$dir = implode('/', $arr);
$path = $dir . '/' . basename($path);
echo $path . PHP_EOL;
