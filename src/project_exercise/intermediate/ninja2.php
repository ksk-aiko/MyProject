<?php

$numbers = [-1, 10, 3, 2.5, 2, 1, 0];
asort($numbers);
foreach ($numbers as $number ) {
    echo $number . nl2br(PHP_EOL);
}
