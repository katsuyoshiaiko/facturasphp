<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$magia = null;
$magia = magia_list();
    
//include "www/magia/views/export_pdf.php";
include view("magia", "export_pdf");      
if ($debug) {
    include "www/magia/views/debug.php";
}