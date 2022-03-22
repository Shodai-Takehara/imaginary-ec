<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>スタッフ追加保存</title>
</head>

<body>

  <?php
  try {
    require_once "../common/basedb.php";
    // echo "データベース{$dbName}に接続しました" . "<br>";
    $sql = "INSERT INTO admins(name, password) VALUES(:name, :password)";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(":name", $_POST["name"], PDO::PARAM_STR);
    $stm->bindValue(":password", $_POST["password"], PDO::PARAM_STR);
    $stm->execute();
    echo "スタッフを追加しました。<br><br>";
  } catch (Exception $e) {
    echo "<a href='./admin_add.php'>追加画面へ</a>";
    echo "<a href='../admin_login/admin_login.php'>ログイン画面へ</a>";
  }
  ?>
  <a href="./admin_add.php">追加画面へ</a>
  <a href="admin_list.php">スタッフ一覧へ</a>

</body>

</html>
