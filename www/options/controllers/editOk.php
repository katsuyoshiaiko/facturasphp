<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$option = (isset($_POST["option"])) ? clean($_POST["option"]) : false;
$price = (isset($_POST["price"])) ? clean($_POST["price"]) : false;
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

if (! options_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (! $error ) {
    
    options_edit(
        


        $id ,  $option ,  $price ,  $tax ,  $order_by ,  $status    



                
        );
        header("Location: index.php?c=options&a=details&id=$id");
          
}

$options = options_details($id);
    
include view("options", "index");  
