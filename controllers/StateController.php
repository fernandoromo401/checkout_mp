<?php

class StateController {

    public function managerState(){
        //TOKEN
        $token = 'APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398';

        $request = $_POST['payment_status'];
        if (!$request) {
            $request = 'default';
        }
        $id = $_POST["payment_id"];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.mercadopago.com/v1/payments/".$id."?access_token=".$token);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        $res = json_decode($res, true);
        curl_close($ch);
        /*
        var_dump($res["order"]["id"]);
        var_dump($res["payment_method_id"]);
        var_dump($res["transaction_amount"]);
        var_dump($res["status"]);
        
        */
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