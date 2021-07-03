<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$budget_lines = null;

$budget_lines = budget_lines_list();

//include "www/budget_lines/views/export_json.php";
include view("budget_lines", "export_json");  
if ($debug) {
    include "www/budget_lines/views/debug.php";
}