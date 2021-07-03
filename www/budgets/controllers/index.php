<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$budgets = null;
$budgets = budgets_list(10, 5);
    
//include "www/budgets/views/index.php";
include view("budgets", "index");  
if ($debug) {
    include "www/budgets/views/debug.php";
}