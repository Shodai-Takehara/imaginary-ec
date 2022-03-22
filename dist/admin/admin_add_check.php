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
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>管理者追加チェック</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>

  <?php
  require_once("../common/common.php");

  $post = sanitize($_POST);
  $name = $post["name"];
  $password = $post["password"];
  $password_conf = $post["password-conf"];

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
    $password = md5($password);
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
