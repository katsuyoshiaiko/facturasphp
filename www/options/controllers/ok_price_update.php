<?php

if ( ! permissions_has_permission($u_rol , $c , "update") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false ;
$price = (isset($_POST["price"])) ? clean($_POST["price"]) : false ;

$error = array() ;

################################################################################
if ( ! $id ) {
    array_push($error , "ID Don't send") ;
}
if ( $price == "" ) {
    array_push($error , '$price Don t send') ;
}
################################################################################
if ( ! is_id($id) ) {
    array_push($error , "ID format error") ;
}

// Cambiamos a positivo si es negativo 
$price = abs($price);  
################################################################################

if ( ! $error ) {

    options_price_update($id , $price) ;

    header("Location: index.php?c=options") ;
} else {

    include view("home" , "pageError") ;
}

