<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$code = (isset($_POST["code"])) ? clean($_POST["code"]) : false;
$name = (isset($_POST["name"])) ? clean($_POST["name"]) : false;
$price = (isset($_POST["price"]) && isset($_POST["price"]) != '' ) ? clean($_POST["price"]) : 0;
$tax = (isset($_POST["tax"])) ? clean($_POST["tax"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : 1;




$error = array();




if (!$code) {
    array_push($error, 'code not send');
}
if (!$name) {
    array_push($error, 'name not send');
}
if (!$price) {
    // array_push($error, '$price not send');
}
if (!$tax) {
    array_push($error, 'tax not send');
}






#************************************************************************


if (transport_search_by_unique("id", "code", $code)) {
    array_push($error, 'code already exists in data base');
}

if (transport_search_by_unique("id", "name", $name)) {
    array_push($error, 'Transport name already exists in data base');
}

#########################################################################
if (!$error) {
    
    transport_add(
            $code, $name, $price, $tax, $order_by, $status
    );




    //header("Location: index.php?c=transport&a=details&id=$lastInsertId");
    header("Location: index.php?c=transport");
} else {

    include view("home", "pageError");
}


