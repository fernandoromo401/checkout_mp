<?php

class StateController {

    public function managerState(){

        var_dump(array_keys($_POST)."<br>");

        switch ($_POST['payment_status']) {
            case 'approved':
                require_once('./views/ViewState/aproved.phtml');
                break;
            case 'failure':
                require_once('./views/ViewState/failure.phtml');
                break;
            case 'pending':
                require_once('./views/ViewState/pending.phtml');
                break;
            default:
                
        }
    }

}

?>