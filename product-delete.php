<?php
require_once("header.php");

$id = $_POST["id"];

$productDao = new ProductDao($connect);
$productDao->productDelete($id);

header("Location: cart_list.php");
die();
