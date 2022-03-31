<?php
session_start();
// Login済だったらTopPageへ戻る
if (isset($_SESSION["user_id"])) {
  header("Location: ../dist/index.php");
  exit();
}
?>
<div class="body">
  <?php include "./parts/before-header.php" ?>
  <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl flex-col">
    <section>
      <h3 class="brand-name font-bold text-base sm:text-lg md:text-xl lg:text-2xl">
        Password Reset
      </h3>
      <p class="text-gray-600 pt-2 text-xs">
        パスワードリセット手順を送信します（準備中）
      </p>
    </section>

    <section class="mt-10">
      <form class="flex flex-col" method="POST">
        <div class="mb-4 pt-3 rounded bg-gray-200">
          <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="email">メールアドレス</label>
          <input type="email" name="email" required autofocus class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-700 transition duration-500 px-3 pb-3" />
        </div>
        <div class="flex justify-end">
          <a href="./login.php" class="text-xs text-zinc-600 hover:text-zinc-700 hover:underline mb-6">ログインはこちら</a>
        </div>
        <div class="flex justify-end">
          <a href="./signup.php" class="text-xs text-zinc-600 hover:text-zinc-700 hover:underline mb-4">新規登録の方はこちら</a>
        </div>
        <input type="submit" class="cursor-pointer bg-zinc-600 hover:bg-zinc-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200 shadow-md" value="送信" />
      </form>
    </section>
  </main>
</div>
<?php include "./parts/footer.php" ?>
