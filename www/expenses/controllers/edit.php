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
if ( expenses_field_id("budget_id" , $id) ) {
    array_push($error , "You cannot edit an expense that comes from a budget") ;
    array_push($error , "If you really want to edit this expense, you must remove the budget number from the expense") ;
}
################################################################################
################################################################################

if ( $a != "edit" ) {
    array_push($error , "Action format error") ;
}
if ( ! expenses_is_id($id) ) {
    array_push($error , "ID format error") ;
}

################################################################################
if ( ! $error ) {
    
    $expenses = expenses_details($id) ;

    $addresses_billing = json_decode($expenses['addresses_billing'] , true) ;

    $addresses_delivery = json_decode($expenses['addresses_delivery'] , true) ;

    include view("expenses" , "edit") ;
     
    
    
} else {
   
    include view("home", "pageError");
}
