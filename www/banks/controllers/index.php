<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$banks = null;
$banks = banks_list(10, 5);
    
//include "www/banks/views/index.php";
include view("banks", "index");  
if ($debug) {
    include "www/banks/views/debug.php";
}