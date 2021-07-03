<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$balance = null;
$balance = balance_list();
    
include view("balance", "export_all_pdf");      
if ($debug) {
    include "www/contacts/views/debug.php";
}