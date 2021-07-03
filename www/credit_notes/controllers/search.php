<?php

if ( ! permissions_has_permission($u_rol , $c , "read") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}
$credit_notes = null ;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false ;
$error = array() ;

//vardump($_REQUEST);
//die(); 

################################################################################
################################################################################
switch ( $w ) {
    case "id":
        $id = (isset($_GET["id"])) ? clean($_GET["id"]) : false ;
        $credit_notes = credit_notes_search_by_id($id) ;
        break ;
    case "byStatus":
        $status = (($_GET["status"]) != "") ? clean($_GET["status"]) : false ;
        $credit_notes = credit_notes_search_by_status($status) ;
        break ;

    case "byClient":        
        $client_id = (($_GET["client_id"]) != "") ? clean($_GET["client_id"]) : false ;        
        $status = (($_GET["status"]) != "") ? clean($_GET["status"]) : "all" ;          
        $year = (($_GET["year"]) != "") ? clean($_GET["year"]) : date("Y") ;          
        $month = (($_GET["month"]) != "") ? clean($_GET["month"]) : date("n") ;                  
        // No facturadas
        $unbilled = (isset($_GET["unbilled"]) && $_GET["unbilled"]  == "on") ? true : false ;  
        
        
        
        $credit_notes = credit_notes_search_advanced($client_id , $status , $year , $month , $unbilled); 
        break ;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false ;
        $credit_notes = credit_notes_search($txt) ;
        break ;
}


include view("credit_notes" , "search") ;
 
// 
//if( $w ){
//    include view("credit_notes" , "index") ;
//}else{
//    include view("credit_notes" , "search") ;    
//}

