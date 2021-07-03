<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$invoice_lines = null;
$invoice_lines = invoice_lines_list();
    
//include "www/invoice_lines/views/export_pdf.php";
include view("invoice_lines", "export_pdf");      
if ($debug) {
    include "www/invoice_lines/views/debug.php";
}