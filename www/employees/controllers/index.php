<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$employees = null;
$employees = employees_list(10, 5);
    
//include "www/employees/views/index.php";
include view("employees", "index");  
if ($debug) {
    include "www/employees/views/debug.php";
}