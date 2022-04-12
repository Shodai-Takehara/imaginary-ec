<?php
session_start();
require("../parts/flash.php");
if (!isset($_SESSION["user_id"])) {
  flash('error', '権限がありません！');
  header("Location: ../../index.php");
  exit();
}
