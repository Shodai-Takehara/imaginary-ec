  <?php include("../parts/after-header.php");
  require_once("../common/common.php");
  ?>
  <?php
  try {
    require_once("../common/basedb.php");

    $sql = "SELECT item_id, name, sale_price, category_id, gender, image, size 
            FROM items WHERE1 
            ORDER BY item_id DESC";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $count = $stm->rowCount();

    echo "<div class='container my-10 mx-auto px-4 md:px-12'>";
    echo "<div class='badge badge-outline p-5'><p>対象の商品が $count 件ヒットしました。</p></div>";
    echo "<div class='flex flex-wrap -mx-1 lg:-mx-4'>";

    while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
      $id = $result["item_id"];
      if ($result["gender"] === 1) {
        $gender =  "MEN";
        $class = "accent";
      } elseif ($result["gender"] === 2) {
        $gender = "WOMEN";
        $class = "secondary";
      } else {
        $gender = "UNISEX";
        $class = "primary";
      };

      if ($result["category_id"] === 1) {
        $category = "Tops";
      } elseif ($result["category_id"] === 2) {
        $category = "Outer";
      } elseif ($result["category_id"] === 3) {
        $category = "Bottoms";
      } elseif ($result["category_id"] === 4) {
        $category = "Accessory";
      }

      $item_id = $result["item_id"];
      if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
      } else {
        $user_id = null;
      }
      $likeClass = isGood($user_id, $item_id) ? "fas fa-heart already" : "far fa-heart";
      $price = number_format($result["sale_price"]);
      $size = strtoupper($result["size"]);

      if (!isset($_SESSION['login'])) {
        $likeLink = "<a href='javascript:void(0)' onclick='clickEvent()'><i class='far fa-heart'></i></a>";
      } else if (isGood($user_id, $item_id) === 1) {
        $likeLink = "<a href='javascript:void(0)'><i class='js-like-btn far fa-heart'></i></a>";
      } else {
        $likeLink = "<a href='javascript:void(0)'><i class='js-like-btn {$likeClass}'></i></a>";
      }

      echo "<a href='detail.php?id=" . $id . "'>";
      if (empty($result["image"])) {
        $image = "";
      } else {
        $image = "<img src='../admin/images/" . $result['image'] . "'>";
      }
      echo <<<EOF
        <div class="flex px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4 h-500">
          <div class="card w-95 bg-base-100 shadow-xl mt-8">
            <figure>{$image}</figure>
            <div class="card-body">
              <h2 class="card-title">
              {$result["name"]}
              <div class="badge badge-{$class}">{$gender}</div>
              </h2>
              <p class="mt-3">Price : {$price}円</p>
              <p class="my-2">SIZE : {$size}</p>
              <div class="card-actions justify-between align-top">
                <div class="badge badge-outline">{$category}</div>
                <div class="bag"><a href='javascript:void(0)'><i class="fas fa-shopping-bag"></i></a></div>
                <div class="like" data-itemid="{$item_id}" data-userid="{$user_id}">
                  {$likeLink}
                </div>
              </div>
            </div>
          </div>
        </div>
      EOF;
    }
    echo "</a>";
    echo "</div>";
    echo "</div>";
  } catch (Exception $e) {
    echo "只今障害が発生しております。<br><br>";
    echo "<a href='../../index.php'>ログイン画面へ</a>";
  }
  ?>
  <script src="../javascript/jquery-3.6.0.min.js"></script>
  <script src="../javascript/like.js"></script>
  <script>
    function clickEvent() {
      console.log('hoge');
      alert('ログインが必要です！');
      return false;
    }
  </script>
  <?php include("../parts/after_footer.php") ?>

  </html>
