<?php

$action = isset($_GET['action'])? $_GET['action'] : '';
require_once 'Models/Products.php';
require_once 'Models/Categorie.php';

if($action == "listPopularProductsNames"){
    $products = Product::getProductsName();
    echo json_encode($products);
}
else if ($action == "ListCategoriesNames"){
    $names = Category::getAllCategoriesNamesList();
    echo json_encode($names);
    die();
}
else if ($action == "listProducts"){
    $productsList = Product::getAllProductsList();
    echo json_encode($productsList);
    die();
}
else if ($action == "listByCategory"){
    $id = isset($_GET['action'])? $_GET['action'] : 0;
    if($id == 0){
        echo 'error';
        die();
    }
    else{
        $ProductsListByCategory = Product::getProductsByCategory($id);
        echo json_encode($ProductsListByCategory);
        die();
    }
}

?>