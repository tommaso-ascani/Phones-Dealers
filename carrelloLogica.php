<?php
    require_once "connector.php";

    if(isset($_GET['buy']) && $dbh->existCart($_SESSION['username'])){
        $templateParams["buy"] = "COMPLIMENTI! Acquisto effetuato con successo!";
        $dbh->buy($_SESSION['username']);
    }

    if(isSellerLoggedIn()){
        $templateParams["errore"] = "I venditori non possono fare acquisti!";
    }elseif(!isSellerLoggedIn() && !isUserLoggedIn()){
        $templateParams["errore"] = "Accedi per effettuare acquisti!";
    }

    if (isUserLoggedIn() && isset($_GET['pAdd'])) {
        $dbh->addToCart($_SESSION['username'], (int)$_GET['pAdd']);
        header("location: carrelloLogica.php");
    }elseif(isUserLoggedIn() && isset($_GET['pRemove'])){
        $dbh->removeOneFromCart((int)$_GET['pRemove'], $_SESSION['username']);
        header("location: carrelloLogica.php");             
    }

    if(isUserLoggedIn()){
        $dbh->isCartEmpty($_SESSION['username']);
        $templateParams["cartProduct"] = $dbh->getCart($_SESSION['username']);        
    }

    $templateParams["Pagina"] = "./TEMPLATE/carrello.php";
    require "TEMPLATE/base.php";
?>