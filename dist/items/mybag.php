<?php include("../parts/after-header.php") ?>
<?php
// フラッシュメッセージ
$flash = isset($_SESSION['flash']) ? $_SESSION['flash'] : array();
unset($_SESSION['flash']);
foreach (array('info', 'success', 'warning', 'error') as $key) {
  if (strlen(@$flash[$key])) {
?>
    <div class="js-flash lg:w-1/3 sm:w-1/2 absolute top-32 right-5">
      <div class="alert <?php echo 'alert-' . $key  ?> shadow-lg opacity-90">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" class="dismiss cursor-pointer stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span><?php echo $flash[$key] ?></span>
        </div>
      </div>
    </div>
<?php
  }
}
?>
<?php
if (isset($_POST["item_id"])) {
  if (isset($_SESSION["bag"])) {
    foreach ((array)$_SESSION["bag"] as $key => $item) {
      if ($_POST["item_id"] == $item["id"]) {
        unset($_SESSION["bag"][$key]);
      }
    }
  }
  $_SESSION["bag"][] = ["id" => $_POST["item_id"]];
}
try {
  $total = 0;
  $total_price = 0;
  require_once "../common/basedb.php";
  if (isset($_SESSION["bag"])) {
    echo <<<EOF
      <div class="body-bag">
        <div class="shopping-cart">
          <!-- Title -->
          <div class="title">
            Shopping Bag
          </div>
    EOF;

    foreach ($_SESSION["bag"] as $item) {
      $sql = "SELECT * FROM items WHERE item_id = :id";
      $stm = $pdo->prepare($sql);
      $stm->bindValue(":id", $item["id"], PDO::PARAM_INT);
      $stm->execute();
      if ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
        $name = $result["name"];
        if ($result["category_id"] === 1) {
          $category = "Tops";
        } elseif ($result["category_id"] === 2) {
          $category = "Outer";
        } elseif ($result["category_id"] === 3) {
          $category = "Bottoms";
        } elseif ($result["category_id"] === 4) {
          $category = "Accessory";
        }
        $image = "<img src='../admin/images/" . $result["image"] . "' width='150'>";
        $item_total = $result["sale_price"];
        $size = strtoupper($result["size"]);
        $tax = floor($item_total * 0.1);
        $price = number_format($result["sale_price"] + $tax);
        $formatTax = number_format($tax);
        $total += $item_total + $tax;
        $total_price = number_format($total);
        $totalResult = number_format($total);
        echo <<<EOF
          <!-- Item -->
          <div class="item">
            <div class="buttons">
              <a href="./bagdestroy.php"><span class="delete-btn"><i class="fas fa-trash-alt"></i></span></a>
              <!-- <span class="like-btn"><i class='far fa-heart'></i></span> -->
            </div>
      
            <div class="image">
              $image
            </div>
      
            <div class="description">
              <span> $name </span>
              <span>SIZE : $size </span>
              <span> $category </span>
            </div>
      
            <div class="quantity">
              <button class="plus-btn" type="button" name="button">
                <i class="fas fa-plus"></i>
              </button>
              <input type="text" name="name" value="1" max="1">
              <button class="minus-btn" type="button" name="button">
                <i class="fas fa-minus"></i>
              </button>
            </div>
      
            <div class="price">
              ￥ $price <br>
              <span style="font-size: 12px;">(Tax :￥$formatTax )</span>
            </div>
          </div>
        EOF;
      }
    }
    echo "<div class='total-price'>合計 : ￥ $totalResult </div>";
    echo "</div>";
    echo "<div class='text-center mb-5 flex justify-around align-middle'>";
    if (isset($_SESSION["login"])) {
      echo "<a href='./item_purchase.php' class='btn btn-wide btn-accent'>購入手続きへ</a>";
    } else {
      echo "<a href='../signup.php' class='btn btn-wide btn-accent'>会員登録へ</a>";
    }
    echo "</div>";
    echo "</div>";
  } else {
    echo "<div class='body-bag'>";
    echo "<div class='container my-10 mx-auto px-4 md:px-12'>";
    echo "<div class='badge badge-outline p-5'><p>現在、バッグに商品は入っていません。</p></div>";
    echo "</div>";
    echo "</div>";
  }
} catch (Exception $e) {
  echo "接続できませんでした";
}

?>
<?php include("../parts/after_footer.php") ?>
