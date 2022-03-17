<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="css/style.css" />
  <title>ログイン画面</title>
</head>

<body>
  <div class="body">
    <?php include "header.php" ?>
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
        <form class="flex flex-col" method="POST" action="#">
          <div class="mb-4 pt-3 rounded bg-gray-200">
            <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="email">メールアドレス</label>
            <input type="text" id="email" required autofocus class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-700 transition duration-500 px-3 pb-3; }" />
          </div>
          <div class="mb-4 pt-3 rounded bg-gray-200">
            <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="password">パスワード</label>
            <input type="password" id="password" required class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-700 transition duration-500 px-3 pb-3" />
          </div>
          <div class="flex justify-end">
            <a href="signup.php" class="text-xs text-zinc-600 hover:text-zinc-700 hover:underline mb-4">新規登録の方はこちら</a>
          </div>
          <div class="flex justify-end">
            <a href="#" class="text-xs text-zinc-600 hover:text-zinc-700 hover:underline mb-6">パスワードをお忘れの方はこちら</a>
          </div>
          <button class="bg-zinc-600 hover:bg-zinc-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200 shadow-md" type="submit">
            ログイン
          </button>
        </form>
      </section>
    </main>
  </div>
  <?php include "footer.php" ?>
  <script src="./javascript/main.js"></script>
</body>

</html>
