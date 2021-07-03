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



if ( ! $error ) {

//    $expense = expenses_details($id) ;
//    
//    $lineas = expense_lines_list_by_expense_id($id) ;
//    
//    array_push($expense["Version"], "2020"); 
//    
//    
//    array_push($expense , 
//            array(
//                    "version"=>"001",
//                    "generator"=>"Coello.be",
//                )
//            ) ;
//    
//    array_push($expense , expense_lines_list_by_expense_id($id)) ;
//    
//    
//    $all = array_merge($expense, $lineas); 
    
    
    
    
    


    include view("expenses" , "export") ;
} else {

    include view("home" , "pageError") ;
}
