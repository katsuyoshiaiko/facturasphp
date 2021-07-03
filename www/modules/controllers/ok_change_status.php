<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$new_status = (isset($_REQUEST["status"])) ? clean($_REQUEST["status"]) : false;


$error = array();




################################################################################

if (!$id) {
    array_push($error, "ID Don't send");
}




################################################################################
################################################################################
################################################################################

if (! modules_is_id($id)) {
    array_push($error, "ID format error");
}
   


if (!modules_is_status($new_status)) {
    array_push($error, "Sttaus format error");
}
   


################################################################################

if (!$error) {
    
    
    modules_change_status($id, $new_status); 
    
    
    
    header("Location: index.php?c=modules") ;
    
    
    
} else {
    array_push($error, "Check your form");
    
     include view("home", "pageError");      
}

