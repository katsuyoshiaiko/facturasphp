<?php

if ( ! permissions_has_permission($u_rol , $c , "read") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false ;

$error = array() ;

// busco si este presupuesto tiene ya transporte agregado
// lista de codigos de las lineas del budget
$codes_by_lines = budget_lines_list_code_by_budget_id($id); 
$codes_transport = transport_list_code_by_status(1); 
$code_transport_in_budgets = array_intersect($codes_by_lines , $codes_transport) ; 




################################################################################


if ( ! $id ) {
    array_push($error , "ID Don't send") ;
}


################################################################################

if ( ! budgets_is_id($id) ) {
    array_push($error , 'ID format error') ;
}
################################################################################

if ( ! budgets_field_id("*" , $id) ) {
    array_push($error , "id not exist") ;
}



if ( ! $error ) {

    $budgets = budgets_details($id) ;

    // extrae la direccion de facturacion de la sede

    $owner_id = contacts_field_id("owner_id" , budgets_field_id("client_id" , $id)) ;


    $addresses_billing = json_decode($budgets['addresses_billing'] , true) ;

    $addresses_delivery = json_decode($budgets['addresses_delivery'] , true) ;



    

    





    include view("budgets" , "details") ;
} else {

    include view("home" , "pageError") ;
}

