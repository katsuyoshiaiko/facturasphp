<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$invoice_lines = null;
$invoice_lines = invoice_lines_list(10, 5);
    
//include "www/invoice_lines/views/index.php";
include view("invoice_lines", "index");  
if ($debug) {
    include "www/invoice_lines/views/debug.php";
}