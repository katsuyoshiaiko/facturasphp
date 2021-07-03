<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id    = (isset($_POST["id"]))         ? clean($_POST["id"]) : false;
$redi  = (isset($_POST["redi"]))       ? clean($_POST["redi"]) : false;


$error = array();
################################################################################
if (! $id) {
    array_push($error, "ID Don't send");
}
################################################################################

if (! projects_inout_is_id($id)) {
    array_push($error, 'Id format error');
}
################################################################################
################################################################################
################################################################################

if ( !$error) {
    
        projects_inout_delete(
                $id
        );


    switch ($redi) {
        case 1:
            header("Location: index.php?c=projects_inout");
            break;

        default:
            header("Location: index.php?c=projects_inout");
            break;
    }
    

        
         
} else {

    include view("home", "pageError");  
}
