<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
//$code = (isset($_POST["code"])) ? clean($_POST["code"]) : false;
$code = transport_field_id('code', $id); 
//
$name = (isset($_POST["name"])) ? clean($_POST["name"]) : false;
$price = (isset($_POST["price"]) && isset($_POST["price"]) != '' ) ? clean($_POST["price"]) : 0;
$tax = (isset($_POST["tax"])) ? clean($_POST["tax"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : 1;




$error = array();
//
################################################################################
//
if (!$id) {
    array_push($error, "ID Don't send");
}
//
if (!$code) {
    array_push($error, "Code Don't send");
}
//
if (!$name) {
    array_push($error, "$name Don't send");
}
//
################################################################################

if (!transport_is_id($id)) {
    array_push($error, "ID format error");
}

if(transport_field_code('code', $code)){
//    array_push($error, 'Code already exist');
}


//
################################################################################
if (!$error) {

    transport_edit(
            $id, $code, $name, $price, $tax, $order_by, $status
    );
    header("Location: index.php?c=transport&a=details&id=$id");
} else {
    
    include view("transport", "index");
}
