<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/src/models/database.php");

function login(){
    $rows = get_infos();
    require_once($_SERVER["DOCUMENT_ROOT"] . "/src/templates/login.php");
}
