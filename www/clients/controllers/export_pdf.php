<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$clients = null;
$clients = clients_list();
    
//include "www/clients/views/export_pdf.php";
include view("clients", "export_pdf");      
if ($debug) {
    include "www/clients/views/debug.php";
}