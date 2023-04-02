<?php
    require_once "connector.php";
    require_once "functions.php";

    if(isset($_POST["modello"]) && isset($_POST["marca"]) && isset($_POST["colore"]) && isset($_POST["memoria"]) && isset($_POST["prezzo"]) && isset($_POST["quantità"])){
        if($_POST["modello"] == "" || $_POST["marca"] == "" || $_POST["colore"] == "" || $_POST["memoria"] == "" || $_POST["prezzo"] == ""  || $_POST["quantità"] == "") {
            $templateParams["ErrorInsProduct"] = "Riempi tutti i campi per inserire un prodotto";
        } else {
            list($result, $msg) = uploadImage(UPLOAD_DIR_PROD, $_FILES["imgarticolo"]);
            if($result == 1){
                $imgarticolo = $msg;
                $dbh->addProduct($_SESSION["id_venditore"], $_POST["modello"], $_POST["marca"], $_POST["colore"], $_POST["memoria"], $_POST["prezzo"], $_POST["quantità"], $imgarticolo);
                $templateParams["InsProdCorrect"] = "Prodotto inserito correttamente";
            } else {
                $templateParams["ErrorInsProduct"] = "Prodotto NON inserito: ".$msg;
            }
        }
    }

    $templateParams["Pagina"] = "./TEMPLATE/venditoreInserisceProdotto.php";

    
    require "TEMPLATE/base.php" ;
?>