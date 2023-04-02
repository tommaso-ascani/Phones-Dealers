<?php
    function registerLoggedUser($user){
        if(isSellerLoggedIn()){
            session_destroy();
            session_start();
        }
        $_SESSION["id_cliente"] = $user["id_cliente"];
        $_SESSION["username"] = $user["Username"];
    }

    function isUserLoggedIn(){
        return !empty($_SESSION["id_cliente"]);
    }

    function registerLoggedSeller($seller){
        if(isUserLoggedIn()){
            session_destroy();
            session_start();
        }
        $_SESSION["id_venditore"] = $seller["id_venditore"];
        $_SESSION["username"] = $seller["Username"];
    }

    function isSellerLoggedIn(){
        return !empty($_SESSION["id_venditore"]);
    }    
?>