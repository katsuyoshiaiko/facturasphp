<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$magia = null;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;        
        $magia = magia_search_by_id($txt);
        break;
    case "by_table":
        $table = (isset($_GET["table"])) ? clean($_GET["table"]) : false;        
        $magia = magia_search_by_tabla($table);
        break;
    case "by_table_field":
        $table = (isset($_GET["table"])) ? clean($_GET["table"]) : false;        
        $field = (isset($_GET["field"])) ? clean($_GET["field"]) : false;        
        $magia = magia_search_by_table_field($table, $field);
        break;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        $magia = magia_search($txt);
        break;
}

//include "www/magia/views/index.php";
include view("magia", "search");      
