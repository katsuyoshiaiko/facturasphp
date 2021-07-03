<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("home", "disabled");
die(); 


$owner_id = (isset($_POST["owner_id"])) ? clean($_POST["owner_id"]) : false;
$type = (isset($_POST["type"])) ? clean($_POST["type"]) : false;
$title = ($_POST["title"] != '') ? clean($_POST["title"]) : null;
$name = (isset($_POST["name"])) ? clean($_POST["name"]) : false;
$lastname = (isset($_POST["lastname"])) ? clean($_POST["lastname"]) : false;
$birthdate = (isset($_POST["birthdate"])) ? clean($_POST["birthdate"]) : false;
$tva = (isset($_POST["tva"])) ? clean($_POST["tva"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;




$error = array();




if (!$owner_id) {
    array_push($error, '$owner_id not send');
}
if (!$type) {
    array_push($error, '$type not send');
}
if (!$title) {
    array_push($error, '$title not send');
}
if (!$name) {
    array_push($error, '$name not send');
}
if (!$lastname) {
    array_push($error, '$lastname not send');
}
if (!$birthdate) {
    array_push($error, '$birthdate not send');
}
if (!$tva) {
    array_push($error, '$tva not send');
}
if (!$order_by) {
    array_push($error, '$order_by not send');
}
if (!$status) {
    array_push($error, '$status not send');
}




#************************************************************************
// Busca si uya existe el texto en la BD


if (contacts_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = contacts_add(
            $owner_id, $type, $title, $name, $lastname, $birthdate, $tva, $order_by, $status
    );

    header("Location: index.php?c=contacts&a=details&id=$lastInsertId");
} else {

    array_push($error, "Check your form");
}

//include "www/contacts/views/index.php";   
include view("contacts", "index");
