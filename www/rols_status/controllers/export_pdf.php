<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$rols_status = null;
$rols_status = rols_status_list();
    
//include "www/rols_status/views/export_pdf.php";
include view("rols_status", "export_pdf");      
if ($debug) {
    include "www/rols_status/views/debug.php";
}