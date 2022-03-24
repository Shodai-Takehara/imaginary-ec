<?php
session_start();
if (!isset($_SESSION["admin_name"])) {
  header("Location:admin_login.php");
  exit();
}
