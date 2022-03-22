<?php
require_once "../common/basedb.php";
try {
  require_once("../common/common.php");
  $post = sanitize($_POST);
  $admin_id = $post["admin_id"];
  $password = $post["password"];

  $sql = "SELECT name FROM admins WHERE admin_id = :admin_id AND password = :password";
  $stm = $pdo->prepare($sql);
  $stm->bindValue(":admin_id", $_POST["admin_id"], PDO::PARAM_INT);
  $stm->bindValue(":password", $_POST["password"], PDO::PARAM_STR);
  $stm->execute();
  $result = $stm->fetch(PDO::FETCH_ASSOC);
  if (isset($result["name"])) {
    session_start();
    $_SESSION["login"] = 1;
    $_SESSION["name"] = $result["name"];
    $_SESSION["admin_id"] = $admin_id;
    header("Location:admin_login.php");
    exit();
  } else {
    echo "入力が間違っています<br><br>";
    echo "<a href='admin_login.php'>戻る</a>";
  }
} catch (Exception $e) {
  echo "只今障害が発生しております。<br><br>";
  echo "<a href='admin_login.php'>戻る</a>";
}
