<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

//vardump($_POST); 
//die(); 

$expense_id =   (isset($_POST["expense_id"])) ? clean($_POST["expense_id"]) : false;
$quantity =     (($_POST["quantity"])       != "") ? clean($_POST["quantity"]) : 1;
$description =  (($_POST["description"])    != "") ? clean($_POST["description"]) : 'Item';
$price =        (isset($_POST["price"])) ? clean($_POST["price"]) : 0.0;
$discounts =    (isset($_POST["discounts"])) ? clean($_POST["discounts"]) : 0;
$tax =          (isset($_POST["tax"])) ? clean($_POST["tax"]) : null;
$order_by =     (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : 1;
$status =       (isset($_POST["status"])) ? clean($_POST["status"]) : null;




$error = array();




if (!$expense_id) {
    array_push($error, '$expense_id not send');
}
if (!$quantity) {
    array_push($error, '$quantity- not send');
}
if (!$description) {
    array_push($error, '$description not send');
}
if (!$price) {
    //array_push($error, '$price not send');
}
if (!$discounts) {
    // array_push($error, '$discounts not send');
}
if (!$tax) {
    //array_push($error, '$tax not send');
}
if (!$order_by) {
    array_push($error, '$order_by not send');
}
if (!$status) {
    array_push($error, '$status not send');
}




#************************************************************************
// Busca si uya existe el texto en la BD

if (expense_lines_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    expense_lines_add(
            $expense_id, $quantity, $description, $price, $discounts, $tax, $order_by, $status
    );

    header("Location: index.php?c=expense&a=edit&id=$expense_id");
} else {

    array_push($error, "Check your form");
}

//include "www/expense_lines/views/index.php";   
include view("expense_lines", "index");
