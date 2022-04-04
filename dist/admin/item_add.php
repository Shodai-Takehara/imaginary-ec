<?php
require_once "../common/admin_header.php";
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
  <title>商品登録</title>
</head>

<body>
  <form action="item_add_check.php" method="POST" enctype="multipart/form-data">
    商品登録画面<br><br>
    商品名<br>
    <input type="text" name="name" style="width: 500px;">
    <br><br>
    プロパー価格<br>
    <input type="text" name="set_price">
    <br><br>
    販売価格<br>
    <input type="text" name="sale_price">
    <br><br>
    カテゴリー<br>
    <select name="category">
      <option value="1">トップス</option>
      <option value="2">アウター</option>
      <option value="3">ボトムス</option>
      <option value="4">アクセサリー</option>
    </select>
    <br><br>
    ブランド名<br>
    <select name="brand">
      <option value="1">Polo Ralph Lauren</option>
      <option value="2">RRL</option>
      <option value="3">POLO SPORT</option>
      <option value="4">RLX</option>
      <option value="5">DENIM & SUPPLY</option>
      <option value="6">RUGBY</option>
      <option value="7">Purple Label</option>
    </select>
    <br><br>
    在庫数<br>
    <select name="stock">
      <option value="1" selected>1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    <br><br>
    サイズ<br>
    <select name="size">
      <option value="xs">XS</option>
      <option value="s">S</option>
      <option value="m">M</option>
      <option value="l">L</option>
      <option value="xl">XL</option>
      <option value="free">FREE</option>
    </select>
    <br><br>
    ジェンダー<br>
    <select name="gender">
      <option value="1">男性</option>
      <option value="2">女性</option>
      <option value="3">ユニセックス</option>
    </select>
    <br><br>
    画像<br>
    <input type="file" name="image" accept="image/*" onChange="imgPreView(event)">
    <div id="preview"></div>
    <br><br>
    商品説明<br>
    <textarea name="description" style="width: 500px; height: 100px;"></textarea>
    <br><br>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="OK">
  </form>
  <br>
  <?php include "admin_menu.php" ?>
  <script src="../javascript/main.js"></script>
</body>

</html>
