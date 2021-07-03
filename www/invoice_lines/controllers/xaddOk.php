<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$invoice_id = (isset($_POST["invoice_id"])) ? clean($_POST["invoice_id"]) : false;
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




if (!$invoice_id) {
    array_push($error, '$invoice_id not send');
}
if (!$code) {
    array_push($error, '$code not send');
}
if (!$quantity) {
    array_push($error, '$quantity not send');
}
if (!$description) {
    array_push($error, '$description not send');
}
if (!$price) {
    array_push($error, '$price not send');
}
if (!$discounts) {
    array_push($error, '$discounts not send');
}
if (!$discounts_mode) {
    array_push($error, '$discounts_mode not send');
}
if (!$tax) {
    array_push($error, '$tax not send');
}
if (!$order_by) {
    array_push($error, '$order_by not send');
}
if (!$status) {
    array_push($error, '$status not send');
}
  
                


#************************************************************************
// Busca si uya existe el texto en la BD
  

if( invoice_lines_search($status)){
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = invoice_lines_add(
            
            
$invoice_id ,  $code ,  $quantity ,  $description ,  $price ,  $discounts ,  $discounts_mode ,  $tax ,  $order_by ,  $status    


    );
              
    header("Location: index.php?c=invoice_lines&a=details&id=$lastInsertId");

    
} else {

    array_push($error, "Check your form");
}

//include "www/invoice_lines/views/index.php";   
include view("invoice_lines", "index");  
