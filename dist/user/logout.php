<?php
session_start();
// $_SESSION = array();
// session_destroy();
unset($_SESSION["login"]);
unset($_SESSION["user_id"]);
unset($_SESSION["name"]);
require '../parts/flash.php';
flash('error', 'ログアウトしました。');
header("Location: http://localhost/imaginary-ec/index.php");
exit();
