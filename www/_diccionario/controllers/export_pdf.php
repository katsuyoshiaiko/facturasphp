<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$_diccionario = null;
$_diccionario = _diccionario_list();
    
//include "www/_diccionario/views/export_pdf.php";
include view("_diccionario", "export_pdf");      
if ($debug) {
    include "www/_diccionario/views/debug.php";
}