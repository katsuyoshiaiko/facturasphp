<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars

include view("home", "disabled");
die(); 


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$company_id = (isset($_POST["company_id"])) ? clean($_POST["company_id"]) : false;
$contact_id = (isset($_POST["contact_id"])) ? clean($_POST["contact_id"]) : false;
$owner_ref = (isset($_POST["owner_ref"])) ? clean($_POST["owner_ref"]) : false;
$date = (isset($_POST["date"])) ? clean($_POST["date"]) : false;
$cargo = (isset($_POST["cargo"])) ? clean($_POST["cargo"]) : false;
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

if (! employees_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (! $error ) {
    
    employees_edit(
        


$id ,  $company_id ,  $contact_id ,  $owner_ref ,  $date ,  $cargo ,  $order_by ,  $status    



                
        );
        header("Location: index.php?c=employees&a=details&id=$id");
          
}

$employees = employees_details($id);
    
include view("employees", "index");  
