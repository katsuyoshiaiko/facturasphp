<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id    = (isset($_GET["id"]))         ? clean($_GET["id"]) : false;


$error = array();
################################################################################
if (! $id) {
    array_push($error, "ID Don't send");
}
################################################################################

if ($a !="delete") {
    array_push($error, "Action error");
}

if (! projects_inout_is_id($id)) {
    array_push($error, 'Id format error ');
}
################################################################################
$projects_inout = projects_inout_details($id);


//include "www/projects_inout/views/delete.php"; 
include view("projects_inout", "delete");  
