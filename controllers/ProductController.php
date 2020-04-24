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
        
        

        // Agrega credenciales
        MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-090914-5c508e1b02a34fcce879a999574cf5c9-469485398');

        $payer = new MercadoPago\Payer();
        $payer->name = "Lalo";
        $payer->surname = "Landa";
        $payer->email = "test_user_63274575@testuser.com";
        $payer->phone = array(
          "area_code"   => "011",
          "number"      => "22223333"
        );

        $payer->identification = array(
          "type" => "DNI",
          "number" => "22333444"
        );
          
        $payer->address = array(
          "street_name" => "Falsa",
          "street_number" => 123,
          "zip_code" => "1111"
        );

        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();

        // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        $item->title = $product["name"];
        $item->quantity = 1;
        $item->unit_price = $product["price"];
        $preference->items = array($item);


        $preference->external_reference = "ABCD1234";
        $preference->payment_methods = array(
            "excluded_payment_types" => array(
              array("id" => "atm")
            ),
            "default_installments" => 6,
            "excluded_payment_methods" => array(
                array("id" => "amex")
            )
        );

        $preference->back_urls = array(
          "success" => "http://localhost/mercado_pago/?r=success",
          "failure" => "http://localhost/mercado_pago/?r=failure",
          "pending" => "http://localhost/mercado_pago/?r=pending"
        );
        $preference->auto_return = "approved";

        $preference->save();





        require_once('./views/ViewProduct.phtml');

       
        echo  $_POST['preference_id'];
        echo  $_POST['payment_id'];
    }
}


?>