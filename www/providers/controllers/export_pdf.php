<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$providers = null;
$providers = providers_list();
    
//include "www/providers/views/export_pdf.php";
include view("providers", "export_pdf");      
if ($debug) {
    include "www/providers/views/debug.php";
}