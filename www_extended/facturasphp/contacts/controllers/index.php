<?php

if ( ! permissions_has_permission($u_rol , $c , "read") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}


if ( isset($_GET['page']) && ! empty($_GET['page']) ) {
    $page = ( int ) strip_tags($_GET['page']) ;
} else {
    $page = 1 ;
}

// pagination('index.php?c=addresses' , $totalItems , $itemsByPage , $page)

//*****************************************
//$totalItems = count(contacts_list()) ;
$contacts = contacts_list_by_type(0);

$totalItems = count($contacts) ;

$itemsByPage = (_options_option("system_items_limit")) ? _options_option("system_items_limit") : 5 ;

$limit = $itemsByPage ;

switch ( $page ) {
    case 0:
        $start = 0; 
        break ;    
    default:
        $start = ( $page -1 )* $itemsByPage; 
        break ;
}



//---------------------------------------------
$contacts_list = contacts_list_by_type(0, $limit , $start) ;


include view("contacts" , "page_index") ;

if ( $debug ) {

    include view("contacts" , "debug") ;
}
