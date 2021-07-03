<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id    = (isset($_GET["id"]))         ? clean($_GET["id"]) : false;


$error = array();
################################################################################
if (! $c) {
    array_push($error, "Controller don't send");
}
if (! $a) {
    array_push($error, "Action don't send");
}
if (! $id) {
    array_push($error, "ID Don't send");
}
################################################################################

if ($a !="delete") {
    array_push($error, "Action error");
}

if (! budget_status_is_id($id)) {
    array_push($error, 'Id format error ');
}
################################################################################
$budget_status = budget_status_details($id);


//include "www/budget_status/views/delete.php"; 
include view("budget_status", "delete");  
