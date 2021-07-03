<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$modules = null;
$modules = modules_list();
    
//include "www/modules/views/export_pdf.php";
include view("modules", "export_pdf");      
if ($debug) {
    include "www/modules/views/debug.php";
}