<?php
session_start();
unset($_SESSION["bag"]);
require '../parts/flash.php';
flash('warning', 'Bagから削除しました');
header("Location: ./mybag.php");
exit();
