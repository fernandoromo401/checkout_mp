<?php

class StateController {

    public function managerState(){

        var_dump(array_keys($_POST)."<br>");
        echo  $_POST['preference_id']."<br>";
        echo  $_POST['payment_id']."<br>";
        echo  $_POST['payment_status']."<br>";
        echo  $_POST['back_url']."<br>";

        switch ($_POST['payment_status']) {
            case 'approved':
                require_once('./views/ViewState/aproved.phtml');
                echo "<h2>apro</h2>";
                break;
            case 'failure':
                require_once('./views/ViewState/failure.phtml');
                echo "<h2>fail</h2>";
                break;
            case 'pending':
                require_once('./views/ViewState/pending.phtml');
                echo "<h2>pen</h2>";
                break;
        }
    }

}

?>