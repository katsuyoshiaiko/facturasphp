<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$company_id = (isset($_POST["company_id"])) ? clean($_POST["company_id"]) : false;
$date = (isset($_POST["date"])) ? clean($_POST["date"]) : false;
$discount = (isset($_POST["discount"])) ? clean($_POST["discount"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
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

if (! providers_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (! $error ) {
    
    providers_edit(
        


$id ,  $company_id ,  $date ,  $discount ,  $order_by ,  $status    



                
        );
        header("Location: index.php?c=providers&a=details&id=$id");
          
}

$providers = providers_details($id);
    
include view("providers", "index");  
