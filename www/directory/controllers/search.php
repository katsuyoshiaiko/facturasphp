<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$directory = null;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;        
        $directory = directory_search_by_id($txt);
        break;
    
    case "by_contact_id":
        $contact_id = (isset($_GET["contact_id"])) ? clean($_GET["contact_id"]) : false;        
        $directory = directory_search_by_contact_id($contact_id);
        break;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        $directory = directory_search($txt);
        break;
}

include view("directory", "index");      
