<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$controllers = null;

$controllers = controllers_list();

//include "www/controllers/views/export_json.php";
include view("controllers", "export_json");  
if ($debug) {
    include "www/controllers/views/debug.php";
}