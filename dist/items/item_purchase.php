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
  $lastName = $result["last_name"];
  $zipcode = $result["zipcode"];
  $lfuri = $result["last_furi_name"];
  $firstName = $result["first_name"];
  $ffuri = $result["first_furi_name"];
  $email = $result["email"];
  $address = $result["address"];
  $phone = $result["phone"];
  if (isset($_SESSION["bag"])) {
    $max = count($_SESSION["bag"]);
  } else {
    $max = 0;
  }
  if (isset($_GET["item_id"])) {
    $id = $_GET["item_id"];
  } else {
    $id = null;
  }
  echo "<div class='container my-10 mx-auto px-4 md:px-12'>";
  echo "<h2 class='text-center mb-5'>【注文者情報】</h2>";
  echo <<<EOF
      <div class="overflow-x-auto">
        <table class="table table-compact w-full">
          <thead>
            <tr>
              <th></th> 
              <th>姓</th> 
              <th>名</th> 
              <th>郵便番号</th> 
              <th>住所</th>
              <th>ご連絡先</th> 
              <th>Email</th>
            </tr>
          </thead> 
          <tbody>
            <tr>
              <th></th> 
              <td>$lastName</td> 
              <td>$firstName</td> 
              <td>$zipcode</td> 
              <td>$address</td> 
              <td>$phone</td> 
              <td>$email</td>
            </tr>
          </tbody>
        </table>
      </div>
    EOF;
  echo "</div>";

  $sql = "SELECT * FROM items WHERE item_id = 12";
  // $stm->bindValue(":item_id", $id, PDO::PARAM_INT);
  $stm = $pdo->prepare($sql);
  $stm->execute();
  $result = $stm->fetch(PDO::FETCH_ASSOC);
  echo "<div class='container my-10 mx-auto px-4 md:px-12'>";
  echo "<h2 class='text-center mb-5'>【注文内容】</h2>";
  echo <<<EOF
      <div class="overflow-x-auto">
        <table class="table table-compact w-full">
          <thead>
            <tr>
              <th></th> 
              <th>商品名</th>
              <th>金額(税込)</th> 
              <th>送料</th>
              <th>サイズ</th>
              <th>数量</th>
              <th>総額</th>
            </tr>
          </thead> 
          <tbody>
            <tr>
              <th></th> 
              <td></td> 
              <td></td> 
              <td>¥500</td> 
              <td></td> 
              <td>1</td>
              <td>¥</td> 
            </tr>
          </tbody>
        </table>
      </div>
    EOF;
  echo "<div class='text-center mt-10'><a href='./item_purchase.php' class='btn btn-wide btn-accent'>購入を確定する</a></div>";
  echo "</div>";

  // echo "<div class='box'>";
  // echo "<div class='list'>";
  // echo "<div class='img'>";
  // echo $image;
  // echo "</div>";
  // echo "<div class='npe'>";
  // echo "商品名:" . $result['name'] . "<br>";
  // echo "価格:" . $result['sale_price'] . "円　<br>";
  // $tax =  $result['sale_price'] * 0.1;
  // echo "消費税:" . $tax . "円　<br>";
  // echo "数量:" . 1 . "<br>";
  // echo "合計価格:" . $result['sale_price'] * $num + $tax . "円<br><br>";
  // echo "</div></div></div><br>";

  // if (empty($result["image"])) {
  //   $image = "";
  // } else {
  //   $image = "<img src='../admin/images/" . $result['image'] . "' width='200'>";
  // }
} catch (Exception $e) {
  print "只今障害が発生しております。<br><br>";
  print "<a href='../login.php'>ログイン画面へ</a>";
}
?>

<?php
include("../parts/after_footer.php");
?>
