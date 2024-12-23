<?php
include("../parts/after-header.php");
require_once("../common/common.php");
?>
<?php
try {
  require_once "../common/basedb.php";
  $sql = "SELECT * FROM items
          WHERE  item_id = :item_id";
  $stm = $pdo->prepare($sql);
  $stm->bindValue(":item_id", $_GET["id"], PDO::PARAM_INT);
  $stm->execute();
  $result = $stm->fetch(PDO::FETCH_ASSOC);
  $price = number_format($result["sale_price"]);
  $tax = number_format($result["sale_price"] * 0.1);
  $id = $_GET["id"];

  if ($result["brand_id"] === 1) {
    $brand = "Polo Ralph Lauren";
  } elseif ($result["brand_id"] === 2) {
    $brand = "RRL";
  } elseif ($result["brand_id"] === 3) {
    $brand = "POLO SPORT";
  } elseif ($result["brand_id"] === 4) {
    $brand = "RLX";
  } elseif ($result["brand_id"] === 5) {
    $brand = "DENIM & SUPPLY";
  } elseif ($result["brand_id"] === 6) {
    $brand = "RUGBY";
  } elseif ($result["brand_id"] === 7) {
    $brand = "Purple Label";
  }

  if ($result["category_id"] === 1) {
    $category = "Tops";
  } elseif ($result["category_id"] === 2) {
    $category = "Outer";
  } elseif ($result["category_id"] === 3) {
    $category = "Bottoms";
  } elseif ($result["category_id"] === 4) {
    $category = "Accessory";
  }

  $item_id = $_GET["id"];
  if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
  } else {
    $user_id = null;
  }
  $likeClass = isGood($user_id, $item_id) ? "fas fa-heart already" : "far fa-heart";
  if (!isset($_SESSION['login'])) {
    $likeLink = "<a href='javascript:void(0)' onclick='clickEvent()'><i class='far fa-heart absolute right-14'></i></a>";
  } else if (isGood($user_id, $item_id) === 1) {
    $likeLink = "<a href='javascript:void(0)'><i class='js-like-btn far fa-heart absolute right-14'></i></a>";
  } else {
    $likeLink = "<a href='javascript:void(0)'><i class='js-like-btn {$likeClass} absolute right-14'></i></a>";
  }

  $image = $result["image"];
  $image_path = '../admin/images/' . $image;
  $image_template = '<img class="item-image" src="../admin/images/%s">';
  $image_tag = sprintf($image_template, $image);
} catch (Exception $e) {
  $msg = $e->getMessage();
  flash('error', '登録出来ませんでした。再度登録内容をご確認ください。');
  header("Location: user_edit.php");
  exit();
}
?>
<main class='container my-10 mx-auto px-4 md:px-12 flex flex-wrap'>
  <div class='w-full lg:w-3/5 relative mt-10'>
    <div class="easyzoom easyzoom--overlay">
      <a href="<?php echo $image_path ?>">
        <?php echo $image_tag ?>
      </a>
    </div>
    <div class="like" data-itemid="<?php echo $item_id ?>" data-userid="<?php echo $user_id ?>">
      <?php echo $likeLink ?>
    </div>
  </div>
  <div class='w-full lg:w-2/5'>
    <div class="overflow-x-auto">
      <table class="table w-full z-0 mt-10">
        <tbody>
          <!-- row 1 -->
          <tr class="active">
            <th>商品名</th>
            <td><?php echo $result["name"] ?></td>
          </tr>
          <!-- row 2 -->
          <tr>
            <th>金額</th>
            <td class="font-black">¥<?php echo $price ?> <span style="font-size: 12px;">(Tax: ¥<?php echo $tax ?>)</span></td>
          </tr>
          <!-- row 3 -->
          <tr class="active">
            <th>ブランド</th>
            <td><?php echo $brand ?></td>
          </tr>
          <!-- row 4 -->
          <tr>
            <th>カテゴリー</th>
            <td><?php echo $category ?></td>
          </tr>
          <!-- row 5 -->
          <tr class="active">
            <th>サイズ</th>
            <td><?php echo strtoupper($result["size"]) ?></td>
          </tr>
          <!-- row 6 -->
          <tr>
            <th>商品説明</th>
            <td><?php echo $result["description"] ?></td>
          </tr>
        </tbody>
      </table>
      <div class="text-center mt-5 flex justify-around align-middle">
        <?php if (!isset($_SESSION["login"]))
          echo <<<EOF
            <a href="javascript:void(0)" onclick="return clickEvent();" class="btn btn-wide btn-accent">
            商品購入ページへ
            </a>
            <form method="POST" name="bag" action="mybag.php">
              <input type="hidden" name="item_id" value="$id">
              <div class="bag"><a onclick="return check()" href='javascript:bag.submit()'><i class="fas fa-shopping-bag text-rose-500 hover:text-rose-700"></i></a></div>
            </form>
          EOF;
        ?>
        <?php if (isset($_SESSION["login"]))
          echo <<<EOF
          <a href="./item_purchase.php" class="btn btn-wide btn-accent">商品購入ページへ</a>
          <form method="POST" name="bag" action="mybag.php">
            <input type="hidden" name="item_id" value="$id">
            <div class="bag"><a onclick="return check()" href='javascript:bag.submit()'><i class="fas fa-shopping-bag text-rose-500 hover:text-rose-700"></i></a></div>
          </form>
          EOF;
        ?>
      </div>
    </div>
  </div>
</main>
<script src="../javascript/jquery-3.6.0.min.js"></script>
<script src="../javascript/easyzoom.js"></script>
<script src="../javascript/like.js"></script>
<script>
  (function($) {
    jQuery(document).ready(function() {
      $('.easyzoom').easyZoom();
    });
  })(jQuery);
</script>

<?php include("../parts/after_footer.php"); ?>
