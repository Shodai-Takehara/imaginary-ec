<?php
session_start();
require(__DIR__ . '/parts/flash.php');
// Login済だったらTopPageへ戻る
if (isset($_SESSION["user_id"])) {
  header("Location: ../dist/index.php");
  exit();
}

if (isset($_POST["email"], $_POST["password"])) {
  try {
    require_once "./common/basedb.php";
    $sql = "SELECT * FROM users WHERE email = :email";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    if ($result) {
      if (password_verify($_POST["password"], $result["password"])) {
        flash('success', "{$result['last_name']}さんようこそ！");
        $_SESSION["login"] = true;
        $_SESSION["user_id"] = $result["user_id"];
        $_SESSION["name"] = $result["last_name"];
        header("Location:index.php");
        exit();
      } else {
        flash('error', 'ログインに失敗しました。');
        header("Location:login.php");
        exit();
      }
    } else {
      flash('error', 'ログインに失敗しました。');
      header("Location:login.php");
      exit();
    }
  } catch (Exception $e) {
    $msg = $e->getMessage();
    flash('error', $e);
    header("Location:login.php");
    exit();
  }
}
?>

<div class="body">
  <?php include "./parts/before-header.php" ?>
  <?php // フラッシュメッセージ
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
  <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl flex-col">
    <section>
      <h3 class="brand-name font-bold text-base sm:text-lg md:text-xl lg:text-2xl">
        Welcome Back
      </h3>
      <p class="text-gray-600 pt-2 text-xs">
        アカウントにログインしてください
      </p>
    </section>

    <section class="mt-10">
      <form class="flex flex-col" method="POST">
        <div class="mb-4 pt-3 rounded bg-gray-200">
          <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="email">メールアドレス</label>
          <input type="email" name="email" required autofocus class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-700 transition duration-500 px-3 pb-3" />
        </div>
        <div class="mb-4 pt-3 rounded bg-gray-200">
          <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="password">パスワード</label>
          <input type="password" name="password" required class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-700 transition duration-500 px-3 pb-3" />
        </div>
        <div class="flex justify-end">
          <a href="signup.php" class="text-xs text-zinc-600 hover:text-zinc-700 hover:underline mb-4">新規登録の方はこちら</a>
        </div>
        <div class="flex justify-end">
          <a href="email-forgot.php" class="text-xs text-zinc-600 hover:text-zinc-700 hover:underline mb-6">パスワードをお忘れの方はこちら</a>
        </div>
        <input type="submit" class="cursor-pointer bg-zinc-600 hover:bg-zinc-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200 shadow-md" value="ログイン" />
      </form>
    </section>
  </main>
</div>
<?php include "./parts/footer.php" ?>
