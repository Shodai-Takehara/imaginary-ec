<script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>
<?php
require("../common/header.php");
include("../parts/after-header.php");
// 現在のユーザーidがあれば
if (isset($_SESSION["user_id"])) {
  try {
    require_once "../common/basedb.php";
    $sql = "SELECT * FROM users 
            WHERE  user_id = :user_id";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(":user_id", $_SESSION["user_id"], PDO::PARAM_INT);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    if (isset($_POST["email"])) {
      require_once "../common/basedb.php";
      $sql = "UPDATE users
              SET last_name = :last_name, first_name = :first_name, last_furi_name = :last_furi_name, 
                  first_furi_name = :first_furi_name, email = :email,
                  phone = :phone, zipcode = :zipcode, prefecture = :prefecture, address = :address
              WHERE user_id = :user_id";
      $stm = $pdo->prepare($sql);
      $stm->bindValue(":user_id", $_SESSION["user_id"], PDO::PARAM_INT);
      $stm->bindValue(":last_name", $_POST["lname"], PDO::PARAM_STR);
      $stm->bindValue(":first_name", $_POST["fname"], PDO::PARAM_STR);
      $stm->bindValue(":last_furi_name", $_POST["lfuri"], PDO::PARAM_STR);
      $stm->bindValue(":first_furi_name", $_POST["ffuri"], PDO::PARAM_STR);
      $stm->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
      $stm->bindValue(":phone", $_POST["phone"], PDO::PARAM_STR);
      $stm->bindValue(":zipcode", $_POST["zip"], PDO::PARAM_STR);
      $stm->bindValue(":prefecture", $_POST["pref"], PDO::PARAM_STR);
      $stm->bindValue(":address", $_POST["address"], PDO::PARAM_STR);
      if ($stm->execute()) {
        flash('info', 'ユーザー編集が完了しました。');
        header("Location: user_edit.php");
        exit();
      } else {
        flash('error', '登録出来ませんでした。登録内容をご確認ください。');
        header("Location: user_edit.php");
        exit();
      }
    }
  } catch (Exception $e) {
    $msg = $e->getMessage();
    flash('error', '登録出来ませんでした。再度登録内容をご確認ください。');
    header("Location: user_edit.php");
    exit();
  }
}
?>

<?php // フラッシュメッセージ
$flash = isset($_SESSION['flash']) ? $_SESSION['flash'] : array();
unset($_SESSION['flash']);
foreach (array('info', 'success', 'warning', 'error') as $key) {
  if (strlen(@$flash[$key])) {
?>
    <div class="js-flash lg:w-1/3 sm:w-1/2 absolute top-32 right-5 z-20">
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
<main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
  <section>
    <h3 class="brand-name font-bold text-base sm:text-lg md:text-xl lg:text-2xl">
      Edit User Information
    </h3>
    <p class="text-gray-600 pt-2 text-xs">編集する情報を入力してください</p>
  </section>

  <section class="mt-8">
    <form class="flex flex-col" method="POST">
      <div class="flex flex-wrap">
        <aside class="w-full lg:w-1/2 mb-4 pt-3 rounded bg-gray-200">
          <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="lname">姓</label>
          <input type="text" id="lname" value="<?php echo $result["last_name"] ?>" name="lname" required autofocus class="w-full bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-600 transition duration-500 px-3 pb-3; }" />
        </aside>
        <aside class="w-full lg:w-1/2 mb-4 pt-3 rounded bg-gray-200">
          <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="fname">名</label>
          <input type="text" id="fname" value="<?php echo $result["first_name"] ?>" name="fname" required class="w-full bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-600 transition duration-500 px-3 pb-3; }" />
        </aside>
      </div>
      <div class="flex flex-wrap">
        <aside class="w-full lg:w-1/2 mb-4 pt-3 rounded bg-gray-200">
          <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="lfuri">セイ<span class="text-gray-500">(全角カナ)</span></label>
          <input type="text" id="lfuri" value="<?php echo $result["last_furi_name"] ?>" name="lfuri" required class="w-full bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-600 transition duration-500 px-3 pb-3; }" />
        </aside>
        <aside class="w-full lg:w-1/2 mb-4 pt-3 rounded bg-gray-200">
          <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="ffuri">メイ<span class="text-gray-500">(全角カナ)</span></label>
          <input type="text" id="ffuri" value="<?php echo $result["first_furi_name"] ?>" name="ffuri" required class="w-full bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-600 transition duration-500 px-3 pb-3; }" />
        </aside>
      </div>
      <div class="mb-4 pt-3 rounded bg-gray-200">

        <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="email">メールアドレス<span id="js-email" class="ml-5"></span></label>
        <input type="email" id="email" value="<?php echo $result["email"] ?>" name="email" required class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-600 transition duration-500 px-3 pb-3; }" />
      </div>

      <div class="mb-4 pt-3 rounded bg-gray-200">
        <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="phone">電話番号 <span class="text-gray-500">(ハイフンなし)</span></label>
        <input type="text" id="phone" value="<?php echo $result["phone"] ?>" name="phone" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-600 transition duration-500 px-3 pb-3; }" />
      </div>
      <div>
        <div class="flex flex-wrap">
          <aside class="w-full lg:w-1/2 mb-4 pt-3 rounded bg-gray-200">
            <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="zip">郵便番号 <span class="text-gray-500">(ハイフンなし)</span></label>
            <input type="text" id="zip" value="<?php echo $result["zipcode"] ?>" name="zip" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','pref','address');" required class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-600 transition duration-500 px-3 pb-3; }" />
          </aside>
          <aside class="w-full lg:w-1/2 mb-4 pt-3 rounded bg-gray-200">
            <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="pref">都道府県</label>
            <input type="text" id="pref" value="<?php echo $result["prefecture"] ?>" name="pref" maxlength="8" required class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-600 transition duration-500 px-3 pb-3; }" />
          </aside>
        </div>
      </div>
      <div class="mb-4 pt-3 rounded bg-gray-200">
        <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="address">以降の住所</label>
        <input type="text" id="address" value="<?php echo $result["address"] ?>" name="address" required class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-600 transition duration-500 px-3 pb-3; }" />
      </div>
      <div class="flex justify-end">
        <a href="user_detail.php" class="text-sm text-zinc-600 hover:text-zinc-700 hover:underline mb-6">ユーザーマイページへ戻る</a>
      </div>
      <div class="flex justify-center">
        <p class="text-sm text-zinc-600 hover:text-zinc-700 mb-5">
          <a href="#" class="underline">ご利用規約</a><span>をお読みいただいた上でチェックください。</span>
        </p>
      </div>
      <div class="flex justify-center">
        <label for="js-consent" class="mt-3 mb-5 flex items-center justify-center space-x-2 text-sm font-medium text-slate-600">
          <input type="checkbox" id="js-consent" class="accent-zinc-600" />
          <span class="select-none">同意する</span>
        </label>
      </div>
      <input id="js-input" class="disable cursor-pointer bg-zinc-600 hover:bg-zinc-700 disabled:bg-zinc-300 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200 shadow-md" type="submit" value="編集内容送信" disabled />
    </form>
  </section>
</main>
<?php include "../parts/after_footer.php" ?>
