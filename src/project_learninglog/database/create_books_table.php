<?php

require_once('mysqli.php');

function dropTable($link)
{
    $dropTable = 'DROP TABLE IF EXISTS books;';
    $results = mysqli_query($link, $dropTable);
    if ($results) {
        echo 'テーブルを削除しました' . PHP_EOL;
    } else {
        echo 'Error: テーブルを削除できませんでした' . PHP_EOL;
        echo 'Debugging error: ' . mysqli_error($link) . PHP_EOL;
    }
}

function createTable($link)
{
    $createTable = <<<EOT
    CREATE TABLE books (
        id INT NOT NULL AUTO_INCREMENT,
        title VARCHAR(20),
        PRIMARY KEY (id)
      );
    EOT;

    $results = mysqli_query($link, $createTable);
    if ($results) {
        echo 'テーブルを作成しました' . PHP_EOL;
    } else {
        echo 'Error: テーブルを作成できませんでした' . PHP_EOL;
        echo 'Debugging error: ' . mysqli_error($link) . PHP_EOL;
    }
}




$link = dbConnect();
dropTable($link);
createTable($link);
mysqli_close($link);
