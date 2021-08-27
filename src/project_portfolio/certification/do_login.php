<?php

$user = $_POST['user'];
$pass = $_POST['pass'];

if (strcmp($user, 'satou') == 0 && strcmp($pass, 'webtext') == 0) {
    header('Location: item_list.php');
} else {
    header('Location: login_failed.html');
}