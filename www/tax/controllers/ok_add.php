<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$name = (isset($_POST["name"])) ? clean($_POST["name"]) : false;
$value = (isset($_POST["value"])) ? clean($_POST["value"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;




$error = array();




if (!$name) {
    array_push($error, '$name not send');
}
if (!$value) {
    array_push($error, '$value not send');
}
if (!$order_by) {
    array_push($error, '$order_by not send');
}
if (!$status) {
    array_push($error, '$status not send');
}




#************************************************************************
// Busca si uya existe el texto en la BD

if (tax_search_by_unique("id", "value", $value)) {
    array_push($error, 'value already exists in data base');
}



if (tax_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = tax_add(
            $name, $value, $order_by, $status
    );

    header("Location: index.php?c=tax");
} else {

    include view("home", "pageError");
}


