<?php
// $user = 'user1';
// $password = 'pass1';
$user = 'b2022';
$password = 'dB4bApUK';
$dbName = 'ec';
// $dbName = 'b202211';
$host = 'localhost:3306';
$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
