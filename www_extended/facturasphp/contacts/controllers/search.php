<?php

if ( ! permissions_has_permission($u_rol , $c , "read") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

$contacts_list = null ;

$txt = (isset($_GET['txt'])) ? clean($_GET['txt']) : false ;
$where = (isset($_GET['w'])) ? clean($_GET['w']) : false ;



//$error = array();
################################################################################
/*
  if (!$txt) {
  array_push($error, "What you looking for?");
  } */
################################################################################



switch ( $where ) {
    case "type":
        $type = (isset($_GET['type'])) ? clean($_GET['type']) : false ;
        $contacts_list = contacts_search_by_type($type) ;
        break ;

    case "owner_id":
        $id = (isset($_GET['id'])) ? clean($_GET['id']) : false ;
        $contacts_list = contacts_list_by_owner_id($id) ;
        break ;

    case "like_owner":
        $id = (isset($_GET['id'])) ? clean($_GET['id']) : false ;
        $contacts_list = contacts_search_by_company_and_name_lastname_birthdate($id) ;
        break ;

    case "bloqued":
        //$type = (isset($_GET['type'])) ? clean($_GET['type']) : false;
        $contacts_list = contacts_search_bloqued() ;
        break ;


    default:
        $contacts_list = contacts_search($txt) ;
        break ;
}



if ( count($contacts_list) == 1 ) {
    $id = $contacts_list[0]['id'] ;
    header("Location: index.php?c=contacts&a=details&id=$id") ;
    
} else {
    include view("contacts" , "page_index") ;
}

