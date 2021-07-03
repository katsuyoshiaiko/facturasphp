<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$rols_status = null;
$rols_status = rols_status_list(10, 5);
    
//include "www/rols_status/views/index.php";
include view("rols_status", "index");  
if ($debug) {
    include "www/rols_status/views/debug.php";
}