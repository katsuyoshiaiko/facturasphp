<?php

if ( ! permissions_has_permission($u_rol , $c , "read") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

$error = array() ;

$contact = null ;

$contact = contacts_details($id) ;

include view("contacts" , "export_pdf") ;


