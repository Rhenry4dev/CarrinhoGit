<?php
require_once("header.php");

$id = $_GET['id'];

?>
        <p class="text-success">Produto adicionado com sucesso!</p>
        <td><a class="btn btn-primary" href="buy.php">Voltar a comprar</a></td>
        <td><a class="btn btn-primary" href="cart_list.php">Ir para carrinho</a></td>

<?php
    $productDao = new ProductDao($connect);

    $products = $productDao->searchProduct($id);
    $productDao->insereCarrinho($products);

    require_once("footer.php");

?>