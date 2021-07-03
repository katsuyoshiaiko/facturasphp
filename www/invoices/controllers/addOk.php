<?php
/*
if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$budget_id = (isset($_POST["budget_id"])) ? clean($_POST["budget_id"]) : false;
$credit_note_id = (isset($_POST["credit_note_id"])) ? clean($_POST["credit_note_id"]) : false;
$client_id = (isset($_POST["client_id"])) ? clean($_POST["client_id"]) : false;
$seller_id = (isset($_POST["seller_id"])) ? clean($_POST["seller_id"]) : false;
$date = (isset($_POST["date"])) ? clean($_POST["date"]) : false;
$date_registre = (isset($_POST["date_registre"])) ? clean($_POST["date_registre"]) : false;
$total = (isset($_POST["total"])) ? clean($_POST["total"]) : false;
$tax = (isset($_POST["tax"])) ? clean($_POST["tax"]) : false;
$advance = (isset($_POST["advance"])) ? clean($_POST["advance"]) : false;
$balance = (isset($_POST["balance"])) ? clean($_POST["balance"]) : false;
$comments = (isset($_POST["comments"])) ? clean($_POST["comments"]) : false;
$comments_private = (isset($_POST["comments_private"])) ? clean($_POST["comments_private"]) : false;
$r1 = (isset($_POST["r1"])) ? clean($_POST["r1"]) : false;
$r2 = (isset($_POST["r2"])) ? clean($_POST["r2"]) : false;
$r3 = (isset($_POST["r3"])) ? clean($_POST["r3"]) : false;
$fc = (isset($_POST["fc"])) ? clean($_POST["fc"]) : false;
$date_update = (isset($_POST["date_update"])) ? clean($_POST["date_update"]) : false;
$days = (isset($_POST["days"])) ? clean($_POST["days"]) : false;
$ce = (isset($_POST["ce"])) ? clean($_POST["ce"]) : false;
$key = (isset($_POST["key"])) ? clean($_POST["key"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;




$error = array();




if (!$budget_id) {
    array_push($error, '$budget_id not send');
}
if (!$credit_note_id) {
    array_push($error, '$credit_note_id not send');
}
if (!$client_id) {
    array_push($error, '$client_id not send');
}
if (!$seller_id) {
    array_push($error, '$seller_id not send');
}
if (!$date) {
    array_push($error, '$date not send');
}
if (!$date_registre) {
    array_push($error, '$date_registre not send');
}
if (!$total) {
    array_push($error, '$total not send');
}
if (!$tax) {
    array_push($error, '$tax not send');
}
if (!$advance) {
    array_push($error, '$advance not send');
}
if (!$balance) {
    array_push($error, '$balance not send');
}
if (!$comments) {
    array_push($error, '$comments not send');
}
if (!$comments_private) {
    array_push($error, '$comments_private not send');
}
if (!$r1) {
    array_push($error, '$r1 not send');
}
if (!$r2) {
    array_push($error, '$r2 not send');
}
if (!$r3) {
    array_push($error, '$r3 not send');
}
if (!$fc) {
    array_push($error, '$fc not send');
}
if (!$date_update) {
    array_push($error, '$date_update not send');
}
if (!$days) {
    array_push($error, '$days not send');
}
if (!$ce) {
    array_push($error, '$ce not send');
}
if (!$key) {
    array_push($error, '$key not send');
}
if (!$status) {
    array_push($error, '$status not send');
}




#************************************************************************
// Busca si uya existe el texto en la BD


if (invoices_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = invoices_add(
            $budget_id, $credit_note_id, $client_id, $seller_id, $date, $date_registre, $total, $tax, $advance, $balance, $comments, $comments_private, $r1, $r2, $r3, $fc, $date_update, $days, $ce, $key, $status
    );

    header("Location: index.php?c=invoices&a=details&id=$lastInsertId");
} else {

    array_push($error, "Check your form");
}

//include "www/invoices/views/index.php";   
include view("invoices", "index");
*/