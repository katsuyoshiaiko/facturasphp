<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$directory = null;

$directory = directory_list();

//include "www/directory/views/export_json.php";
include view("directory", "export_json");  
if ($debug) {
    include "www/directory/views/debug.php";
}