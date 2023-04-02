<?php
    session_start();
    define("UPLOAD_DIR_PROD", "./IMG/Product/");
    require_once "DB/database.php";    
    require_once "./UTILS/functions.php";
    $dbh = new DataBaseHelper('localhost', 'root', '', 'phones_dealers', 3306);
?>