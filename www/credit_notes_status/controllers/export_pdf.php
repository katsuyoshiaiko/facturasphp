<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$credit_notes_status = null;
$credit_notes_status = credit_notes_status_list();
    
//include "www/credit_notes_status/views/export_pdf.php";
include view("credit_notes_status", "export_pdf");      
if ($debug) {
    include "www/credit_notes_status/views/debug.php";
}