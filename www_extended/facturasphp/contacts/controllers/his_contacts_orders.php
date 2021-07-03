<?php

if ( ! permissions_has_permission($u_rol , "orders" , "read") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

$id = (isset($_REQUEST['id_contact'])) ? clean($_REQUEST['id_contact']) : false ;
$error = array() ;


if ( ! $id ) {
    array_push($error , 'id dont send') ;
}

if ( ! is_id($id) ) {
    array_push($error , 'id format error send') ;
}

if ( ! $error ) {
    
    $contact = contacts_details($id) ;

    include view("contacts" , "his_contacts_orders") ;
} else{
    include view("home" , "pageError") ;
}
