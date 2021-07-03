<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$_options_options = null;
$_options_options = _options_options_list(10, 5);

    
//include "www/_options_options/views/index.php";
include view("_options_options", "index");  
if ($debug) {
    include "www/_options_options/views/debug.php";
}