<?php

require __DIR__ . '/../../vendor/autoload.php';

function dbConnect()
{

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();

    $db_host = $_ENV['DB_HOST'];
    $db_username = $_ENV['DB_USERNAME'];
    $db_pass = $_ENV['DB_PASSWORD'];
    $db_database = $_ENV['DB_DATABASE'];


    $link = mysqli_connect($db_host, $db_username, $db_pass, $db_database);

    if (!$link) {
        error_log('Error: データベースに接続できませんでした');
        error_log('Debugging error: ' . mysqli_connect_error());
        exit;
    }

    return $link;
}
