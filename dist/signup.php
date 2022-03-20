  <?php include "./parts/before-header.php" ?>
  <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
    <section>
      <h3 class="brand-name font-bold text-base sm:text-lg md:text-xl lg:text-2xl">
        Welcome to Lauren Life
      </h3>
      <p class="text-gray-600 pt-2 text-xs">アカウントの作成をしてください</p>
    </section>

    <section class="mt-8">
      <form class="flex flex-col" method="POST" action="#">
        <div class="flex flex-wrap">
          <aside class="w-full lg:w-1/2 mb-4 pt-3 rounded bg-gray-200">
            <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="lname">姓</label>
            <input type="text" id="lname" name="lname" required autofocus class="w-full bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-600 transition duration-500 px-3 pb-3; }" />
          </aside>
          <aside class="w-full lg:w-1/2 mb-4 pt-3 rounded bg-gray-200">
            <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="fname">名</label>
            <input type="text" id="fname" name="fname" required class="w-full bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-600 transition duration-500 px-3 pb-3; }" />
          </aside>
        </div>
        <div class="flex flex-wrap">
          <aside class="w-full lg:w-1/2 mb-4 pt-3 rounded bg-gray-200">
            <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="lfuri">セイ<span class="text-gray-500">(全角カナ)</span></label>
            <input type=" text" id="lfuri" name="lfuri" required class="w-full bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-600 transition duration-500 px-3 pb-3; }" />
          </aside>
          <aside class="w-full lg:w-1/2 mb-4 pt-3 rounded bg-gray-200">
            <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="ffuri">メイ<span class="text-gray-500">(全角カナ)</span></label>
            <input type=" text" id="ffuri" name="ffuri" required class="w-full bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-600 transition duration-500 px-3 pb-3; }" />
          </aside>
        </div>
        <div class="mb-4 pt-3 rounded bg-gray-200">
          <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="email">メールアドレス</label>
          <input type="text" id="email" name="email" required class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-600 transition duration-500 px-3 pb-3; }" />
        </div>
        <div class="mb-4 pt-3 rounded bg-gray-200">
          <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="phone">電話番号</label>
          <input type="text" id="phone" name="phone" required class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-600 transition duration-500 px-3 pb-3; }" />
        </div>
        <div>
          <div class="flex flex-wrap">
            <aside class="w-full lg:w-1/2 mb-4 pt-3 rounded bg-gray-200">
              <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="zip">郵便番号</label>
              <input type="text" id="zip" name="zip" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','pref','address');" required class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-600 transition duration-500 px-3 pb-3; }" />
            </aside>
            <aside class="w-full lg:w-1/2 mb-4 pt-3 rounded bg-gray-200">
              <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="pref">都道府県</label>
              <input type="text" id="pref" name="pref" maxlength="8" required class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-600 transition duration-500 px-3 pb-3; }" />
            </aside>
          </div>
        </div>
        <div class="mb-4 pt-3 rounded bg-gray-200">
          <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="address">以降の住所</label>
          <input type="text" id="address" name="address" required class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-600 transition duration-500 px-3 pb-3; }" />
        </div>
        <div class="mb-4 pt-3 rounded bg-gray-200">
          <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="password">パスワード<span class="password-icon"><i id="js-eye" class="fa fa-eye"></i></span></label>
          <input type="password" id="password" name="password" required class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-600 transition duration-500 px-3 pb-3" />
        </div>
        <div class="mb-4 pt-3 rounded bg-gray-200">
          <label class="block text-gray-700 text-xs font-bold mb-2 ml-3" for="password-conf">パスワード再確認<span class="password-icon-conf"><i id="js-eye-conf" class="fa fa-eye"></i></span></label>
          <input type="password" id="password-conf" name="password-conf" required class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-zinc-600 transition duration-500 px-3 pb-3" />
        </div>
        <div class="flex justify-end">
          <a href="login.php" class="text-sm text-zinc-600 hover:text-zinc-700 hover:underline mb-6">ログインはこちら</a>
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
        <input id="js-input" class="disable bg-zinc-600 hover:bg-zinc-700 disabled:bg-zinc-300 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200 shadow-md" type="submit" value="新規登録" disabled />
      </form>
    </section>
    <section>
    <!-- <div role="alert">
      <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
        Danger
      </div>
      <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
        <p>Something not ideal might be happening.</p>
      </div>
    </div> -->
    <div id="pass-error">
      <p class="error-message">
        パスワードが一致しません<span class="dismiss">&times;</span>
      </p>
    </div>

    </section>
  </main>
  <?php include "./parts/footer.php" ?>
