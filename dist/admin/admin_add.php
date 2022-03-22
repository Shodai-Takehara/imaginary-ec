<?php
// session_start();
// session_regenerate_id(true);
// if (isset($_SESSION["login"]) === false) {
//   echo "ログインしていません。<br><br>";
//   echo "<a href='admin_login.php'>ログイン画面へ</a>";
//   exit();
// } else {
//   echo $_SESSION["name"] . "さんログイン中";
//   echo "<br><br>";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>管理者追加画面</title>
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
      <input type="button" onclick="history.back()" value="戻る">
      <input type="submit" value="確認">
    </form>
  </body>

</html>
