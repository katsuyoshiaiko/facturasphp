<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


include view("home", "disabled");
die(); 


$error = array();

$users = null;

$users = users_list();

//include "www/users/views/export_json.php";
include view("users", "export_json");  
if ($debug) {
    include "www/users/views/debug.php";
}