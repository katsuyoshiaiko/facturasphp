<?php

if ( ! permissions_has_permission($u_rol , $c , "update") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false ;

$error = array() ;

################################################################################


if ( ! $id ) {
    array_push($error , "ID Don't send") ;
}
################################################################################
################################################################################
################################################################################
// Cuando no se puede editar
// si status registred y viene de una factura no se puede editar
// si estatus returned
// si status canceled
// Si pago total o parcial 

if ( ! credit_notes_is_id($id) ) {
    array_push($error , "ID format error") ;
}

if (credit_notes_field_id("status" , $id) != 10 ) {
    array_push($error , "The status of the credit note does not allow its edition") ;
}

// si esta nota de credito viene de una factura no puede agregar lineas
if ( credit_notes_field_id("invoice_id", $id) ) {
    array_push($error, 'This credit note comes from a cancel invoice, you cannot add items to it');
}




################################################################################
if ( ! $error ) {

    $credit_notes = credit_notes_details($id) ;
    $owner_id = contacts_field_id("owner_id" , credit_notes_field_id("client_id" , $id)) ;
    $addresses_billing = json_decode($credit_notes['addresses_billing'] , true) ;
    $addresses_delivery = json_decode($credit_notes['addresses_delivery'] , true) ;

   
    
    include view("credit_notes" , "edit") ;
} else {

    include view("home" , "pageError") ;
}

