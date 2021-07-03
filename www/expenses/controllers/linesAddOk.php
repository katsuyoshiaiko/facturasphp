<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
//vardump($_POST); 
//die(); 
$expense_id = (isset($_POST["expense_id"])) ? clean($_POST["expense_id"]) : false;
$code = (isset($_POST["code"])) ? clean($_POST["code"]) : null;
$quantity = (($_POST["quantity"]) != "") ? clean($_POST["quantity"]) : 1;
$description = (($_POST["description"]) != "") ? clean($_POST["description"]) : 'Item';
$price = (($_POST["price"]) != '') ? clean($_POST["price"]) : 0.0;
$discounts = (($_POST["discounts"]) != "" ) ? clean($_POST["discounts"]) : 0;
$discounts_mode = (($_POST["discounts_mode"]) != "" ) ? clean($_POST["discounts_mode"]) : null;
$tax = (isset($_POST["tax"]) ) ? clean($_POST["tax"]) : null;
$order_by = (isset($_POST["order_by"]) ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) ) ? clean($_POST["status"]) : null;




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
#************************************************************************
# PROCESO
# si hay descuento, el descuento mode hay 
//$discounts_mode = ( $discounts > 0)? $discounts_mode : null;  

#************************************************************************
// Busca si uya existe el texto en la BD

if (expense_lines_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    expense_lines_add(
            $expense_id, $code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status
    );


//    vardump(expense_lines_totalHTVA($expense_id)); 
//    vardump(expense_lines_totalTVA($expense_id)); 
//    die(); 
    // Esto me actualiza los totales en la factura
    expenses_update_total_tax($expense_id, expense_lines_totalHTVA($expense_id), expense_lines_totalTVA($expense_id));
   
    




    header("Location: index.php?c=expenses&a=edit&id=$expense_id#items_add");
} else {
   
    include view("home", "pageError");
}
