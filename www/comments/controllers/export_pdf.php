<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$comments = null;
$comments = comments_list();
    
//include "www/comments/views/export_pdf.php";
include view("comments", "export_pdf");      
if ($debug) {
    include "www/comments/views/debug.php";
}