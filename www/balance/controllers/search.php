<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$balance = null;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;        
        $balance = balance_search_by_id($txt);
        break;
    
    case "cancelCode":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;        
        $balance = balance_search_by_codeCancel($txt);
        break;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        $balance = balance_search($txt);
        break;
}

include view("balance", "index");      
