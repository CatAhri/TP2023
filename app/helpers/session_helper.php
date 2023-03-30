<?php
session_start();

//public
function isLoggedIn(){
    if(isset($_SESSION['doctor_id'])){
        return true;
    }else{
        return false;
    }
}

?>