<?php

$path = '/var/www/html/example.com/index.html';
$disassembledPath = explode('/', $path);
array_splice($disassembledPath, 3, 0, 'test');
$result = implode('/', $disassembledPath);
echo $result . PHP_EOL;
