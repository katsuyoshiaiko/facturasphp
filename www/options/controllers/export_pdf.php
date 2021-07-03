<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$options = null;
$options = options_list();
    
//include "www/options/views/export_pdf.php";
include view("options", "export_pdf");      
if ($debug) {
    include "www/options/views/debug.php";
}