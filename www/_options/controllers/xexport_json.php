<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$_options = null;

$_options = _options_list();

//include "www/_options/views/export_json.php";
include view("_options", "export_json");  
if ($debug) {
    include "www/_options/views/debug.php";
}