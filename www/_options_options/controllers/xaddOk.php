<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$_tmf_materials_options_id = (isset($_POST["_tmf_materials_options_id"])) ? clean($_POST["_tmf_materials_options_id"]) : false;
$disabled_id = (isset($_POST["disabled_id"])) ? clean($_POST["disabled_id"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;




$error = array();




if (!$_tmf_materials_options_id) {
    array_push($error, '$_tmf_materials_options_id not send');
}
if (!$disabled_id) {
    array_push($error, '$disabled_id not send');
}
if (!$order_by) {
    array_push($error, '$order_by not send');
}
if (!$status) {
    array_push($error, '$status not send');
}




#************************************************************************
// Busca si uya existe el texto en la BD


if (_options_options_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = _options_options_add(
            $_tmf_materials_options_id, $disabled_id, $order_by, $status
    );

    header("Location: index.php?c=_options_options&a=details&id=$lastInsertId");
} else {

    array_push($error, "Check your form");
}

//include "www/_options_options/views/index.php";   
include view("_options_options", "index");
