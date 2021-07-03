<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$rols = null;
$rols = rols_list(10, 5);
    
//include "www/rols/views/index.php";
include view("rols", "index");  
if ($debug) {
    include "www/rols/views/debug.php";
}