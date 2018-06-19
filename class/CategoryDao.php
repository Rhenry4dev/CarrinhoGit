<?php

class CategoryDao
{
    private $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function categorysList()
    {
        $categorys = array();

        $query = "
            SELECT * FROM categorys
        ";

        $resultado = mysqli_query($this->connect, $query);
    
        while ($category_array = mysqli_fetch_assoc($resultado)) {
            $category = new Category();
            $category->setId($category_array['id']);
            $category->setName($category_array['name']);

            array_push($categorys, $category);
        }
        
        return $categorys;
    }
}
