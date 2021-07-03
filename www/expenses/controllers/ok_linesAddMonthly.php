<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$expense_id = (isset($_POST["expense_id"])) ? clean($_POST["expense_id"]) : false;
$client_id = expenses_field_id("client_id", $expense_id); // id a quien se le factura 
$budgets_ids = (isset($_POST['id']) && $_POST['id'] !="")? $_POST['id']: false; 
$type = "M"; // Mensual M
$error = array();

################################################################################
if (!$expense_id) {
    array_push($error, '$expense_id not send');
}
if (!$expense_id) {
    array_push($error, '$expense_id not send');
}
################################################################################
# 
# cuento los ids
# bucle
# debe



foreach ($budgets_ids as $budget_id) {
    
    if(budgets_field_id("status", $budget_id) !=30 ){
         
        array_push($error, "The budgets sent must have status 30");                
    }
    
    if( offices_headoffice_of_office(budgets_field_id("client_id", $budget_id)) != $client_id ){
        array_push($error, "All budgets must have the same client id");                
    }
        
    if( budgets_expenses_search_expense_by_budget_id($budget_id) ){
        array_push($error, "There is one or more budget already expensed");
    }

}



if ( !$error ) {
    
    // hago una bucle para agregar el budget a la tabla 
    
    $total = 0; 
    $tax = 0; 
    
    
    foreach ($budgets_ids as $budget_id) {
        
        // $budget_id, $expense_id, $date_registre, $order_by, $status
        budgets_expenses_add($budget_id, $expense_id, null, 1, 1);     
        
        $total  = $total + budgets_field_id("total", $budget_id); 
        $tax    = $tax + budgets_field_id("tax", $budget_id); 
        
        expenses_update_total_tax($expense_id, $total, $tax);    
        
        // copiar los items del devis a la factura 
        budgets_copy_items_to_expense_items($budget_id, $expense_id); 
        
        
    }
    
    expenses_update_type($expense_id, $type); // Normal o ensual
    
    // Actualiza los totales de la factura
    expenses_update_total_tax($expense_id , expense_lines_totalHTVA($expense_id) , expense_lines_totalTVA($expense_id));
    


    
   header("Location: index.php?c=expenses&a=edit&id=$expense_id#items_add");
   
} else {   
   
    include view("home", "pageError");
}
