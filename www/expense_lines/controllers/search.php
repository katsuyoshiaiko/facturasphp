<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$expense_lines = null;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;        
        $expense_lines = expense_lines_search_by_id($txt);
        break;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        $expense_lines = expense_lines_search($txt);
        break;
}

//include "www/expense_lines/views/index.php";
include view("expense_lines", "index");      
