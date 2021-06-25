<?php

$pdo = new PDO(
    'mysql:host=db;dbname=book_log;charset=utf8mb4',
    'book_log',
    'pass'
);

$pdo->query("DROP TABLE IF EXISTS pets");
$pdo->query(
    "CREATE TABLE pets (
        id INT NOT NULL AUTO_INCREMENT,
        message VARCHAR(140),
        likes INT,
        PRIMARY KEY (id)
        )"
);
