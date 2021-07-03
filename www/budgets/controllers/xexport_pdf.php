<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$budgets = null;
$budgets = budgets_list();
    
//include "www/budgets/views/export_pdf.php";
include view("budgets", "export_pdf");      
if ($debug) {
    include "www/budgets/views/debug.php";
}