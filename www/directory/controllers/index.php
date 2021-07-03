<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$directory = null;
$directory = directory_list(10, 5);
    
//include "www/directory/views/index.php";
include view("directory", "index");  
if ($debug) {
    include "www/directory/views/debug.php";
}