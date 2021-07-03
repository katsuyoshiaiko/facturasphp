<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$schedule = null;
$schedule = schedule_list(10, 5);
    
//include "www/schedule/views/index.php";
include view("schedule", "index");  
if ($debug) {
    include "www/schedule/views/debug.php";
}