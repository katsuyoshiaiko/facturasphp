<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$controllers = null;
$controllers = controllers_list(10, 5);
    
//include "www/controllers/views/index.php";
include view("controllers", "index");  
if ($debug) {
    include "www/controllers/views/debug.php";
}