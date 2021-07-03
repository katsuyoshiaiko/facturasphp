<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$transport = null;
$transport = transport_list(10, 5);
    
//include "www/transport/views/index.php";
include view("transport", "index");  
if ($debug) {
    include "www/transport/views/debug.php";
}