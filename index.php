<?php
session_start();
require(__DIR__ . '/dist/parts/flash.php');
?>
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
  <link rel="stylesheet" href="./dist/styles.css" />
  <link rel="stylesheet" href="./dist/css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>Lauren Life</title>
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
      </div>
      <div class="js-hamburger w-full block flex-grow lg:flex lg:items-center lg:w-auto hidden">
        <div class="text-sm lg:flex-grow select-none">
          <a href="./dist/items/index.php" class="js-list-index block mt-4 lg:inline-block lg:mt-0 text-white hover:underline underline-offset-2 mr-4">
            商品一覧
          </a>
          <a href="./dist/items/index.php?gender=1" class="js-list-men block mt-4 lg:inline-block lg:mt-0 text-white hover:underline underline-offset-2 mr-4">
            MENS
          </a>
          <a href="./dist/items/index.php?gender=2" class="js-list-women block mt-4 lg:inline-block lg:mt-0 text-white hover:underline underline-offset-2 mr-4">
            WOMENS
          </a>
          <a href="./dist/items/index.php?gender=3" class="js-list-sale block mt-4 lg:inline-block lg:mt-0 text-white hover:underline underline-offset-2">
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
              <a href="./dist/user/likes.php" class="block mt-4 mr-4 lg:inline-block lg:mt-0 text-white hover:underline underline-offset-2">
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
          <a href="#" class="block mt-4 mr-2 lg:inline-block lg:mt-0 text-white hover:underline underline-offset-2">
            <i class="fa fa-shopping-bag"></i> マイバッグ
          </a>
          <div class="dropdown lg:dropdown-end dropdown-hover">
            <label tabindex="0" class="btn"><i class="fas fa-caret-square-down"></i>&nbsp;MENU</label>
            <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-40">
              <?php if (!isset($_SESSION["login"]))
                echo <<<EOF
                <li>
                  <a href="./dist/login.php" class="block mt-4 mr-4 lg:inline-block lg:mt-0 text-black hover:underline underline-offset-2">
                    <i class="fa fa-user"></i> ログイン
                  </a>
                </li>
                <li>
                  <a href="./dist/signup.php" class="block mt-4 mr-4 lg:inline-block lg:mt-0 text-black hover:underline underline-offset-2">
                    <i class="fa fa-user-plus"></i> 新規登録
                  </a>
                </li>
                EOF;
              ?>
              <?php if (isset($_SESSION["login"]))
                echo <<<EOF
                <li>
                  <a href="./dist/user/user_detail.php" class="block mt-4 mr-4 lg:inline-block lg:mt-0 text-black hover:underline underline-offset-2">
                  <i class="fas fa-file-alt"></i> マイページ
                  </a>
                </li>
                <li>
                  <a href="./dist/user/logout.php" class="block mt-4 mr-4 lg:inline-block lg:mt-0 text-black hover:underline underline-offset-2">
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
  <div class="top-wrapper">
    <a class="link" href="./dist/items/index.php"></a>
  </div>

  <footer class="footer p-8 bg-gray-100 text-base-content">
    <div>
      <span class="footer-title">Services</span>
      <a href="#" class="link link-hover">Lauren Lifeとは</a>
      <a href="#" class="link link-hover">取扱いブランド</a>
    </div>
    <div>
      <span class="footer-title">Company</span>
      <a href="#" class="link link-hover">会社概要</a>
      <a href="https://docs.google.com/forms/d/1PEGUZp8Nz7jh-RMS1mWFiQRbamYkRh3dFncQxsNK3ng/edit" target="_blank" class="link link-hover">お問合せ</a>
    </div>
    <div>
      <span class="footer-title">Legal</span>
      <a href="#" class="link link-hover">利用規約</a>
      <a href="#" class="link link-hover">プライバシーポリシー</a>
    </div>
  </footer>
  <footer class="footer items-center p-4 bg-neutral text-neutral-content">
    <div class="items-center grid-flow-col">
      <a href="./index.php"><span class=" brand-name font-semibold text-xl tracking-tight">Lauren Life</span></a>
      <p>Copyright © 2022 - All right reserved</p>
    </div>
    <div class="grid-flow-col gap-4 md:place-self-center md:justify-self-end mr-4">
      <a href="#">
        <i class="fab fa-twitter-square fa-2x"></i>
      </a>
      <a href="#">
        <i class="fab fa-instagram fa-2x"></i>
      </a>
      <a href="#">
        <i class="fab fa-facebook-square fa-2x"></i>
      </a>
    </div>
  </footer>
  <script src="./dist/javascript/jquery-3.6.0.min.js"></script>
  <script src="./dist/javascript/main.js"></script>
  <script src="./dist/javascript/common.js"></script>
</body>

</html>
