<?php

class Product
{
    private $id;
    private $name;
    private $description;
    private $category;
    private $price;
    private $quantity;
    public $quantidade;

    public function __construct($name, $price, $description, Category $category, $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->category = $category;
        $this->quantity = $quantity;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setQuantity($quantidade)
    {
        $this->quantity = $quantidade;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getTotal()
    {
        return $total = $this->quantity*$this->price;
    }

    public function addQuantity($id)
    {
        return $this->quantity = $this->quantity+1;
    }

    public function setQuantosItens($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getPegandoItens()
    {
        return $this->quantidade;
    }
   /*public function controlAmount($valor){
    return $this->amount - $valor;
   }*/
}
