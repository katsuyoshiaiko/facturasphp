<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$updates = null;
$updates = updates_list();
    
//include "www/updates/views/export_pdf.php";
include view("updates", "export_pdf");      
if ($debug) {
    include "www/updates/views/debug.php";
}