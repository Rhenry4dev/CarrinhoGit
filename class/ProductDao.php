<?php

class ProductDao
{
    private $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function productList()
    {

        $products = array();
        $query = "
            SELECT p.*, c.name AS category_name FROM products AS p JOIN categorys AS c ON c.id=p.category_id
        ";
        $resultado = mysqli_query($this->connect, $query);

        while ($product_array = mysqli_fetch_assoc($resultado)) {
            $category = new Category();
            $category->setName($product_array['category_name']);

            $id = $product_array['id'];
            $name = $product_array['name'];
            $price = $product_array['price'];
            $description = $product_array['description'];
            $quantity = $product_array['quantity'];

            $product = new Product($name, $price, $description, $category, $quantity);
            $product->setId($id);

            array_push($products, $product); //cloca o produto dentro do array para listagem posteriormente
        }
        
        return $products; //retorna o produto
    }
    
    public function insereCarrinho(Product $product)
    {

         $query = "
            INSERT INTO cart (product_name, product_price, product_description, product_quantity, product_id, product_category)
            VALUES('{$product->getName()}', {$product->getPrice()}, '{$product->getDescription()}', {$product->getQuantity()}, {$product->getId()}, {$product->getCategory()->getName()})
         ";
        
        return mysqli_query($this->connect, $query);
    }
 
    public function searchProduct($id)
    {
        $query = "
            SELECT * FROM products WHERE id = {$id}
        ";

        $resultado = mysqli_query($this->connect, $query);

        $product_achado = mysqli_fetch_assoc($resultado);

        $category = new Category();
        $category->setName($product_achado['category_id']);

        $name = $product_achado['name'];
        $price = $product_achado['price'];
        $description = $product_achado['description'];
        $quantity = $product_achado['quantity'];

        $product = new Product($name, $price, $description, $category, $quantity);
        $product->setId($product_achado['id']);

        return $product;
    }

    public function productDelete($id)
    {
        $query = "
            DELETE FROM cart WHERE product_id = {$id}
        ";//deleta com base no código msql
        return mysqli_query($this->connect, $query);//retorna o resultado da função
    }

    public function cartList()
    {

        $products_cart = array();

        $query = "
            SELECT * FROM cart
        ";
        $resultado = mysqli_query($this->connect, $query);

        while ($product_array = mysqli_fetch_assoc($resultado)) {
            $category = new Category();
            $category->setName($product_array['product_category']);

            $id = $product_array['product_id'];
            $name = $product_array['product_name'];
            $price = $product_array['product_price'];
            $description = $product_array['product_description'];
            $quantity = $product_array['product_quantity'];

            $product_id = new Product($name, $price, $description, $category, $quantity);
            $product_id->setId($id);

            $product_cart = new Cart($product_id, $quantity);
            $product_cart->setId($id);

            array_push($products_cart, $product_cart);
            //cloca o produto dentro do array para listagem posteriormente
        }

        return $products_cart; //retorna o produto
    }

    public function addItemQuantity($id, $quantity)
    {
        $query = " 
            UPDATE cart SET product_quantity = {$quantity} 
            WHERE product_id = {$id}
        ";
            //código mysql
            return mysqli_query($this->connect, $query);//retorna o resultado da inserção de dados
    }
    public function alterCart(Product $product_cart)
    {

            $query = "
                UPDATE cart SET product_name ='{$product_cart->getName()}', product_price = {$product_cart->getPrice()}, product_description = '{$product_cart->getDescription()}', product_quantity = '{$product_cart->getQuantity()}' 
                WHERE id = '{$product_cart->getId()}'
            ";
            //código mysql
            return mysqli_query($this->connect, $query);//retorna o resultado da inserção de dados
    }
    public function searchCart($id_product)
    {
        $query = "
            SELECT * FROM cart WHERE product_id = {$id_product}
        ";

        $resultado = mysqli_query($this->connect, $query);
        $product_achado = mysqli_fetch_assoc($resultado);
        $category = new Category();
        $category->setName($product_achado['product_category']);
        $id = $product_achado['id'];
        $name = $product_achado['product_name'];
        $price = $product_achado['product_price'];
        $description = $product_achado['product_description'];
        $quantity = $product_achado['product_quantity'];

        $product = new Product($name, $price, $description, $category, $quantity);
        $product->setId($id);

        $cart = new Cart($product, $quantity);

        return $cart;
    }
}
