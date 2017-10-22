<?php
include ("config/configs.php");

session_start();
$_SESSION['username'] = null;
$_SESSION['license'] = null;
$_SESSION['email'] = null;
$_SESSION['id'] = null;
$_SESSION['rank'] = null;
$_SESSION = array();
session_destroy();

header("Location: login.php");
?>