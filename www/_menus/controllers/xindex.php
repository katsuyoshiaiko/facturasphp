<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$_menus = null;
$_menus = _menus_list(10, 5);
    
//include "www/_menus/views/index.php";
include view("_menus", "index");  
if ($debug) {
    include "www/_menus/views/debug.php";
}