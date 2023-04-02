<?php
    require_once "connector.php";
    $templateParams["allClientUsernames"] = $dbh->getAllUsernameClients();

    if(isset($_GET["elimina"])){
        $dbh->deleteProdotto((int)$_GET["elimina"]);
        foreach($templateParams["allClientUsernames"] as $CUsername){
            if($dbh->existCart($CUsername['Username'])){
                $dbh->removeFromCart((int)$_GET["elimina"], $CUsername['Username']);
            }            
        }  
    }
    
    //Login
    if(isset($_POST["username"]) && isset($_POST["password"])){
        $login_result = $dbh->checkLoginSeller($_POST["username"], $_POST["password"]);
        if(count($login_result)==0){
            //Login fallito
            $templateParams["errorelogin"] = "Errore! Controllare username o password!";
        }else{
            registerLoggedSeller($login_result[0]);
        }
    }

    //Register
    if(isset($_POST["pIVA"]) && isset($_POST["newUsername"]) && isset($_POST["mail"]) && isset($_POST["newPassword"]) && isset($_POST["confirmPass"])){
        if($_POST["pIVA"] !== "" && $_POST["newUsername"] !== "" && $_POST["mail"] !== "" && $_POST["newPassword"] !== "" && $_POST["confirmPass"]){
            $result = $dbh->checkRegisteredSeller($_POST["pIVA"]);
            if(count($result)==0){
                if($_POST["newPassword"] == $_POST["confirmPass"]) {
                    $dbh->sellerRegister($_POST["pIVA"], $_POST["newUsername"], $_POST["mail"], $_POST["newPassword"]);
                    $templateParams["erroreRegister"] = "Registrazione effettuata con successo!";
                }else{
                    $templateParams["erroreRegister"] = "Errore! Password non uguali!";
                }                
            }else{
                $templateParams["erroreRegister"] = "Errore! Partita IVA già esistente!";
            }
        }
    }

    //Controllo se un utente è loggato
    if(isSellerLoggedIn()){
        $templateParams["Pagina"] = "./TEMPLATE/accountVenditore.php";
        $templateParams["ProdottiVenditore"] = $dbh->getProdottiVenditore($_SESSION["id_venditore"]);
        $templateParams["venditore"] = $dbh->getDatiVenditore($_SESSION["id_venditore"]);
        $templateParams["notificheVenditore"] = $dbh->getNotificheVenditore($_SESSION["id_venditore"]);
        $templateParams["numNotifichevenditore"] = count($templateParams["notificheVenditore"]);
        $templateParams["ordiniVenditore"] = $dbh->getOrdiniVenditore($_SESSION["id_venditore"]);
        $templateParams["numOrdiniVenditore"] = count($templateParams["ordiniVenditore"]);
    }else{
        $templateParams["Pagina"] = "TEMPLATE/areaVenditore.php";
    }

    require "TEMPLATE/base.php" ;
?>