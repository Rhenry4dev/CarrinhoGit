<?php
require_once("header.php");
require_once("user_logic.php");
userCheck();
?>
<h1>Lista de Produtos no Carrinho:</h1>
</br>
</br>
    <table class="table table-striped table-bordered">
        <tr>
            <td>Nome</td>
            <td>Preço</td>
            <td>Descrição</td>
            <td></td>
            <td>Quantidade</td>
            <td></td>
            <td>Total</td>
            <td>Remover</td>
      </tr>

<?php
    $productDao = new ProductDao($connect);
    $products_cart = $productDao->cartList();

foreach ($products_cart as $product_cart) :
    $valor=$product_cart->getProduct()->getPrice();
    $quantidade=$product_cart->getProduct()->getQuantity();
    $total=$valor*$quantidade;
    $id = $product_cart->getProduct()->getId();
        
    ?>
         <tr>
            <td><?=$product_cart->getProduct()->getName()?></td>
            <td><?=$product_cart->getProduct()->getPrice()?></td>
            <td><?=substr($product_cart->getProduct()->getDescription(), 0, 40)?></td>
            <td><form action="remove-item.php" method="post">
                <input type="hidden" name="id" value="<?= $id?>">
                 <button class="btn btn-primary">-</button>
                </form>
            </td>
            <td>
     <?=$quantidade?>
            </td>
            <td>
                 <form action="add-item.php" method="post">
                 <input type="hidden" name="id" value="<?=$id?>">
                 <button class="btn btn-primary">+</button>
                </form>
            </td>
            <td><?=$product_cart->getProduct()->getTotal()?></td>
            <td><form action="product-delete.php" method="post">
                <input type="hidden" name="id" value="<?=$product_cart->getProduct()->getId()?>">
                 <button class="btn btn-danger">Retirar</button>
            </form>
                </td>
                </tr>
    <?php
endforeach;
?>
    </table>
<?php
    require_once("footer.php");
?>
