<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$banks = null;

$banks = banks_list();

//include "www/banks/views/export_json.php";
include view("banks", "export_json");  
if ($debug) {
    include "www/banks/views/debug.php";
}