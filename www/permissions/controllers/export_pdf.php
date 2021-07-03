<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$permissions = null;
$permissions = permissions_list();
    
//include "www/permissions/views/export_pdf.php";
include view("permissions", "export_pdf");      
if ($debug) {
    include "www/permissions/views/debug.php";
}