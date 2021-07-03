<?php

if ( ! permissions_has_permission($u_rol , $c , "read") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}
$addresses = null ;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false ;
$error = array() ;

################################################################################
################################################################################
switch ( $w ) {
    case "id":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false ;
        $addresses = addresses_search_by_id($txt) ;
        break ;

    case "by_contact_id":
        $contact_id = (isset($_GET["contact_id"])) ? clean($_GET["contact_id"]) : false ;

        $addresses = addresses_search_by_contact_id($contact_id) ;

        break ;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false ;
        $addresses = addresses_search($txt) ;
        break ;
}


//include "www/addresses/views/index.php";
include view("addresses" , "index") ;
