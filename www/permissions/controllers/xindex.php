<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$permissions = null;
$permissions = permissions_list(10, 5);
    
//include "www/permissions/views/index.php";
include view("permissions", "index");  
if ($debug) {
    include "www/permissions/views/debug.php";
}