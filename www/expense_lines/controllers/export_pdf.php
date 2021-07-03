<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$expense_lines = null;
$expense_lines = expense_lines_list();
    
//include "www/expense_lines/views/export_pdf.php";
include view("expense_lines", "export_pdf");      
if ($debug) {
    include "www/expense_lines/views/debug.php";
}