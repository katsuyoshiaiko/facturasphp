<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("home", "disabled");
die(); 


$error = array();

$users_ask_pass = null;

$users_ask_pass = users_ask_pass_list();

//include "www/users_ask_pass/views/export_json.php";
include view("users_ask_pass", "export_json");  
if ($debug) {
    include "www/users_ask_pass/views/debug.php";
}