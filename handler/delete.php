<?php
require "../dbBroker.php";
require "../model/prijava.php";

if(isset($_POST['id'])){
    $obj = new Prijava($_POST['id']);
    $status = $obj->deletebyID($conn);
    if($status){
        echo "Success";
    }
    else {
        echo "Failed";
    }
}


?>