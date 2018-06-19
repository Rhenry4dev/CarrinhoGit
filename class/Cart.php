<?php
class Cart
{
    private $id;
    private $product;
    private $quantity;

    public function __construct(Product $product, $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function setId($id)
    {
        return $this->id = $id;
    }

    public function setQuantity($quantity)
    {
        return $this->quantity = $quantity;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
}
