<?php

require_once(__DIR__ . '/VendingMachine.php');

$juice = new VendingMachine(100,'cider');
$juice->start();