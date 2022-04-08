<?php
// itemがある場合
if (isset($_POST['itemId']) && $_POST['userId']) {
  $user_id = $_POST["userId"];
  $item_id = $_POST["itemId"];
  try {
    //DB接続
    require_once("basedb.php");
    // likesテーブルからitemIDとユーザーIDが一致したレコードを取得するSQL文
    $sql = 'SELECT * FROM likes WHERE user_id = :user_id AND item_id = :item_id';
    // クエリ実行
    $stm = $pdo->prepare($sql);
    $stm->bindValue(":user_id", $user_id, PDO::PARAM_INT);
    $stm->bindValue(":item_id", $item_id, PDO::PARAM_INT);
    $stm->execute();
    $resultCount = $stm->rowCount();
    // レコードが1件でもある場合
    if (!empty($resultCount)) {
      // レコードを削除する
      $sql = 'DELETE FROM likes WHERE user_id = :user_id AND item_id = :item_id';
      $stm = $pdo->prepare($sql);
      $stm->bindValue(":user_id", $user_id, PDO::PARAM_INT);
      $stm->bindValue(":item_id", $item_id, PDO::PARAM_INT);
      // クエリ実行
      $stm->execute();
    } else {
      // レコードを挿入する
      $sql = 'INSERT INTO likes (user_id, item_id) VALUES (:user_id, :item_id)';
      $stm = $pdo->prepare($sql);
      $stm->bindValue(":user_id", $user_id, PDO::PARAM_INT);
      $stm->bindValue(":item_id", $item_id, PDO::PARAM_INT);
      // クエリ実行
      $stm->execute();
    }
  } catch (Exception $e) {
    error_log('エラー発生：' . $e->getMessage());
  }
}
