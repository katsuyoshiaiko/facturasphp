<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$projects_inout = null;
$projects_inout = projects_inout_list(10, 5);
    

include view("projects_inout", "index");  

if ($debug) {
    include "www/projects_inout/views/debug.php";
}