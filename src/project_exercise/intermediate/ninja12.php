<?php

$v =  "abcdefghijklmnopqrstuvwxyz";
$result = wordwrap($v, 7, "<br>", true);
echo $result;