<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$_menus = null;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;        
        $_menus = _menus_search_by_id($txt);
        break;
    
    case "location":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;        
        $_menus = _menus_search_by_location($txt);
        break;
    
    case "lf": // location father
        $l = (isset($_GET["l"])) ? clean($_GET["l"]) : false;        
        $f = (isset($_GET["f"])) ? clean($_GET["f"]) : false;        
        $_menus = _menus_search_by_location_father($l, $f);
        break;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        $_menus = _menus_search($txt);
        break;
}

//include "www/_menus/views/index.php";
include view("_menus", "index");      
