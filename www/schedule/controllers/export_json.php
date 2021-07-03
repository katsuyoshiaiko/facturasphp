<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$schedule = null;

$schedule = schedule_list();

//include "www/schedule/views/export_json.php";
include view("schedule", "export_json");  
if ($debug) {
    include "www/schedule/views/debug.php";
}