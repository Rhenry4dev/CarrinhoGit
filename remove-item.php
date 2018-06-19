<?php
require_once('header.php');
    $id_product = $_POST['id'];

    $productDao = new ProductDao($connect);
    $products_cart = $productDao->searchCart($id_product);

    $valor = $products_cart->getQuantity();
    $quantity = $valor - 1;

    $products_cart->setQuantity($quantity);
    $products = $productDao->addItemQuantity($id_product, $quantity);

header("Location: cart_list.php");
die();
require_once('footer.php');
