<?php
require_once('./controllers/ProductController.php');
require_once('./controllers/StateController.php');


switch ($_GET['r']) {
    
    case '':
        $controllerProducts = new ProductController();
        $controllerProducts->getAll();
        break;
    
    case 'product':
        $controllerProducts = new ProductController();
        $controllerProducts->getOne();
        break;

    case 'state':
        $controllerState = new StateController();
        $controllerState->managerState();
        break;    

    default:
        $controllerProducts = new ProductController();
        $controllerProducts->getAll();
        break;
}


?>