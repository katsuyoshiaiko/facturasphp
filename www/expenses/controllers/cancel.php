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

if ( expenses_field_id("status" , $id) < 0 ) {
    array_push($error , 'Invoice already cancel') ;
}



if ( ! $error ) {
    $expenses = expenses_details($id) ;
    include view("expenses" , "cancel") ;
} else {
   
    include view("home", "pageError");
}
