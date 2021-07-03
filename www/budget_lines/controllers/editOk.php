<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars

include view("home", "disabled");
die(); 

$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$budget_id = (isset($_POST["budget_id"])) ? clean($_POST["budget_id"]) : false;
$code = (isset($_POST["code"])) ? clean($_POST["code"]) : false;
$quantity = (isset($_POST["quantity"])) ? clean($_POST["quantity"]) : false;
$description = (isset($_POST["description"])) ? clean($_POST["description"]) : false;
$price = (isset($_POST["price"])) ? clean($_POST["price"]) : false;
$discounts = (isset($_POST["discounts"])) ? clean($_POST["discounts"]) : false;
$discounts_mode = (isset($_POST["discounts_mode"])) ? clean($_POST["discounts_mode"]) : false;
$tax = (isset($_POST["tax"])) ? clean($_POST["tax"]) : false;
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

if (! budget_lines_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (! $error ) {
    
    budget_lines_edit(
        


$id ,  $budget_id ,  $code ,  $quantity ,  $description ,  $price ,  $discounts ,  $discounts_mode ,  $tax ,  $order_by ,  $status    



                
        );
        header("Location: index.php?c=budget_lines&a=details&id=$id");
          
}

$budget_lines = budget_lines_details($id);
    
include view("budget_lines", "index");  
