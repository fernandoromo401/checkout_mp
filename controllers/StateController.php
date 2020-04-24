<?php

class StateController {

    public function managerState(){

        $request = $_POST['payment_status'];
        if (!$request) {
            $request = 'default';
        }
        
        switch ($request) {
            case 'approved':
                require_once('./views/ViewState/success.phtml');
                break;
            case 'failure':
                require_once('./views/ViewState/failure.phtml');
                break;
            case 'pending':
                require_once('./views/ViewState/pending.phtml');
                break;
            case 'default':
                require_once('./views/ViewState/default.html');
                break;
        }
    }

}

?>