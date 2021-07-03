<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$client_id = (isset($_POST["client_id"])) ? clean($_POST["client_id"]) : false;
$invoice_id = (isset($_POST["invoice_id"])) ? clean($_POST["invoice_id"]) : null;
$date_registre = (isset($_POST["date_registre"])) ? clean($_POST["date_registre"]) : null;
$total = (!empty($_POST["total"])) ? clean($_POST["total"]) : 0;
$tax = (isset($_POST["tax"])) ? clean($_POST["tax"]) : 0;
$comments = (isset($_POST["comments"])) ? clean($_POST["comments"]) : null;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : 10;

$headoffice_id = offices_headoffice_of_office($client_id) ; 


$addresses_billing = json_encode(addresses_billing_by_contact_id($headoffice_id)); // la sede
$addresses_delivery = json_encode(addresses_delivery_by_contact_id($client_id));
//$addresses_delivery = $addresses_billing; 
$returned = null;
$code = uniqid();
$error = array();


################################################################################

if (!$client_id) {
    array_push($error, '$client_id not send');
}
if (!$invoice_id) {
    // array_push($error, '$invoice_id not send');
}
if (!$date_registre) {
    //  array_push($error, '$date_registre not send');
}
if (!$total) {
    // array_push($error , '$total not send') ;
}
if (!$tax) {
    //  array_push($error, '$tax not send');
}
if (!$comments) {
    //  array_push($error, '$comments not send');
}
if (!$status) {
    array_push($error, '$status not send');
}

################################################################################



if (!$error) {

    //credit_notes_add($client_id , $invoice_id , $date_registre , $total , $tax , $comments , $code , $status) ;

    credit_notes_add(
            $headoffice_id, $invoice_id, $addresses_billing, $addresses_delivery, $date_registre, $total, $tax, $returned, $comments, $code, $status
    );

    $lastInsertId = credit_notes_field_code('id', $code);





    //credit_note_lines_add($lastInsertId , $quantity , $description , $value , $tax); 

    credit_note_lines_add($lastInsertId, 1, $comments, $total, $tax);



    header("Location: index.php?c=credit_notes&a=edit&id=$lastInsertId");
} else {

    array_push($error, "Check your form");
}


include view("home", "pageError");
