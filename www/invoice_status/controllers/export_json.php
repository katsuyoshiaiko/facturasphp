<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$invoice_status = null;

$invoice_status = invoice_status_list();

//include "www/invoice_status/views/export_json.php";
include view("invoice_status", "export_json");  
if ($debug) {
    include "www/invoice_status/views/debug.php";
}