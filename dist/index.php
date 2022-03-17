<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link
      href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
      rel="stylesheet"
    /> -->
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Document</title>
  </head>
  <body>
    <main
      class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl"
    >
      <section>
        <h3 class="font-bold text-base sm:text-lg md:text-xl lg:text-2xl">
          ようこそ○○へ
        </h3>
        <p class="text-gray-600 pt-2 text-xs">
          アカウントにサインインしてください
        </p>
      </section>

      <section class="mt-10">
        <form class="flex flex-col" method="POST" action="#">
          <div class="mb-6 pt-3 rounded bg-gray-200">
            <label
              class="block text-gray-700 text-sm font-bold mb-2 ml-3"
              for="email"
              >Email</label
            >
            <input
              type="text"
              id="email"
              class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-green-600 transition duration-500 px-3 pb-3; }"
            />
          </div>
          <div class="mb-6 pt-3 rounded bg-gray-200">
            <label
              class="block text-gray-700 text-sm font-bold mb-2 ml-3"
              for="password"
              >Password</label
            >
            <input
              type="password"
              id="password"
              class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-green-600 transition duration-500 px-3 pb-3"
            />
          </div>
          <div class="flex justify-end">
            <a
              href="#"
              class="text-xs text-green-600 hover:text-green-700 hover:underline mb-6"
              >パスワードをお忘れの方はこちら</a
            >
          </div>
          <button
            class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200 shadow-md"
            type="submit"
          >
            Sign In
          </button>
        </form>
      </section>
    </main>
  </body>
</html>
