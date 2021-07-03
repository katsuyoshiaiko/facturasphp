<?php

if ( ! permissions_has_permission($u_rol , $c , "read") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}
$budgets = null ;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false ;
$error = array() ;

//vardump($_REQUEST);
//die(); 

################################################################################
################################################################################
switch ( $w ) {
    case "id":
        $id = (isset($_GET["id"])) ? clean($_GET["id"]) : false ;
        $budgets = budgets_search_by_id($id) ;
        break ;
    case "byCode":
        $code = (($_GET["code"]) != "") ? clean($_GET["code"]) : false ;
        $budgets = budgets_search_by_code($code) ;
        break ;

    case "byClient":        
        $client_id = (($_GET["client_id"]) != "") ? clean($_GET["client_id"]) : false ;        
        $status = (($_GET["status"]) != "") ? clean($_GET["status"]) : "all" ;          
        $year = (($_GET["year"]) != "") ? clean($_GET["year"]) : date("Y") ;          
        $month = (($_GET["month"]) != "") ? clean($_GET["month"]) : date("n") ;                  
        // No facturadas
        $unbilled = (isset($_GET["unbilled"]) && $_GET["unbilled"]  == "on") ? true : false ;  
        
        
//
//        if ( $status == "all" ) {
//            $budgets = budgets_search_by_client($client_id) ;
//        } else {
//            $budgets = budgets_search_by_client_status($client_id , $status) ;
//        }
//        
//        vardump($unbilled); 
//        
//        vardump(array($client_id , $status , $year , $month , $unbilled)); 
        
        
        $budgets = budgets_search_advanced($client_id , $status , $year , $month , $unbilled); 
        break ;
        
        
    case "byAll":        
        $client_id = (($_GET["client_id"]) != "") ? clean($_GET["client_id"]) : false ;        
        $status = (($_GET["status"]) != "") ? clean($_GET["status"]) : "all" ;          
        $year = (($_GET["year"]) != "") ? clean($_GET["year"]) : date("Y") ;          
        $month = (($_GET["month"]) != "") ? clean($_GET["month"]) : date("n") ;                         
        $budgets = budgets_search_by_all($client_id , $status , $year , $month); 
        
//        vardump($client_id);
//        vardump($status);
//        vardump($year);
//        vardump($month);
        
        break ;        
        
        

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false ;
        $budgets = budgets_search($txt) ;
        break ;
}

 include view("budgets" , "search") ;
 
// 
//if( $w ){
//    include view("budgets" , "index") ;
//}else{
//    include view("budgets" , "search") ;    
//}

