<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/src/controllers/homepage.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/controllers/login.php");

if(isset($_GET["action"])){
    $action = $_GET["action"];
    if($action == "login"){
        login();
    }else{
        die("Erreur : paramètre action (méthode GET) non reconnue : {$action}");
    }
}else{
    homepage();
}