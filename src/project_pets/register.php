<?php

try{
$pdo = new PDO(
    'mysql:host=db;dbname=book_log;charset=utf8mb4',
    'book_log',
    'pass',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
);

$pdo->query("INSERT INTO pets (breed) VALUES ('{$_POST['breed']}')");

$stmt = $pdo->query("SELECT * FROM pets");
  $result = $stmt->fetchAll();
  var_dump($result);
} catch (PDOException $e) {
  echo $e->getMessage() . PHP_EOL;
  exit;
}
