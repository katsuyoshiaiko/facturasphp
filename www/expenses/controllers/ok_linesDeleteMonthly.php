<?php

if ( ! permissions_has_permission($u_rol , $c , "create") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}


$expense_id = (isset($_POST['expense_id']) && $_POST['expense_id'] != "") ? $_POST['expense_id'] : false ;
$budget_id = (isset($_POST['budget_id']) && $_POST['budget_id'] != "") ? $_POST['budget_id'] : false ;
$error = array() ;

################################################################################
if ( ! $budget_id ) {
    array_push($error , '$budgets_id not send') ;
}
if ( ! $expense_id ) {
    array_push($error , '$expense_id not send') ;
}
################################################################################


if ( budgets_field_id("status" , $budget_id) != 30 ) {
    array_push($error , "The budgets sent must have status 30") ;
}

if ( ! $error ) {


    budgets_expenses_delete_by($budget_id , $expense_id) ;
    
    expense_remove_items_by_budget_id($budget_id); 
    
    expenses_update_total_tax($expense_id , expense_lines_totalHTVA($expense_id) , expense_lines_totalTVA($expense_id));


    header("Location: index.php?c=expenses&a=edit&id=$expense_id#items_add") ;
} else {
   
    include view("home", "pageError");
}
