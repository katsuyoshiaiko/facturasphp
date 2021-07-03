<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$tax = null;
$tax = tax_list(10, 5);
    
//include "www/tax/views/index.php";
include view("tax", "index");  
if ($debug) {
    include "www/tax/views/debug.php";
}