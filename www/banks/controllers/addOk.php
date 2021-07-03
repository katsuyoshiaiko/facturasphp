<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$contact_id = (isset($_POST["contact_id"])) ? clean($_POST["contact_id"]) : false;
$bank = (isset($_POST["bank"])) ? clean($_POST["bank"]) : false;
$account_number = (isset($_POST["account_number"])) ? clean($_POST["account_number"]) : false;
$bic = (isset($_POST["bic"])) ? clean($_POST["bic"]) : false;
$iban = (isset($_POST["iban"])) ? clean($_POST["iban"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$code = uniqid();


$error = array();




if (!$contact_id) {
    array_push($error, '$contact_id not send');
}
if (!$bank) {
    array_push($error, '$bank not send');
}
if (!$account_number) {
    array_push($error, '$account_number not send');
}
if (!$bic) {
    array_push($error, '$bic not send');
}
if (!$iban) {
    array_push($error, '$iban not send');
}
if (!$status) {
    array_push($error, '$status not send');
}




#************************************************************************
// Busca si uya existe el texto en la BD

if (banks_search_by_unique("id", "account_number", $account_number)) {
    array_push($error, 'account_number already exists in data base');
}



if (banks_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    banks_add(
            $contact_id, $bank, $account_number, $bic, $iban, $code, $status
    );


    $lastInsertId = banks_field_code("id", $code);


    switch ($redi) {
        case 1:
            header("Location: index.php?c=banks");

            break;

        default:
            header("Location: index.php?c=banks&a=details&id=$lastInsertId");
            break;
    }
    
    
} else {

    include view("home", "pageError");
}



