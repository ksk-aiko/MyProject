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
        breed VARCHAR(30),
        color VARCHAR(20),
        sex VARCHAR(10),
        birthplace VARCHAR(20),
        PRIMARY KEY (id)
        )"
);
