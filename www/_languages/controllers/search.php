<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$_languages = null;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;        
        $_languages = _languages_search_by_id($txt);
        break;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        $_languages = _languages_search($txt);
        break;
}

//include "www/_languages/views/index.php";
include view("_languages", "index");      
