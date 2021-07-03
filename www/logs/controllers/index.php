<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$logs = null;
$logs = logs_list(10, 5);
    
//include "www/logs/views/index.php";
include view("logs", "index");  
if ($debug) {
    include "www/logs/views/debug.php";
}