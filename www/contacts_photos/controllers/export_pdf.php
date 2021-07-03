<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$contacts_photos = null;
$contacts_photos = contacts_photos_list();
    
//include "www/contacts_photos/views/export_pdf.php";
include view("contacts_photos", "export_pdf");      
if ($debug) {
    include "www/contacts_photos/views/debug.php";
}