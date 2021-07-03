<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$_languages = null;

$_languages = _languages_list();

//include "www/_languages/views/export_json.php";
include view("_languages", "export_json");  
if ($debug) {
    include "www/_languages/views/debug.php";
}