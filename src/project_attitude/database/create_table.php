<?php

require_once('mysqli.php');

function createTable($link)
{
    $createTable = <<<EOT
    DROP TABLE IF EXISTS tests;
    CREATE TABLE tests (
        id INT NOT NULL AUTO_INCREMENT,
        content VARCHAR(255),
        PRIMARY KEY (id)
    );
    EOT;

    $results = mysqli_query($link, $createTable);
    if ($results) {
        echo 'テーブルを作成しました' . PHP_EOL;
    } else {
        echo '【Error】テーブルを作成できませんでした' . PHP_EOL;
        echo '【Debugging error】: ' . mysqli_error($link) . PHP_EOL;
    }
}



$link = dbConnect();
createTable($link);
mysqli_close($link);

?>
