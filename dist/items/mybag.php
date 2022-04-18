<?php include("../parts/after-header.php") ?>
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
        $price = number_format($result["sale_price"]);
        $image = "<img src='../admin/images/" . $result["image"] . "' width='150'>";
        $item_total = $result["sale_price"];
        $size = strtoupper($result["size"]);
        $total += $item_total;
        $total_price = number_format($total);
        $totalResult = number_format($total);
        echo <<<EOF
          <!-- Item -->
          <div class="item">
            <div class="buttons">
              <span class="delete-btn"><i class="fas fa-trash-alt"></i></span>
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
      
            <div class="price">￥ $price </div>
          </div>
        EOF;
      }
    }
    echo "<div class='total-price'>合計 : ￥ $totalResult </div>";
    echo "</div>";
    echo "<div class='text-center mb-5 flex justify-around align-middle'>
          <button class='btn btn-wide btn-accent'>購入手続きへ</button>
        </div>";
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
