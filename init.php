<?php
require_once ('functions.php');
require_once ('mysql_helper.php');
$link = mysqli_connect('localhost','root','','phpproject');

$categories = [];

$ads = [];