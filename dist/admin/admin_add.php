<?php
require_once "../common/admin_header.php";
session_regenerate_id(true);
if (isset($_SESSION["admin_login"])) {
  echo $_SESSION["admin_name"] . "さんログイン中";
  echo "<br><br>";
} else {
  echo "ログインしていません。<br><br>";
  echo "<a href='admin_login.php'>ログイン画面へ</a>";
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規管理者追加画面</title>
</head>

<body>

  <body>
    <form action="admin_add_check.php" method="POST">
      管理者追加<br><br>
      管理者名<br>
      <input type="text" name="name">
      <br><br>
      パスワード<br>
      <input type="password" name="password">
      <br><br>
      パスワード再入力<br>
      <input type="password" name="password-conf">
      <br><br>
      <input type="submit" value="確認">
    </form>
    <?php include "admin_menu.php" ?>
  </body>

</html>
