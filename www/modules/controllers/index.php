<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$modules = null;
$modules = modules_list(10, 5);
    
//include "www/modules/views/index.php";
include view("modules", "index");  
if ($debug) {
    include "www/modules/views/debug.php";
}