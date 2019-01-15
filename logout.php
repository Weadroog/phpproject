<?php
session_unset();
$cook_name = 'PHPSESSID';
$expire = strtotime("+30 days");
$path = "/";
setcookie($cook_name, '', $expire, $path);
header("Location: /index.php");



