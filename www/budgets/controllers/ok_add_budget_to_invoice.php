<?php

if ( ! permissions_has_permission($u_rol , $c , "update") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

/**
 * Add budget to Mensual invoice
 *      el presupuesto debe tener el estatus correcto, 
 *      debe tener el headoffice el mismo que el de la factura 
 *      no debe estar en la tabla budgets_invoices
 *      
 *      La factura debe existir, 
 *      debe tener un client_id == al headoffice del presupuesto 
 *      estatus registrada
 *      
 */
$budget_id = (isset($_POST['budget_id']) && $_POST['budget_id'] != "" ) ? clean($_POST['budget_id']) : false ;
$invoice_id = (isset($_POST['invoice_id']) && $_POST['invoice_id'] != "" ) ? clean($_POST['invoice_id']) : false ;

$error = array() ;

################################################################################
if ( ! $budget_id ) {
    array_push($error , '$budget_id not send') ;
}
if ( ! $invoice_id ) {
    array_push($error , '$invoice_id not send') ;
}
if ( ! is_id($budget_id) ) {
    array_push($error , '$budget_id format error') ;
}
if ( ! is_id($invoice_id) ) {
    array_push($error , '$invoice_id format error') ;
}
################################################################################
if ( budgets_field_id("status" , $budget_id) !== 30 ) {
  //  array_push($error , 'The budget must be in status') ;
  //  array_push($error , budget_status_by_status(30)) ;
}



// verifico que el presupuesto y la factura sean de la misma empresa
if ( offices_headoffice_of_office(budgets_field_id("client_id" , $budget_id)) != offices_headoffice_of_office(invoices_field_id("client_id" , $invoice_id)) ) {
    array_push($error , 'The budget headoffice is not the same as the invoice headoffice') ;
}


// no debe estar en la tabla budgets_invoices
if (budgets_invoices_search_budgets_id_invoice_id($budget_id, $invoice_id) ) {
    array_push($error , 'The budget is already in table budgets_invoices') ;
}

//------------------------------------------------------------------------------
// Si la factura no existe
if ( ! invoices_field_id("id" , $invoice_id) ) {
    array_push($error , 'The invoice does not exist') ;
}

// solo facturas en status (registred) son aceptadas
if ( invoices_field_id("status" , $invoice_id) != 10 ) {
    array_push($error , 'Only invoices with status '. invoice_status_by_status(10) . ' are accepted') ;
    
}

if ( invoices_field_id("type" , $invoice_id) !== "M" ) {
    array_push($error , 'Only invoices type M are accepted') ;    
}

################################################################################
if ( ! $error ) {
    /**
     * copiar los items del presupuesto a los items de la factura, 
     * actualizar el total de la factura 
     * cambiar status de budget
     * registrar en la tabla budgets_invoices
     */
    
    // agrego una linea a la factura
    
    
    invoice_lines_add_with_budget_id($invoice_id , $budget_id , "BUDGET" , 1 , "Budget $budget_id" , 0 , 0 , '%' , 0 , 1 , 1); 
    //invoice_lines_add($invoice_id , null , 1 , "Budget $budget_id " , 0 , 0 , '%' , 0 , 1 , 1); 
        
    // copio los item del budget a la factura
    budgets_copy_items_to_invoice_items($budget_id , $invoice_id); 
    
    // recalcula el total de los items de esa factura y los actualiza en la DB    
    invoices_update_total_tax($invoice_id , invoice_lines_totalHTVA($invoice_id) , invoice_lines_totalTVA($invoice_id)) ;
    
    // cambio de status el budgets
    budgets_change_status_to($budget_id , 30); 
    
    // registro en la tabla budgets_invoices
    budgets_invoices_add($budget_id , $invoice_id , null , 1 , 1); 
    

    
    
    
    
    
    ############################################################################
    ############################################################################
    ############################################################################
    $level = null ;
    $date = null ;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null ;
    $description = "Add budget [$budget_id] to invoice [$invoice_id]";
    $doc_id = $budget_id ;
    $crud = "update" ;
    $error = null ;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null ;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null ;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null ;
    $ip4 = get_user_ip() ;
    $ip6 = get_user_ip6() ;
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php

    logs_add(
            $level , $date , $u_id , $u_rol , $c , $a , $w ,
            $description , $doc_id , $crud , $error ,
            $val_get , $val_post , $val_request , $ip4 , $ip6 , $broswer
    ) ;
    //**************************************************************************
    $level = null ;
    $date = null ;
    //$u_id
    //$u_rol , 
    $c = "invoices";  
    //$a , 
    $w = null ;
    $description = "Add budget [$budget_id] to invoice [$invoice_id]";
    $doc_id = $invoice_id ;
    $crud = "update" ;
    $error = null ;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null ;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null ;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null ;
    $ip4 = get_user_ip() ;
    $ip6 = get_user_ip6() ;
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php

    logs_add(
            $level , $date , $u_id , $u_rol , $c , $a , $w ,
            $description , $doc_id , $crud , $error ,
            $val_get , $val_post , $val_request , $ip4 , $ip6 , $broswer
    ) ;
    ############################################################################
    ############################################################################
    ############################################################################    
    
    header("Location: index.php?c=budgets&a=details&id=$budget_id") ;
} else {
    include view("home" , "pageError") ;
}    