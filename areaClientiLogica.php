<?php
    require_once "connector.php";
    
    //Login
    if(isset($_POST["username"]) && isset($_POST["password"])){
        $login_result = $dbh->checkLoginUser($_POST["username"], $_POST["password"]);
        if(count($login_result)==0){
            //Login fallito
            $templateParams["errorelogin"] = "Errore! Controllare username o password!";
        }else{
            registerLoggedUser($login_result[0]);
        }
    }
    
    //Register
    if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["birthDate"]) && isset($_POST["newUsername"]) && isset($_POST["mail"]) && isset($_POST["newPassword"]) && isset($_POST["confirmPass"])){
        if($_POST["nome"] !== "" && $_POST["cognome"] !== "" && $_POST["birthDate"] !== "" && $_POST["newUsername"] !== "" && $_POST["mail"] !== "" && $_POST["newPassword"] !== "" && $_POST["confirmPass"]){
            $result = $dbh->checkRegisteredUser($_POST["newUsername"], $_POST["mail"]);
            if(count($result)==0){
                if($_POST["newPassword"] == $_POST["confirmPass"]) {
                    $dbh->userRegister($_POST["nome"], $_POST["cognome"], $_POST["birthDate"], $_POST["newUsername"], $_POST["mail"], $_POST["newPassword"]);
                    $templateParams["erroreRegister"] = "Registrazione effettuata con successo!";
                }else{
                    $templateParams["erroreRegister"] = "Errore! Password non uguali!";
                }                
            }else{
                $templateParams["erroreRegister"] = "Errore! Username o eMail già esistenti!";
            }
        }
    }

    //Controllo se un utente è loggato
    if(isUserLoggedIn()){
        $templateParams["Pagina"] = "./TEMPLATE/accountCliente.php";
        $templateParams["cliente"] = $dbh->getDatiCliente($_SESSION['id_cliente']);
        $templateParams["notificheCliente"] = $dbh->getNotificheCliente($_SESSION['id_cliente']);
        $templateParams["numNotificheCliente"] = count($templateParams["notificheCliente"]);
        $templateParams["ordiniCliente"] = $dbh->getOrdiniCliente($_SESSION['id_cliente']);
        $templateParams["numOrdiniCliente"] = $dbh->getNumOrdiniCliente($_SESSION['id_cliente']);
        $templateParams["numOrdiniCliente"] = count($templateParams["numOrdiniCliente"]);
        if($templateParams["ordiniCliente"] ==  NULL) {
            $templateParams["numOrdiniCliente"] = 0;
        }
      
    }else{
        $templateParams["Pagina"] = "TEMPLATE/areaClienti.php";
    }

    require "TEMPLATE/base.php" ;
?>