<?php require_once "../common/admin_header.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  try {
    require_once "../common/basedb.php";
    $sql = "SELECT * FROM admins";
    $stm = $pdo->query($sql);
    foreach ($stm as $row) {
      echo $row['admin_id'] . "番";
      echo $row['name'] . "さん";
      echo "<br>";
    }
  } catch (Exception $e) {
    echo "只今障害が発生しております。<br><br>";
    echo "<a href='admin_login.php'>戻る</a>";
  }
  ?>
  <br>
  <?php include "admin_menu.php" ?>
</body>

</html>
