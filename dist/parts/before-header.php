<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- 郵便番号から自動入力 -->
  <script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>

  <title>ログイン画面</title>
</head>

<body>
  <header id="js-header" class="sticky top-0 z-10">
    <nav class="flex sticky items-center justify-between flex-wrap bg-neutral p-7">
      <div class="flex items-center flex-shrink-0 text-white mr-6">
        <a href="./index.php"><span class="brand-name font-semibold text-xl tracking-tight">Lauren Life</span></a>
      </div>
      <div class="lg:hidden">
        <div class="hamburger">
          <span class="button-line"></span>
        </div>
        <!-- <button class="flex items-center px-3 py-2 border rounded text-white-200 border-white-400 hover:text-white hover:border-white">
          <title>Menu</title>
        </button> -->
      </div>
      <div class="js-hamburger w-full block flex-grow lg:flex lg:items-center lg:w-auto hidden">
        <div class="text-sm lg:flex-grow">
          <a href="#" class="js-list-index block mt-4 lg:inline-block lg:mt-0 text-white hover:text-black mr-4">
            商品一覧
          </a>
          <a href="" class="js-list-men block mt-4 lg:inline-block lg:mt-0 text-white hover:text-black mr-4">
            MENS
          </a>
          <a href="#" class="js-list-women block mt-4 lg:inline-block lg:mt-0 text-white hover:text-black mr-4">
            WOMENS
          </a>
          <a href="#" class="js-list-sale block mt-4 lg:inline-block lg:mt-0 text-white hover:text-black">
            SALE
          </a>
        </div>
        <div>
          <a href="../dist/login.php" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-black hover:bg-gray-500 mt-4 lg:mt-0">
            ログイン
          </a>
        </div>
      </div>
    </nav>
  </header>
