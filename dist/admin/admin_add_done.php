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
    $sql = "INSERT INTO admins(name, password) VALUES(:name, :password)";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(":name", $_POST["name"], PDO::PARAM_STR);
    // passwordの暗号化
    $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $stm->bindValue(":password", $hash, PDO::PARAM_STR);
    $stm->execute();
    $id = $pdo->lastInsertId(); // AUTO INCREMENTの主キーを取得
    echo "スタッフを追加しました。<br><br>";
  } catch (Exception $e) {
    echo "<a href='./admin_add.php'>追加画面へ</a>";
  }
  ?>
  <?php include "admin_menu.php" ?>
</body>

</html>
