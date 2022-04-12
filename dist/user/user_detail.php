<?php
require_once("../common/header.php");
require_once("../common/common.php");
include("../parts/after-header.php");

try {
  require_once("../common/basedb.php");

  $sql = "SELECT * FROM items 
          INNER JOIN likes 
          ON items.item_id = likes.item_id
          WHERE likes.user_id = :user_id";
  $stm = $pdo->prepare($sql);
  $stm->bindValue(":user_id", $_SESSION["user_id"], PDO::PARAM_INT);
  $stm->execute();
  $count = $stm->rowCount();
  $result = $stm->fetch(PDO::FETCH_ASSOC);

  $sql2 = "SELECT * FROM users
           WHERE user_id = :user_id";
  $stm = $pdo->prepare($sql2);
  $stm->bindValue(":user_id", $_SESSION["user_id"], PDO::PARAM_INT);
  $stm->execute();
  $result2 = $stm->fetch(PDO::FETCH_ASSOC);
  $name = $result2["last_name"] . $result2["first_name"];
  $pref = $result2["prefecture"];
  $email = $result2["email"];
} catch (Exception $e) {
  echo "只今障害が発生しております。<br><br>";
  echo "<a href='../../index.php'>ログイン画面へ</a>";
}
?>
<main class="profile-page">
  <section class="relative block" style="height: 400px;">
    <div class="absolute top-0 w-full h-full bg-center bg-cover" style='background-image: url("https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80");'>
      <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
    </div>
  </section>
  <section class="relative py-16 bg-gray-300">
    <div class="container mx-auto px-4">
      <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
        <div class="px-6">
          <div class="flex flex-wrap justify-center">
            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
              <div class="relative">
                <img alt="user" src="../images/user_icon.png" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16" style="max-width: 150px;" />
              </div>
            </div>
            <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
              <div class="py-6 px-3 mt-32 sm:mt-0">
                <a href="./user_edit.php" class="bg-purple-500 active:bg-purple-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1" type="button" style="transition: all 0.15s ease 0s;">
                  編集ページ
                </a>
              </div>
            </div>
            <div class="w-full lg:w-4/12 px-4 lg:order-1">
              <div class="flex justify-center py-4 lg:pt-4 pt-8">
                <div class="mr-4 p-3 text-center">
                  <span class="text-xl font-bold block uppercase tracking-wide text-gray-700"><i class="far fa-heart"></i> <?php echo $count ?></span>
                  <span class="text-sm text-gray-500">お気に入り数</span>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center mt-4">
            <h3 class="text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2">
              <?php echo $name ?> 様
            </h3>
            <div class="text-sm leading-normal mt-0 text-gray-500 font-bold uppercase">
              <i class="fas fa-map-marker-alt mr-2 text-lg text-gray-500"></i>
              <?php echo $pref ?>
            </div>
            <div class="mb-2 text-gray-700 mt-5">
              <i class="fas fa-at mr-2 text-lg text-gray-500"></i>登録Email : <?php echo $email ?>
            </div>
          </div>
          <div class="mt-10 py-10 border-t border-gray-300 text-center">
            <div class="flex flex-wrap justify-center">
              <div class="w-full lg:w-9/12 px-4">
                <!-- <p class="mb-4 text-lg leading-relaxed text-gray-800">
                  An artist of considerable range, Jenna the name taken by
                  Melbourne-raised, Brooklyn-based Nick Murphy writes,
                  performs and records all of his own music, giving it a
                  warm, intimate feel with a solid groove structure. An
                  artist of considerable range.
                </p>
                <a href="#pablo" class="font-normal text-pink-500">Show more</a> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php include("../parts/after_footer.php") ?>
</body>
<script>
  function toggleNavbar(collapseID) {
    document.getElementById(collapseID).classList.toggle("hidden");
    document.getElementById(collapseID).classList.toggle("block");
  }
</script>

</html>
