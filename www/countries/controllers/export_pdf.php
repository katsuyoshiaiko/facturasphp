<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$countries = null;
$countries = countries_list();
    
//include "www/countries/views/export_pdf.php";
include view("countries", "export_pdf");      
if ($debug) {
    include "www/countries/views/debug.php";
}