<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$_options_options = null;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;        
        $_options_options = _options_options_search_by_id($txt);
        break;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        $_options_options = _options_options_search($txt);
        break;
}

//include "www/_options_options/views/index.php";
include view("_options_options", "index");      
