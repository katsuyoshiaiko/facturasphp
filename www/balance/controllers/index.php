<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$balance = null;
$balance = balance_list(10, 5);
    
//include "www/balance/views/index.php";
include view("balance", "index");  
if ($debug) {
    include "www/balance/views/debug.php";
}