<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$magia = null;
$magia = magia_list(10, 5);
    
//include "www/magia/views/index.php";
include view("magia", "index");  
if ($debug) {
    include "www/magia/views/debug.php";
}