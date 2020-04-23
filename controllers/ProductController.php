<?php

require_once('./models/ProductModel.php');

class ProductController{
    public function getAll(){
        $productsModel = new ProductModel();
        $products = $productsModel->findAll();

        require_once('./views/ViewProducts.phtml');
    }

    public function getOne(){

        $id = $_GET['id'];

        $productModel = new ProductModel();
        $product = $productModel->findById($id);

        require_once('./views/ViewProduct.phtml');
    }
}


?>