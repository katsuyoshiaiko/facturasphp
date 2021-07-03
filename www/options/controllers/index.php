<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$options = null;
$options = options_list(10, 5);
    
//include "www/options/views/index.php";
include view("options", "index");  
if ($debug) {
    include "www/options/views/debug.php";
}