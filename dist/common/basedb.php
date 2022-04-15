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

// function getConnection()
// {
//   if ($_SERVER["SERVER_NAME"] == "localhost") {
//     return new \mysqli("127.0.0.1", "root", "", "draughts");
//   } else {
//     $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
//     $cleardb_server = $cleardb_url["host"];
//     $cleardb_username = $cleardb_url["user"];
//     $cleardb_password = $cleardb_url["pass"];
//     $cleardb_db = substr($cleardb_url["path"], 1);
//     $active_group = 'default';
//     $query_builder = TRUE;
//     return new \mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
//   }
// }
