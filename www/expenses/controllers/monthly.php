<?php

if ( ! permissions_has_permission($u_rol , $c , "read") ) {
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

if ( ! expenses_is_id($id) ) {
    array_push($error , 'ID format error') ;
}
################################################################################

if ( ! expenses_field_id("*" , $id) ) {
    array_push($error , "id not exist") ;
}



if ( ! $error ) {

    $expenses = expenses_details($id) ;

    $addresses_billing = json_decode($expenses['addresses_billing'] , true) ;

    $addresses_delivery = json_decode($expenses['addresses_delivery'] , true) ;

    include view("expenses" , "monthly") ;
} else {
   
    include view("home", "pageError");
}

