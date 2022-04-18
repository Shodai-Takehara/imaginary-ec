<?php
include("../parts/after-header.php");
?>

<?php
try {

  require_once("../common/basedb.php");

  $sql = "SELECT * FROM users 
          WHERE  user_id = :user_id";
  $stm = $pdo->prepare($sql);
  $stm->bindValue(":user_id", $_SESSION["user_id"], PDO::PARAM_INT);
  $stm->execute();
  $result = $stm->fetch(PDO::FETCH_ASSOC);
  $max = 1;
  $name = $result["last_name"] . $result["first_name"];
  $email = $result["email"];
  $address = $result["address"];
  $phone = $result["phone"];

  echo "下記内容でよろしいでしょうか？<br><br>";
  echo "【宛先】<br>";
  echo "お名前:" . $name . "様<br>";
  echo "Email:" . $email . "<br>";
  echo "ご住所:" . $address . "<br>";
  echo "ご連絡先:" . $phone . "<br><br>";

  echo "【ご注文内容】<br>";
  for ($i = 0; $i < $max; $i++) {
    $sql = "SELECT * FROM items WHERE item_id = 12";
    $stm = $pdo->prepare($sql);
    $stm->execute();

    $result = $stm->fetch(PDO::FETCH_ASSOC);

    if (empty($result["image"])) {
      $image = "";
    } else {
      $image = "<img src='../admin/images/" . $result['image'] . "' width='200'>";
    }
    $num = 1;
    echo "<div class='box'>";
    echo "<div class='list'>";
    echo "<div class='img'>";
    echo $image;
    echo "</div>";
    echo "<div class='npe'>";
    echo "商品名:" . $result['name'] . "<br>";
    echo "価格:" . $result['sale_price'] . "円　<br>";
    $tax =  $result['sale_price'] * 0.1;
    echo "消費税:" . $tax . "円　<br>";
    echo "数量:" . 1 . "<br>";
    echo "合計価格:" . $result['sale_price'] * $num + $tax . "円<br><br>";
    echo "</div></div></div><br>";
  }
  // $dbh = null;
  // print "【ご請求金額】---" . array_sum($goukei) . "円<br><br>";
  // print "<form action='shop_form_done.php' method='post'>";
  // print "<input type='hidden' name='name' value='" . $name . "'>";
  // print "<input type='hidden' name='email' value='" . $email . "'>";
  // print "<input type='hidden' name='address' value='" . $address . "'>";
  // print "<input type='hidden' name='tel' value='" . $tel . "'>";
  // print "<input type='button' onclick='history.back()' value='戻る'>";
  // print "<input type='submit' value='OK'>";
  // print "</form>";
} catch (Exception $e) {
  print "只今障害が発生しております。<br><br>";
  print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
}
?>

<?php
include("../parts/after_footer.php");
?>
