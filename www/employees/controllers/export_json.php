<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$employees = null;

$employees = employees_list();

//include "www/employees/views/export_json.php";
include view("employees", "export_json");  
if ($debug) {
    include "www/employees/views/debug.php";
}