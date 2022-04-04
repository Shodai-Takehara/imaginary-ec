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
  <title>商品登録チェック</title>
</head>

<body>
  商品登録確認画面<br><br>
  <?php

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
  $image = $_FILES["image"];
  $description = $post["description"];
  var_dump($image["name"]);


  if (empty($name)) {
    echo "商品名が入力されていません。<br><br>";
  } else {
    echo "商品名<br>";
    echo $name;
    echo "<br><br>";
  }

  if (preg_match("/\A[0-9]+\z/", $set_price) === 0) {
    echo "正しい値を入力してください。<br><br>";
  } else {
    echo "プロパー価格<br>";
    echo $set_price . "円";
    echo "<br><br>";
  }
  if (preg_match("/\A[0-9]+\z/", $sale_price) === 0) {
    echo "正しい値を入力してください。<br><br>";
  } else {
    echo "販売価格<br>";
    echo $sale_price . "円";
    echo "<br><br>";
  }

  if (empty($category)) {
    echo "カテゴリーが入力されていません。<br><br>";
  } else {
    echo "カテゴリーID<br>";
    echo $category;
    echo "<br><br>";
  }

  if (empty($brand)) {
    echo "ブランドが入力されていません。<br><br>";
  } else {
    echo "ブランドID<br>";
    echo $brand;
    echo "<br><br>";
  }

  if (empty($stock)) {
    echo "在庫が入力されていません。<br><br>";
  } else {
    echo "在庫数<br>";
    echo $stock . "個";
    echo "<br><br>";
  }

  if (empty($size)) {
    echo "サイズが入力されていません。<br><br>";
  } else {
    echo "サイズ<br>";
    echo $size;
    echo "<br><br>";
  }

  if (empty($gender)) {
    echo "ジェンダーが入力されていません。<br><br>";
  } else {
    echo "商品ジェンダー<br>";
    echo $gender;
    echo "<br><br>";
  }

  if ($image["size"] > 0) {
    if ($image["size"] > 1000000) {
      echo "ファイルのサイズは1MB以下にしてください。<br><br>";
    } else {
      move_uploaded_file($image["tmp_name"], "./images/" . $image["name"]);
      echo "<img src='./images/" . $image['name'] . "'>";
      echo "<br><br>";
    }
  }
  if (empty($description)) {
    echo "詳細が入力されていません。";
    echo "<br><br>";
  }
  if (mb_strlen($description) > 400) {
    echo "文字数は400文字が上限です。";
    echo "<br><br>";
  } else {
    echo "商品説明<br>";
    echo $description;
    echo "<br><br>";
  }

  if (empty($name) || preg_match("/\A[0-9]+\z/", $set_price) === 0 || $image["size"] > 1000000 || empty($description) || mb_strlen($description) > 400) {
    echo "<form>";
    echo "<input type='button' onclick='history.back()' value='戻る'>";
    echo "</form>";
  } else {
    echo "上記商品を追加しますか？<br><br>";
    echo "<form action='item_add_done.php' method='POST'>";
    echo "<input type='hidden' name='name' value='" . $name . "'>";
    echo "<input type='hidden' name='category' value='" . $category . "'>";
    echo "<input type='hidden' name='set_price' value='" . $set_price . "'>";
    echo "<input type='hidden' name='sale_price' value='" . $sale_price . "'>";
    echo "<input type='hidden' name='brand' value='" . $brand . "'>";
    echo "<input type='hidden' name='gender' value='" . $gender . "'>";
    echo "<input type='hidden' name='stock' value='" . $stock . "'>";
    echo "<input type='hidden' name='size' value='" . $size . "'>";
    echo "<input type='hidden' name='image' value='" . $image["name"] . "'>";
    echo "<input type='hidden' name='description' value='" . $description . "'>";
    echo "<input type='button' onclick='history.back()' value='戻る'>";
    echo "<input type='submit' value='登録'>";
    echo "</form>";
  }
  ?>
  <br>
  <?php include "admin_menu.php" ?>
</body>

</html>
