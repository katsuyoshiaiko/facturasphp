<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$magia = null;

$magia = magia_list();

//include "www/magia/views/export_json.php";
include view("magia", "export_json");  
if ($debug) {
    include "www/magia/views/debug.php";
}