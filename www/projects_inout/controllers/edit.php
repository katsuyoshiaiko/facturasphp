<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$error = array();

################################################################################
if (!$id) {
    array_push($error, "ID Don't send");
}
################################################################################
if (! projects_inout_is_id($id)) {
    array_push($error, "ID format error");
}
   
################################################################################
################################################################################
################################################################################
if (!$error) {
    $projects_inout = projects_inout_details($id);
    
    include view("projects_inout", "edit");      
} else {
    include view("home", "pageError");  
}

