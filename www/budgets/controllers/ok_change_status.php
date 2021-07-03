<?php

if ( ! permissions_has_permission($u_rol , $c , "read") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false ;

$error = array() ;

###############################################################################
# V e r i f i c a c i o n 

if ( ! $id ) {
    array_push($error , "ID Don't send") ;
}

###############################################################################
# Variables obligatoias
###############################################################################
if ( ! budgets_is_id($id) ) {
    array_push($error , 'ID format error') ;
}
###############################################################################
# Transformacion
#
###############################################################################
# error si: 
# el id no existe
if ( ! budgets_field_id("id" , $id) ) {
    array_push($error , 'Budget id does not exist in the database') ;
}

# 30 // aceptado por cliente 
if ( budgets_field_id("status" , $id) == 30 ) {
  //  array_push($error , 'The budget has already been accepted by the client') ;
}
# 40 // rechazado por cliente 
if ( budgets_field_id("status" , $id) == 40 ) {
    array_push($error , 'The budget has already been registered as rejected') ;
}
# -10 si ya esta anulado 
if ( budgets_field_id("status" , $id) == -10 ) {
    array_push($error , 'The budget has already been canceled') ;
}
# viene de un ORDER 
if ( orders_budgets_search_order_by_budget($id) ) {
  //  array_push($error , 'This budget comes from an order, it cannot be canceled') ;
}
######################################################################### 






if ( ! $error ) {

    // cambio a anulado 
    budgets_change_status_to($id , 10); 
    
    header("Location: index.php?c=budgets&a=details&id=$id");
    
    
} else {
    include view("home" , "pageError") ;
}    