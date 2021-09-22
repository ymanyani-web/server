<?php

require_once 'dbConnection.php';

class Product{
    
    public $ProductId;
    public $Name;
    public $Price;
    public $Description;
    public $ProductImg;
    public $CategoryId;
    public $Category;
    public $Rating;

    public function __construct($productId, $nom, $prix, $desc, $productImg, $rating)
    {   
        $this->Name = $nom;
        $this->Price = $prix;
        $this->Description = $desc;
        $this->ProductId = $productId;
        $this->ProductImg = $productImg;
        $this->Rating = $rating;
    }

    public static function getProductsName()
    {
        $DbConnection = Db::GetConnection();
        $response = $DbConnection->query('select * FROM `Products`;');
        $products = [];
        while($row = $response->fetch()){
            array_push($products, $row['ProductName']);
        }
        return $products;
    }

    public static function getAllProductsList()
    {
        $DbConnection = Db::GetConnection();
        $response = $DbConnection->query('select * FROM `Products`;');
        $products = [];
        while($row = $response->fetch()){
            $data = [];
            $p = new Product($row['ProductId'],$row['ProductName'], $row['ProductPrice'], $row['Description'], $row['ProductImg'], $row['ProductRating']);
            
            $categoryData = $DbConnection->query('SELECT * FROM `categories` WHERE CategoryId='. $row['CategoryId'] .';')->fetch();
            
            array_push($data,  $p);
            array_push($data,  $categoryData);
            array_push($products, $data);
        }
        return $products;
    }

    public static function getProductsByCategory($categoryId)
    {
        $DbConnection = Db::GetConnection();
        $response = $DbConnection->query('SELECT * FROM `products` WHERE CategoryId = '. $categoryId .';');
        $products = [];
        while($row = $response->fetch()){
            $data = [];
            $p = new Product($row['ProductId'],$row['ProductName'], $row['ProductPrice'], $row['Description'], $row['ProductImg'], $row['ProductRating']);
            
            $categoryData = $DbConnection->query('SELECT * FROM `categories` WHERE CategoryId='. $row['CategoryId'] .';')->fetch();
            
            array_push($data,  $p);
            array_push($data,  $categoryData);
            array_push($products, $data);
        }
        return $products;
    }
    public static function getProductsById($categoryId)
    {
        $DbConnection = Db::GetConnection();
        $response = $DbConnection->query('SELECT * FROM `products` WHERE ProductId = '. $categoryId .';');
        $products = [];
        while($row = $response->fetch()){
            $data = [];
            $p = new Product($row['ProductId'],$row['ProductName'], $row['ProductPrice'], $row['Description'], $row['ProductImg'], $row['ProductRating']);
            
            $categoryData = $DbConnection->query('SELECT * FROM `categories` WHERE CategoryId='. $row['CategoryId'] .';')->fetch();
            
            array_push($data,  $p);
            array_push($data,  $categoryData);
            array_push($products, $data);
        }
        return $products;
    }

}

?>