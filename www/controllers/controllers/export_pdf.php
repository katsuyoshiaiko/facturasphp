<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$controllers = null;
$controllers = controllers_list();
    
//include "www/controllers/views/export_pdf.php";
include view("controllers", "export_pdf");      
if ($debug) {
    include "www/controllers/views/debug.php";
}