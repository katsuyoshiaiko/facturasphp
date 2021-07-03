<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$_translations = null;
$_translations = _translations_list();
    
//include "www/_translations/views/export_pdf.php";
include view("_translations", "export_pdf");      
if ($debug) {
    include "www/_translations/views/debug.php";
}