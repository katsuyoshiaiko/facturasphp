<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$logs = null;
$logs = logs_list();
    
//include "www/logs/views/export_pdf.php";
include view("logs", "export_pdf");      
if ($debug) {
    include "www/logs/views/debug.php";
}