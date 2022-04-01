<?php
require_once "../common/admin_header.php";
// session_regenerate_id(true);
if (isset($_SESSION["login"])) {
  echo $_SESSION["admin_name"] . "さんログイン中";
  echo "<br><br>";
} else {
  echo "ログインしていません。<br><br>";
  echo "<a href='admin_login.php'>ログイン画面へ</a>";
  exit();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規管理者追加チェック</title>
</head>

<body>

  <?php
  $name = $_POST["name"];
  $password = $_POST["password"];
  $password_conf = $_POST["password-conf"];

  if (empty($name) === true) {
    echo "名前が入力されていません。<br><br>";
  } else {
    echo $name;
    echo "<br><br>";
  }

  if (empty($password) === true) {
    echo "パスワードが入力されていません。<br><br>";
  }

  if ($password != $password_conf) {
    echo "パスワードが異なります。<br><br>";
  }

  if (empty($name) || empty($password) || $password != $password_conf) {
    echo <<<EOF
      <form>
        <input type='button' onclick='history.back()' value='戻る'>
      </form>
    EOF;
  } else {
    echo <<<EOF
      上記スタッフを追加しますか？<br><br>
      <form action='admin_add_done.php' method='POST'>
        <input type='hidden' name='name' value='{$name}'>
        <input type='hidden' name='password' value='{$password}'>
        <input type='button' onclick='history.back()' value='戻る'>
        <input type='submit' value='追加'>
      </form>
    EOF;
  }
  ?>
</body>

</html>
