<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$permissions = null;
$pag = 0; 

$permissions = permissions_list($pag);
// pagination
$totalItems = count($permissions);

$url = "index.php?c=$c&a=$a";



//include "www/permissions/views/index.php";
include view("permissions", "index");
if ($debug) {
    include "www/permissions/views/debug.php";
}