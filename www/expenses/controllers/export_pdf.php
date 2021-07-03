<?php

if ( ! permissions_has_permission($u_rol , $c , "read") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false ;
$type = (isset($_REQUEST["type"])) ? clean($_REQUEST["type"]) : false ;

$error = array() ;

################################################################################

if ( ! $id ) {
    array_push($error , "ID Don't send") ;
}

################################################################################

if ( ! expenses_is_id($id) ) {
    array_push($error , 'ID format error') ;
}
################################################################################

if ( ! expenses_field_id("id" , $id) ) {
    array_push($error , "Invoice id not exist") ;
}




if ( ! $error ) {

    $expense = expenses_details($id) ;

    $addresses_billing = json_decode($expense['addresses_billing'] , true) ;

    $addresses_delivery = json_decode($expense['addresses_delivery'] , true) ;

    switch ( $type ) {
        case "nv":
            include view("expenses" , "export_pdf_noValued") ;
            break ;

        default:
            include view("expenses" , "export_pdf") ;
            break ;
    }
} else {

    include view("home" , "pageError") ;
}
