<?php

if ( ! permissions_has_permission($u_rol , $c , "read") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

$expense_id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false ;
$comments = (isset($_REQUEST["comments"]) && $_REQUEST["comments"] != '' ) ? clean($_REQUEST["comments"]) : "Invoice $expense_id" ;
$total = expenses_field_id('total' , $expense_id) ;
$tax = expenses_field_id("tax" , $expense_id) ;
$advance = expenses_field_id("advance" , $expense_id) ;

$status = 10 ;
//$create_credit_note = (isset($_REQUEST["create_credit_note"]) && $_REQUEST["create_credit_note"] == "on") ? true : false ;
$create_credit_note = true ;
$client_id = expenses_field_id("client_id" , $expense_id) ;
//$expense_id = $expense_id; 
$date_registre = null ;

$addresses_billing = expenses_field_id("addresses_billing" , $expense_id) ;
$addresses_delivery = expenses_field_id("addresses_delivery" , $expense_id) ;
$code = uniqid() ;

$returned = $total + $tax ;


$error = array() ;

###############################################################################
if ( ! $expense_id ) {
    array_push($error , "ID Don't send") ;
}
###############################################################################
# Variables obligatoias
###############################################################################
if ( ! expenses_is_id($expense_id) ) {
    array_push($error , 'ID format error') ;
}
###############################################################################
# Transformacion
#
###############################################################################
if ( expenses_field_id("status" , $expense_id) == -10 ) {
    array_push($error , 'Invoice already cancel') ;
}

if ( ! $error ) {

    /**
     * Si el valor es superior a 0, hago nota de credito 
     * 
     * 
     * 
     */
    // si hay cobros 
    if ( $total > 0 ) {


        // creo una nota de credito por lo cobrado 
        credit_notes_add($client_id , $expense_id , $addresses_billing , $addresses_delivery ,
                $date_registre , $advance , 0 , 0 ,
                $comments , $code , $status) ;

        $lastInsertCreditNotes = credit_notes_field_code("id" , $code) ;

        // Agrego la linea a la nota de credito
        credit_note_lines_add($lastInsertCreditNotes , 1 , $comments , $advance , 0) ;

        // registro la nota de credito en la factura 
        expenses_update_credit_note_id($expense_id , $lastInsertCreditNotes) ;




        // anulo los cobros en la balanza
        // pongo la factura anulada
        /**
         * Por registro de la balanza hago esto
         */
//        foreach ( balance_list_by_expense_id($expense_id) as $key => $balance ) {
//            // cojo el codigop para la anulacion 
//            $cc = balance_next_cancel_code() ;
//            // a cada vuelta anulo ina linea de la balanza y registro el codigo de anulacion 
//            balance_cancel($balance['id'] , $cc) ;
//            //
//            balance_set_cancel_code($balance['id'] , $cc) ;
//        }
        // actualizo el total cobrado de la factura
        //    expenses_update_total_advance($expense_id , 0) ;
        // Registro como cancel and refund
        expenses_change_status_to($expense_id , -20) ;

        // ahora actualizo 
        //    balance_set_credit_note_id_by_expense($lastInsertCreditNotes , $expense_id) ;
    } else {
        // pongo la factura como anulada
        expenses_change_status_to($expense_id , -10) ;
    }

    
    
    // actualizo los totales de la factura 
    expenses_update_total_tax($expense_id , expense_lines_totalHTVA($expense_id) , expense_lines_totalTVA($expense_id)) ;



    header("Location: index.php?c=expenses&a=details&id=$expense_id") ;
} else {
   
    include view("home", "pageError");
}
