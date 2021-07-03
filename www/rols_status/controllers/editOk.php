<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$rol = (isset($_POST["rol"])) ? clean($_POST["rol"]) : false;
$status_code = (isset($_POST["status_code"])) ? clean($_POST["status_code"]) : false;
 



$error = array();
//
################################################################################
if (! $c) {
    array_push($error, "Controller Don't send");
}
//
if (! $a) {
    array_push($error, "Action Don't send");
}
//
if (! $id) {
    array_push($error, "ID Don't send");
}
//
if (! $text) {
   // array_push($error, "Text Don't send");
}
//
################################################################################

if (! rols_status_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (! $error ) {
    
    rols_status_edit(
        


$id ,  $rol ,  $status_code    



                
        );
        header("Location: index.php?c=rols_status&a=details&id=$id");
          
}

$rols_status = rols_status_details($id);
    
include view("rols_status", "index");  
