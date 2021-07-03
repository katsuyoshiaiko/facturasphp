<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$directory_names = null;
$directory_names = directory_names_list(10, 5);
    
//include "www/directory_names/views/index.php";
include view("directory_names", "index");  
if ($debug) {
    include "www/directory_names/views/debug.php";
}