<?php

if ( ! permissions_has_permission($u_rol , $c , "read") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false ;
$e = (isset($_REQUEST['e'])) ? clean($_REQUEST['e']) : false ;

$error = array() ;


if ( ! $id ) {
    array_push($error , 'id dont send') ;
}

if ( ! is_id($id) ) {
    array_push($error , 'id format error send') ;
}



if ( $e ) {
    array_push($error , "$e") ;
}

$offices = contacts_offices_list_by_contact($id) ;





if ( ! $offices ) {
   // array_push($error , 'offices not exist') ;
}


if ( ! $error ) {

    include view("contacts" , "page_offices") ;
    
} else{
    include view("home" , "pageError") ;
}




