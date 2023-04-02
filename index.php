<?php
    require_once "connector.php";
    
    if (isset($_GET['logout'])) {
        session_destroy();    
        header("location: index.php");
    }

    if (isUserLoggedIn() && isset($_GET['pAdd'])) {
        if(!$dbh->existCart($_SESSION['username'])){
            $dbh->createCart($_SESSION['username']); 
        }       
        $dbh->addToCart($_SESSION['username'], (int)$_GET['pAdd']);
        header("location: index.php");
    }

    $templateParams["Pagina"] = "./TEMPLATE/acquista.php";
    $templateParams["Prodotto"] = $dbh->getProduct();

    require "TEMPLATE/base.php" ;
?>