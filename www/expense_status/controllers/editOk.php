<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$code = (isset($_POST["code"])) ? clean($_POST["code"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;
 



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

if (! expense_status_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (! $error ) {
    
    expense_status_edit(
        


$id ,  $code ,  $status    



                
        );
        header("Location: index.php?c=expense_status&a=details&id=$id");
          
}

$expense_status = expense_status_details($id);
    
include view("expense_status", "index");  
