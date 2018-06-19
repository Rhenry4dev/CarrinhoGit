<?php
require_once("header.php");
require_once("user_logic.php");
userCheck();
?>
<h1>Lista de Produtos para Compra!</h1>
</br>
</br>
<table class="table table-striped table-bordered">
<?php
    $productDao = new ProductDao($connect);
    $products = $productDao->productList();
foreach ($products as $product) :
    ?>
         <tr>
            <td><?=$product->getName()?></td> 
            <td><?=$product->getPrice()?></td>
            <td><?= substr($product->getDescription(), 0, 40)?></td>
            <td><?=$product->getCategory()->getName()?>
            <td><a class="btn btn-primary" href="add_to_cart.php?id=<?=$product->getId()?>">Comprar</a></td>
         </tr>
    <?php
endforeach;
?>
</table>
<?php
    require_once("footer.php");
?>
