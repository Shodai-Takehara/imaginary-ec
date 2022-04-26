<?php
function sanitize($before)
{
  foreach ($before as $key => $value) {
    $after[$key] = htmlspecialchars($value, ENT_QUOTES, "UTF-8");
  }
  return $after;
}

function isGood($user_id, $item_id)
{
  try {
    // $user = 'user1';
    // $password = 'pass1';
    $user = 'b2022';
    $password = 'dB4bApUK';
    // $dbName = 'ec';
    $dbName = 'b202211';
    $host = 'localhost:3306';
    $dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // likesテーブルからitemIDとユーザーIDが一致したレコードを取得するSQL文
    $sql = 'SELECT * FROM likes WHERE user_id = :user_id AND item_id = :item_id';
    // クエリ実行
    $stm = $pdo->prepare($sql);
    $stm->bindValue(":user_id", $user_id, PDO::PARAM_INT);
    $stm->bindValue(":item_id", $item_id, PDO::PARAM_INT);
    $stm->execute();
    if ($stm->rowCount()) {
      return true;
    } else {
      return false;
    }
  } catch (Exception $e) {
    error_log('エラー発生:' . $e->getMessage());
  }
}
