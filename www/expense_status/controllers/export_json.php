<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$expense_status = null;

$expense_status = expense_status_list();

//include "www/expense_status/views/export_json.php";
include view("expense_status", "export_json");  
if ($debug) {
    include "www/expense_status/views/debug.php";
}