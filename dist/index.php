<?php
session_start();
require(__DIR__ . '/parts/flash.php');
include "./parts/before-header.php";
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
<div class="top-wrapper">
  <a class="link" href="#"></a>
</div>

<?php include "./parts/footer.php" ?>
