<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id    = (isset($_REQUEST["id"]))      ? clean($_REQUEST["id"]) : false;

$error = array();

################################################################################
if (! $c) {
    array_push($error, "Controller Don't send");
}

if (! $a) {
    array_push($error, "Action Don't send");
}
if (! $id) {
    array_push($error, "ID Don't send");
}


################################################################################

if (! modules_is_id($id)) {
    array_push($error, 'ID format error');
}
################################################################################

if (! modules_field_id("id", $id)) {
    array_push($error, "id not exist");
}



if (!$error) {
    $modules = modules_details($id);    
    include view("modules", "details");      
} else {
    array_push($error, "Check your form");    
     include view("modules", "index");      
}

