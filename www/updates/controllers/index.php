<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$updates = null;
$updates = updates_list(10, 5);
    
//include "www/updates/views/index.php";
include view("updates", "index");  
if ($debug) {
    include "www/updates/views/debug.php";
}