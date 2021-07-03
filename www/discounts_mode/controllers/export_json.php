<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$discounts_mode = null;

$discounts_mode = discounts_mode_list();

//include "www/discounts_mode/views/export_json.php";
include view("discounts_mode", "export_json");  
if ($debug) {
    include "www/discounts_mode/views/debug.php";
}