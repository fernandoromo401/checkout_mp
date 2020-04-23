<?php
require_once('./controllers/ProductController.php');



switch ($_GET['r'] || "") {
    
    case '':
        $controllerProducts = new ProductController();
        $controllerProducts->getAll();
        break;
    
    case 'product':
        $controllerProducts = new ProductController();
        $controllerProducts->getOne();
        break;
    

    default:
        $controllerProducts = new ProductController();
        $controllerProducts->getAll();
        break;
}


?>