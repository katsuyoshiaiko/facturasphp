<?php

if (!permissions_has_permission($u_rol, "addresses", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}




//$id = (isset($_POST['id'])) ? clean($_POST['id']) : false;
$contact_id = (isset($_POST['contact_id'])) ? clean($_POST['contact_id']) : false;
$name = (isset($_POST['name'])) ? clean($_POST['name']) : false;
$address = (isset($_POST['address'])) ? clean($_POST['address']) : false;
$number = (isset($_POST['number'])) ? clean($_POST['number']) : false;
$postcode = (isset($_POST['postcode'])) ? clean($_POST['postcode']) : false;
$barrio = (isset($_POST['barrio'])) ? clean($_POST['barrio']) : null;
$city = (isset($_POST['city'])) ? clean($_POST['city']) : false;
$region = (isset($_POST['region'])) ? clean($_POST['region']) : "null";
$country = (isset($_POST['country'])) ? clean($_POST['country']) : false;
$status = (isset($_POST['status'])) ? clean($_POST['status']) : 1;
$redirection = (isset($_POST['redirection'])) ? clean($_POST['redirection']) : false;
$transport_code = (isset($_POST['transport_code'])) ? clean($_POST['transport_code']) : false;
$invoice_id = (isset($_POST['invoice_id'])) ? clean($_POST['invoice_id']) : false;
$redi = (isset($_POST['redi'])) ? clean($_POST['redi']) : false;

$code = uniqid();
$error = array();


################################################################################


if (!$contact_id) {
    array_push($error, "contact_id not send");
}
if (!$name) {
    array_push($error, "name not send");
}




################################################################################

if (!$error) {

    addresses_add(
            $contact_id, $name, $address, $number, $postcode, $barrio, $city, $region, $country, $code, $status
    );

    $addresses_id = addresses_field_code("id", $code);

    if($transport_code) {
        addresses_transport_add($addresses_id, $transport_code);
    }

    
    
    
    
    
    
    
    
    
    switch ($redi) {
        case 1: // viene de una solicitud de agregar una address desde un invoice
//
//            // saco la direccion de facturacion de este contacto 
//            $actual_address_billing = (addresses_billing_by_contact_id($contact_id)); 
//            $actual_address_billing_json = json_encode($actual_address_billing); 
//            
//            
//            
//            // si hay direccion de facturacion 
//            // la pongo coom direccion de delivery 
//            // y pongo esta nueva direccion coo direccion de facturacion
//            // actualizo la factura con la nueva direccion de facturacion 
//            
//            if($new_address_billing_json){
//                
//                
//            }
//            
//            
//            invoices_update_billing_address($invoice_id, $new_address_billing_json);                         
//            
            header("Location: index.php?c=invoices&a=edit&id=$invoice_id");
            break;

        default:
            header("Location: index.php?c=contacts&a=addresses&id=$contact_id");
            break;
    }

    
    
    
} else {

    include view("home", "pageError");
}



