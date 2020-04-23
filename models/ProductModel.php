<?php

class ProductModel{
    public $products = [
        [
            "id"            => 1,
            "name"          => "Celular 1",
            "description"   => "Dispositivo móvil de Tienda e-commerce",
            "imgUrl"        => "celular.jpg",
            "price"        => 5000
        ],
        [
            "id"            => 2,
            "name"          => "Celular 2",
            "description"   => "Dispositivo móvil de Tienda e-commerce",
            "imgUrl"        => "celular.jpg",
            "price"        => 2000
        ],
        [
            "id"            => 3,
            "name"          => "Celular 3",
            "description"   => "Dispositivo móvil de Tienda e-commerce",
            "imgUrl"        => "celular.jpg",
            "price"        => 15000
    ]];

    public function findAll(){
        
        $products = $this->products;

        return $products;
    }

    public function findById($id){
        
        for ($i=0; $i < count($this->products); $i++) { 
            
            if ($this->products[$i]["id"] == intval($id)) {
                $product = $this->products[$i];
                break;
            }
        }

        return $product;
    }
}

?>