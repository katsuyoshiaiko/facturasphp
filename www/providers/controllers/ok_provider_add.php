<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

// Agregamos un contacto, 
// Agregamos como proehedor
//

$company_id = (isset($_POST["company_id"])) ? clean($_POST["company_id"]) : false;
$date = (isset($_POST["date"])) ? clean($_POST["date"]) : false;
$discount = (isset($_POST["discount"])) ? clean($_POST["discount"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;




$error = array();




if (!$company_id) {
    array_push($error, '$company_id not send');
}
if (!$date) {
    array_push($error, '$date not send');
}
if (!$discount) {
    array_push($error, '$discount not send');
}
if (!$order_by) {
    array_push($error, '$order_by not send');
}
if (!$status) {
    array_push($error, '$status not send');
}




#************************************************************************
// Busca si uya existe el texto en la BD


if (providers_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = providers_add(
            $company_id, $date, $discount, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php?c=providers&a=details&id=$lastInsertId");
            break;
        case 2:
            header("Location: index.php?c=expenses");
            break;

        default:
            header("Location: index.php?c=providers&a=details&id=$lastInsertId");
            break;
    }
} else {

    array_push($error, "Check your form");
}

