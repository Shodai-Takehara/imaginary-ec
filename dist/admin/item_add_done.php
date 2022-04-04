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
  <title>商品登録実行画面</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <?php
  try {
    require_once("../common/common.php");
    $post = sanitize($_POST);
    $name = $post["name"];
    $set_price = $post["set_price"];
    $sale_price = $post["sale_price"];
    $category = $post["category"];
    $brand = $post["brand"];
    $stock = $post["stock"];
    $size = $post["size"];
    $gender = $post["gender"];
    $image = $post["image"];
    $description = $post["description"];

    require_once("../common/basedb.php");

    $sql = "INSERT INTO items(name, set_price, sale_price, category_id, brand_id, stock, size, gender, image, description)
            VALUES(:name, :set_price, :sale_price, :category_id, :brand_id, :stock, :size, :gender, :image, :description)";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(":name", $name, PDO::PARAM_STR);
    $stm->bindValue(":set_price", $set_price, PDO::PARAM_INT);
    $stm->bindValue(":sale_price", $sale_price, PDO::PARAM_INT);
    $stm->bindValue(":category_id", $category, PDO::PARAM_INT);
    $stm->bindValue(":brand_id", $brand, PDO::PARAM_INT);
    $stm->bindValue(":stock", $stock, PDO::PARAM_INT);
    $stm->bindValue(":size", $size, PDO::PARAM_STR);
    $stm->bindValue(":gender", $gender, PDO::PARAM_INT);
    $stm->bindValue(":image", $image);
    $stm->bindValue(":description", $description, PDO::PARAM_STR);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
  } catch (Exception $e) {
    print "只今障害が発生しております。<br><br>";
    print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
    exit();
  }
  ?>

  商品を追加しました。<br><br>
  <?php include "admin_menu.php" ?>

</body>

</html>
