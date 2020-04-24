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
        MercadoPago\SDK::setAccessToken('TEST-107697664459793-042414-38e4bc5948b94a160e9afc4ff438dca1-4719231733');

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

        $urlHeroku = "https://afternoon-shelf-14643.herokuapp.com/";

        $preference->back_urls = array(
          "success" => $urlHeroku."?r=success&price".$product["price"],
          "failure" => $urlHeroku."?r=failure",
          "pending" => $urlHeroku."?r=pending"
        );
        $preference->auto_return = "approved";

        $preference->save();





        require_once('./views/ViewProduct.phtml');

      
    }
}


?>