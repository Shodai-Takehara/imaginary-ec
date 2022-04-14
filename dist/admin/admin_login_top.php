<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
  try {
    require_once "../common/basedb.php";
    $sql = "SELECT * FROM admins WHERE admin_id = :admin_id AND name = :name";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(":admin_id", $_POST["admin_id"], PDO::PARAM_INT);
    $stm->bindValue(":name", $_POST["name"], PDO::PARAM_STR);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    if ($result) {
      if (password_verify($_POST["password"], $result["password"])) {
        $_SESSION["admin_login"] = true;
        $_SESSION["admin_id"] = $result["admin_id"];
        $_SESSION["admin_name"] = $result["name"];
      } else {
        header("Location:admin_add.php");
        exit();
      }
    } else {
      header("Location:admin_login.php");
      exit();
    }
  } catch (Exception $e) {
    echo "只今障害が発生しております。<br><br>";
    echo "<a href='admin_login.php'>戻る</a>";
  }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>管理者トップページ</title>
</head>

<body>
  <h1>管理者トップページ</h1>
  <hr>
  <?= $_SESSION["admin_name"] ?>さん、こんにちは。
  <a href="admin_logout.php">ログアウト</a>
  <hr>
  <?php include "admin_menu.php" ?>
</body>

</html>
