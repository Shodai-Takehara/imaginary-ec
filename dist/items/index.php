  <?php include("../parts/after-header.php") ?>
  <?php
  try {
    require_once("../common/basedb.php");

    $sql = "SELECT item_id, name, sale_price, category_id, gender, image, size FROM items WHERE1";
    $stm = $pdo->prepare($sql);
    $stm->execute();

    echo "<div class='container my-12 mx-auto px-4 md:px-12'>";
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

      if (!isset($_SESSION['login'])) {
        $likeLink = "<a href='#' onclick='clickEvent()'><i class='far fa-heart'></i></a>";
      } else {
        $likeLink = "<a href='#'><i class='js-like-btn far fa-heart'></i></a>";
      }

      $price = number_format($result["sale_price"]);
      $size = strtoupper($result["size"]);
      echo "<a href='detail.php?id=" . $id . "'>";
      if (empty($result["image"])) {
        $image = "";
      } else {
        $image = "<img src='../admin/images/" . $result['image'] . "'>";
      }
      echo <<<EOF
        <div class="px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
          <div class="card w-95 bg-base-100 shadow-xl mt-10">
            <figure>{$image}</figure>
            <div class="card-body">
              <h2 class="card-title">
              {$result["name"]}
                <div class="badge badge-{$class}">{$gender}</div>
              </h2>
              <p>Price : {$price}円</p>
              <p>SIZE : {$size}</p>
              <div class="card-actions justify-between">
                <div class="badge badge-outline">{$category}</div>
                {$likeLink}
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
  <script>
    function clickEvent() {
      console.log('hoge');
      alert('ログインが必要です！');
      return false;
    }
  </script>
  <?php include("../parts/after_footer.php") ?>

  </html>
