<?php
require_once 'dbConnection.php';

class Category
{
    public $CategoryId;
    public $CategoryName;
    public $CategoryDescription;
    public $CreationDate;

    public function __construct($id, $nom, $desc, $date)
    {
        $this->CategoryId = $id;
        $this->CategoryName = $nom;
        $this->CategoryDescription = $desc;
        $this->CreationDate = $date;
    }


    public static function getAllCategoriesList()
    {
        $DbConnection = Db::GetConnection();
        $response = $DbConnection->query('select * FROM `Categories`;');
        $categories = [];
        while($row = $response->fetch()){
            $c = new Category($row['CategoryId'],$row['CategoryName'], $row['CategoryDescription'], $row['CategoryCreationDate']);
            array_push($categories, $c);
        }
        return $categories;
    }

    public static function getAllCategoriesNamesList()
    {
        $DbConnection = Db::GetConnection();
        $response = $DbConnection->query('select CategoryId, CategoryName FROM `Categories`;');
        $categories = [];
        while($row = $response->fetch()){
            array_push($categories, $row);
        }
        return $categories;
    }
}

?>