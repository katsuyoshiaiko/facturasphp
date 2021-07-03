<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$budget_lines = null;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;        
        $budget_lines = budget_lines_search_by_id($txt);
        break;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        $budget_lines = budget_lines_search($txt);
        break;
}

//include "www/budget_lines/views/index.php";
include view("budget_lines", "index");      
