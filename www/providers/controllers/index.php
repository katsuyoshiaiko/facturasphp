<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$providers = null;
$providers = providers_list(10, 5);
    
//include "www/providers/views/index.php";
include view("providers", "index");  
if ($debug) {
    include "www/providers/views/debug.php";
}