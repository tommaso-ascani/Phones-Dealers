<?php
    require_once "connector.php";

    if(isset($_POST["mail"]) && isset($_POST["text"])){
        if($_POST["mail"] !== "" && $_POST["text"] !== ""){
            $dbh->sendHelp($_POST["mail"], $_POST["text"]);
            $templateParams['errore'] = 'Richiesta inviata con successo!';
        }else{
            $templateParams['errore'] = 'Errore! Rimpieri tutti i campi!';
        }
    }    

    $templateParams["Pagina"] = "./TEMPLATE/assistenza.php";

    require "TEMPLATE/base.php" ;
?>