<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$tax = null;

$tax = tax_list();

//include "www/tax/views/export_json.php";
include view("tax", "export_json");  
if ($debug) {
    include "www/tax/views/debug.php";
}