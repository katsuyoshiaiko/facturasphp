<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$transport = null;
$transport = transport_list();
    
//include "www/transport/views/export_pdf.php";
include view("transport", "export_pdf");      
if ($debug) {
    include "www/transport/views/debug.php";
}