<?php
if (!isset($_SESSION)) {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../styles.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/easyzoom.css">
  <link rel="stylesheet" href="../css/mybag.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>Lauren Life</title>
</head>

<body>
  <header id="js-header" class="sticky top-0 z-10">
    <nav class="flex sticky items-center justif
    y-between flex-wrap bg-neutral p-7">
      <div class="flex items-center flex-shrink-0 text-white mr-6">
        <a href="../../index.php"><span class="brand-name font-semibold text-xl tracking-tight">Lauren Life</span></a>
      </div>
      <div class="lg:hidden">
        <div class="hamburger">
          <span class="button-line"></span>
        </div>
      </div>
      <div class="js-hamburger w-full block flex-grow lg:flex lg:items-center lg:w-auto hidden">
        <div class="text-sm lg:flex-grow select-none">
          <a href="../items/index.php" class="js-list-index block mt-4 lg:inline-block lg:mt-0 text-white hover:underline underline-offset-2 mr-4">
            商品一覧
          </a>
          <a href="../items/index.php?gender=1" class="js-list-men block mt-4 lg:inline-block lg:mt-0 text-white hover:underline underline-offset-2 mr-4">
            MENS
          </a>
          <a href="../items/index.php?gender=2" class="js-list-women block mt-4 lg:inline-block lg:mt-0 text-white hover:underline underline-offset-2 mr-4">
            WOMENS
          </a>
          <a href="../items/index.php?gender=3" class="js-list-sale block mt-4 lg:inline-block lg:mt-0 text-white hover:underline underline-offset-2">
            UNISEX
          </a>
        </div>
        <div class="flex-grow invisible lg:visible select-none">
          <form action="#" method="POST">
            <input type="text" name="search" placeholder="キーワード入力" class="input input-bordered input-sm w-75 max-w-xs">
            <input class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white pt-2 pb-1 px-3 rounded cursor-pointer fa" type="submit" value="&#xf002;">
          </form>
        </div>
        <div class="text-sm lg:flex-none select-none">
          <?php if (isset($_SESSION["login"]))
            echo <<<EOF
              <a href="../user/likes.php" class="block mt-4 mr-4 lg:inline-block lg:mt-0 text-white hover:underline underline-offset-2">
                <i class="far fa-heart"></i> お気に入り
              </a>
            EOF;
          ?>
          <?php if (!isset($_SESSION["login"]))
            echo <<<EOF
              <a href="javascript:void(0)" onclick="return clickEvent();" class="block mt-4 mr-4 lg:inline-block lg:mt-0 text-white hover:underline underline-offset-2">
                <i class="far fa-heart"></i> お気に入り
              </a>
            EOF;
          ?>
          <a href="../items/mybag.php" class="shopbag block mt-4 mr-2 lg:inline-block lg:mt-0 text-white hover:underline underline-offset-2">
            <i class="fa fa-shopping-bag"></i> <span class="bag-num" data-bagnum="">マイバッグ</span>
          </a>
          <div class="dropdown lg:dropdown-end dropdown-hover">
            <label tabindex="0" class="btn"><i class="fas fa-caret-square-down"></i>&nbsp;MENU</label>
            <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-40">
              <?php if (!isset($_SESSION["login"]))
                echo <<<EOF
                <li>
                  <a href="../login.php" class="block mt-4 mr-4 lg:inline-block lg:mt-0 text-black hover:underline underline-offset-2">
                    <i class="fa fa-user"></i> ログイン
                  </a>
                </li>
                <li>
                  <a href="../signup.php" class="block mt-4 mr-4 lg:inline-block lg:mt-0 text-black hover:underline underline-offset-2">
                    <i class="fa fa-user-plus"></i> 新規登録
                  </a>
                </li>
                EOF;
              ?>
              <?php if (isset($_SESSION["login"]))
                echo <<<EOF
                <li>
                  <a href="../user/user_detail.php" class="block mt-4 mr-4 lg:inline-block lg:mt-0 text-black hover:underline underline-offset-2">
                  <i class="fas fa-file-alt"></i> マイページ
                  </a>
                </li>
                <li>
                  <a href="../user/logout.php" class="block mt-4 mr-4 lg:inline-block lg:mt-0 text-black hover:underline underline-offset-2">
                    <i class="fas fa-sign-out-alt"></i> ログアウト
                  </a>
                </li>
                EOF;
              ?>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>
