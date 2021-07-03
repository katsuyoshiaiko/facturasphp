<?php

if ( ! permissions_has_permission($u_rol , $c , "create") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}


$invoice_id = null; 
$expense_id = (isset($_POST["expense_id"])) ? clean($_POST["expense_id"]) : false ;
$client_id = (expenses_field_id("cliente_id" , $expense_id)) ? expenses_field_id("cliente_id" , $expense_id) : null ;
$credit_note_id = (expenses_field_id("credit_note_id" , $expense_id)) ? expenses_field_id("credit_note_id" , $expense_id) : null ;
//$type = ( isset($_POST["type"]) && ($_POST["type"]) !== '') ? clean($_POST["type"]) : 1;
$type = -1 ;
$account_number = ( isset($_POST["account_number"]) && ($_POST["account_number"]) !== '') ? clean($_POST["account_number"]) : false ;
//$sub_total = ( isset($_POST["sub_total"]) && ($_POST["sub_total"]) != '') ? clean($_POST["sub_total"]) : 0.0;
//$tax = ( isset($_POST["tax"]) && ($_POST["tax"]) != '') ? clean($_POST["tax"]) : 0.0;
$total = ( isset($_POST["total"]) && ($_POST["total"]) != '') ? clean($_POST["total"]) : 0.0 ;
//$total = 0;
$ref = ( isset($_POST["ref"]) && ($_POST["ref"]) != '') ? clean($_POST["ref"]) : '-' ;
$description = ( isset($_POST["description"]) && ($_POST["description"]) != '') ? clean($_POST["description"]) : "Invoice $expense_id" ;
$ce = ( isset($_POST["ce"]) && ($_POST["ce"]) != '' ) ? clean($_POST["ce"]) : expenses_field_id("ce" , $expense_id) ;
//$date_registre = ( isset($_POST["date_registre"]) && ($_POST["date_registre"]) != '') ? clean($_POST["date_registre"]) : null;
$date_registre = null ;
$canceled = null ;
$canceled_code = null ;
$code = uniqid();
$error = array() ;



if ( ! $expense_id ) {
    array_push($error , '$client_id not send') ;
}


#************************************************************************
# 
#************************************************************************
// Promedio de tax
$average_tax = expense_lines_average_tax($expense_id) ;
//$total = ""; // 121%
$tax = ($average_tax > 0 ) ? ($total * $average_tax) / ($average_tax + 100) : 0 ; // 21% 

$sub_total = $total - $tax ;

if($type == -1){
    $sub_total = -($sub_total);
    $total = -($total);
    $tax = -($tax);
}

if ( ! $error ) {
  
    balance_add($client_id , $expense_id , $invoice_id , $credit_note_id , $type , 
            $account_number , $sub_total , $tax , $total , 
            $ref , $description , $ce , $date , $date_registre , 
            $code , $canceled , $canceled_code); 

    $lastInsertId = balance_field_code("id", $code); 
    
    
    ############################################################################
    ############################################################################
    ############################################################################
    $id = $expense_id; 
        
    $level = null ;
    $date = null ;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null ;
    $description = "Registre payement<br>Balance details: [ Id: $lastInsertId, client_id: $client_id , expense_id: $expense_id , credit_note_id: $credit_note_id , type: $type , account_number: $account_number , sub_total: $sub_total , tax: $tax , total: $total , 
            ref: $ref , description: $description , ce: $ce , date: $date , date_registre: $date_registre , 
            code: $code , canceled: $canceled , canceled_code: $canceled_code ]";
    $doc_id = $id ;
    $crud = "create" ;
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
    
    
    
    
    
    
    


    if ( $lastInsertId ) {
        // Sumamos el pago a lo pagado en la factura 

        expenses_update_total_advance($expense_id , expenses_field_id("advance" , $expense_id) + ($sub_total + $tax)) ;

        expenses_change_status_to($expense_id , 20) ; // cobro parcial

        if ( abs(expenses_field_id("advance" , $expense_id)) >= (expenses_field_id('total' , $expense_id) + expenses_field_id('tax' , $expense_id) ) ) {
            // cambio de estatus a cobro total
            expenses_change_status_to($expense_id , 30) ; // cobro total
        }
    }
    
    // actualizo los totales de la factura 
    expenses_update_total_tax($expense_id , expense_lines_totalHTVA($expense_id) , expense_lines_totalTVA($expense_id));



    header("Location: index.php?c=expenses&a=details&id=$expense_id#Payments") ;
} else {
   
    include view("home", "pageError");
}
