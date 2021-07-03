<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$_options_options = null;

$_options_options = _options_options_list();

//include "www/_options_options/views/export_json.php";
include view("_options_options", "export_json");  
if ($debug) {
    include "www/_options_options/views/debug.php";
}