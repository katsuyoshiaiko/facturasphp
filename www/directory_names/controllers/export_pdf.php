<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$directory_names = null;
$directory_names = directory_names_list();
    
//include "www/directory_names/views/export_pdf.php";
include view("directory_names", "export_pdf");      
if ($debug) {
    include "www/directory_names/views/debug.php";
}