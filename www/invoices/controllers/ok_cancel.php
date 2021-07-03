<?php

if ( ! permissions_has_permission($u_rol , $c , "update") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

$invoice_id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false ;
$comments = (isset($_REQUEST["comments"]) && $_REQUEST["comments"] != '' ) ? clean($_REQUEST["comments"]) : null ;
// Saldo de las facturas
$total = invoices_field_id('total' , $invoice_id) ;
$tax = invoices_field_id("tax" , $invoice_id) ;

$advance = invoices_field_id("advance" , $invoice_id) ;




$status = 10 ;
$create_credit_note = (isset($_REQUEST["create_credit_note"]) && $_REQUEST["create_credit_note"] == "on") ? true : false ;
//$create_credit_note = true ;
$client_id = invoices_field_id("client_id" , $invoice_id) ;
//$invoice_id = $invoice_id; 
$date_registre = null ;

$addresses_billing = invoices_field_id("addresses_billing" , $invoice_id) ;
$addresses_delivery = invoices_field_id("addresses_delivery" , $invoice_id) ;

$code = uniqid() ;

$returned = $total + $tax ;


$error = array() ;

###############################################################################
if ( ! $invoice_id ) {
    array_push($error , "ID Don't send") ;
}
###############################################################################
# Variables obligatoias
###############################################################################
if ( ! invoices_is_id($invoice_id) ) {
    array_push($error , 'ID format error') ;
}
###############################################################################
# Transformacion
#
###############################################################################
if ( invoices_field_id("status" , $invoice_id) == -10 ) {
    array_push($error , 'Invoice already cancel') ;
}

if ( ! $error ) {
/**
 * si hay cobros 
 */
    if ( $advance > 0 ) {


        // creo una nota de credito por lo cobrado 
        credit_notes_add($client_id , $invoice_id , $addresses_billing , $addresses_delivery ,
                $date_registre , $advance , 0 , 0 ,
                $comments , $code , $status) ;

        $lastInsertCreditNotes = credit_notes_field_code("id" , $code) ;

        // Agrego la linea a la nota de credito
        credit_note_lines_add($lastInsertCreditNotes , 1 , "Invoice $invoice_id" , $advance , 0) ;
        

        // registro la nota de credito en la factura 
        invoices_update_credit_note_id($invoice_id , $lastInsertCreditNotes) ;




        // anulo los cobros en la balanza
        // pongo la factura anulada
        /**
         * Por registro de la balanza hago esto
         */
//        foreach ( balance_list_by_invoice_id($invoice_id) as $key => $balance ) {
//            // cojo el codigop para la anulacion 
//            $cc = balance_next_cancel_code() ;
//            // a cada vuelta anulo ina linea de la balanza y registro el codigo de anulacion 
//            balance_cancel($balance['id'] , $cc) ;
//            //
//            balance_set_cancel_code($balance['id'] , $cc) ;
//        }
        // actualizo el total cobrado de la factura
        //    invoices_update_total_advance($invoice_id , 0) ;
        // Registro como cancel and credit note created
        invoices_change_status_to($invoice_id , -20) ;

        // ahora actualizo 
        //    balance_set_credit_note_id_by_invoice($lastInsertCreditNotes , $invoice_id) ;
    } else {
        // pongo la factura como anulada
        invoices_change_status_to($invoice_id , -10) ;
    }

    // Registro el comentario por el cual se anula la factura 
    
    comments_add(null, $u_id, $c, $invoice_id, $comments, 1, 1); 
    
    // actualizo los totales de la factura 
    invoices_update_total_tax($invoice_id , invoice_lines_totalHTVA($invoice_id) , invoice_lines_totalTVA($invoice_id)) ;
    
    
    
    ############################################################################
    ############################################################################
    ############################################################################
   // $id = $lastInsertCreditNotes; 
        
    $level = null ;
    $date = null ;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null ;
    $description = "Invoices cancel";
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
    #
    ############################################################################
    ############################################################################
    ############################################################################
   // $id = $lastInsertCreditNotes; 
        
    $level = null ;
    $date = null ;
    //$u_id
    //$u_rol , 
    $c = "credit_notes";
    $a = "create"; 
    $w = null ;
    $description = "Credit note created";
    $doc_id = $lastInsertCreditNotes ;
    $crud = "Create" ;
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



    header("Location: index.php?c=invoices&a=details&id=$invoice_id") ;
} else {
   
    include view("home", "pageError");
}
