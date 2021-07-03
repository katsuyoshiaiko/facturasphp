<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$client_id = (isset($_POST["client_id"])) ? clean($_POST["client_id"]) : false;
$expense_id = null; 
$invoice_id = (isset($_POST["invoice_id"])) ? clean($_POST["invoice_id"]) : false;
$credit_note_id = (isset($_POST["credit_note_id"])) ? clean($_POST["credit_note_id"]) : false;
$type = (isset($_POST["type"])) ? clean($_POST["type"]) : false;
$account_number = (isset($_POST["account_number"])) ? clean($_POST["account_number"]) : false;
$sub_total = (isset($_POST["sub_total"])) ? clean($_POST["sub_total"]) : false;
$tax = (isset($_POST["tax"])) ? clean($_POST["tax"]) : false;
$total = (isset($_POST["total"])) ? clean($_POST["total"]) : false;
$ref = (isset($_POST["ref"])) ? clean($_POST["ref"]) : false;
$description = (isset($_POST["description"])) ? clean($_POST["description"]) : false;
$ce = (isset($_POST["ce"])) ? clean($_POST["ce"]) : false;
$date = (isset($_POST["date"])) ? clean($_POST["date"]) : false;
$date_registre = (isset($_POST["date_registre"])) ? clean($_POST["date_registre"]) : false;
$code = (isset($_POST["code"])) ? clean($_POST["code"]) : false;
$canceled = (isset($_POST["canceled"])) ? clean($_POST["canceled"]) : false;
$canceled_code = (isset($_POST["canceled_code"])) ? clean($_POST["canceled_code"]) : false;
  



$error = array();




if (!$client_id) {
    array_push($error, '$client_id not send');
}
if (!$invoice_id) {
    array_push($error, '$invoice_id not send');
}
if (!$credit_note_id) {
    array_push($error, '$credit_note_id not send');
}
if (!$type) {
    array_push($error, '$type not send');
}
if (!$account_number) {
    array_push($error, '$account_number not send');
}
if (!$sub_total) {
    array_push($error, '$sub_total not send');
}
if (!$tax) {
    array_push($error, '$tax not send');
}
if (!$total) {
    array_push($error, '$total not send');
}
if (!$ref) {
    array_push($error, '$ref not send');
}
if (!$description) {
    array_push($error, '$description not send');
}
if (!$ce) {
    array_push($error, '$ce not send');
}
if (!$date) {
    array_push($error, '$date not send');
}
if (!$date_registre) {
    array_push($error, '$date_registre not send');
}
if (!$code) {
    array_push($error, '$code not send');
}
if (!$canceled) {
    array_push($error, '$canceled not send');
}
if (!$canceled_code) {
    array_push($error, '$canceled_code not send');
}
  
                


#************************************************************************
// Busca si uya existe el texto en la BD
  

if( balance_search($canceled_code)){
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = balance_add(
            
            
$client_id , $expense_id,  $invoice_id ,  $credit_note_id ,  $type ,  $account_number ,  $sub_total ,  $tax ,  $total ,  $ref ,  $description ,  $ce ,  $date ,  $date_registre ,  $code ,  $canceled ,  $canceled_code    


    );
              
    header("Location: index.php?c=balance&a=details&id=$lastInsertId");

    
} else {

    array_push($error, "Check your form");
}

//include "www/balance/views/index.php";   
include view("balance", "index");  
