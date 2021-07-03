<?php

if ( ! permissions_has_permission($u_rol , $c , "create") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

$budget_id = (isset($_POST["budget_id"])) ? clean($_POST["budget_id"]) : null ;
$credit_note_id = (isset($_POST["credit_note_id"])) ? clean($_POST["credit_note_id"]) : null ;
$client_id = (isset($_POST["client_id"])) ? clean($_POST["client_id"]) : null ;
$sellers_id = (isset($_POST["sellers_id"])) ? clean($_POST["sellers_id"]) : null ;
$date = (isset($_POST["date"])) ? clean($_POST["date"]) : null ;
$date_registre = (isset($_POST["date_registre"])) ? clean($_POST["date_registre"]) : null ;
$total = (isset($_POST["total"])) ? clean($_POST["total"]) : null ;
$tax = (isset($_POST["tax"])) ? clean($_POST["tax"]) : null ;
$advance = (isset($_POST["advance"])) ? clean($_POST["advance"]) : null ;
$balance = (isset($_POST["balance"])) ? clean($_POST["balance"]) : null ;
$comments = (isset($_POST["comments"])) ? clean($_POST["comments"]) : null ;
$comments_private = (isset($_POST["comments_private"])) ? clean($_POST["comments_private"]) : null ;
$r1 = (isset($_POST["r1"])) ? clean($_POST["r1"]) : null ;
$r2 = (isset($_POST["r2"])) ? clean($_POST["r2"]) : null ;
$r3 = (isset($_POST["r3"])) ? clean($_POST["r3"]) : null ;
$fc = (isset($_POST["fc"])) ? clean($_POST["fc"]) : null ;
$date_update = (isset($_POST["date_update"])) ? clean($_POST["date_update"]) : null ;
$days = (isset($_POST["days"])) ? clean($_POST["days"]) : null ;
$ce = (isset($_POST["ce"])) ? clean($_POST["ce"]) : null ;
$code = uniqid() ;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : 0 ;
// la sede
$owner_id = contacts_field_id("owner_id" , $client_id) ;

//$addresses_billing_json = json_encode(addresses_billing_by_contact_id(expenses_field_id("client_id" , $id))) ;
$addresses_billing_json = json_encode(addresses_billing_by_contact_id($owner_id)) ;
//$addresses_delivery_json = json_encode(addresses_delivery_by_contact_id($client_id)) ;
$addresses_delivery_json = $addresses_billing_json; 



$error = array() ;



/*
  if (!$budget_id) {
  array_push($error, '$budget_id not send');
  }if (!$credit_note_id) {
  array_push($error, '$credit_note_id not send');
  }
 */
if ( ! $owner_id ) {
    array_push($error , '$owner_id not send') ;
}


#************************************************************************
// Busca si uya existe el texto en la BD

if ( expenses_search($status) ) {
    //array_push($error, "That text with that context the database already exists");
}


if ( ! $error ) {

    expenses_add_by_client_id(
            $owner_id , $code , 10
    ) ;


    $lastInsertId = expenses_field_code("id" , $code) ;


    // actualizo la comunicacion extructurada segun el id creado 

    if ( $lastInsertId ) {
        
        // si este contacto no esta en la lista de provehedores, 
        // agregarlo 
        $providers_list = providers_company_list();         
        if( ! in_array($owner_id, $providers_list) ){
            providers_add($owner_id , null , null , 1 , 1); 
        }
        
        // actualizo la comunicacion
        //expenses_update_ce($lastInsertId , generate_structured_communication($lastInsertId)) ;
        // actualizo la direccion de facturacion
        expenses_update_billing_address($lastInsertId , $addresses_billing_json) ;
        // actualizo la direccion de entrega
        expenses_update_delivery_address($lastInsertId , $addresses_delivery_json) ;

        // actualizo los totales  
        expenses_update_total_tax($lastInsertId , expense_lines_totalHTVA($lastInsertId) , expense_lines_totalTVA($lastInsertId)) ;




        ############################################################################
        ############################################################################
        ############################################################################
        $id = $lastInsertId ;

        $level = null ;
        $date = null ;
        //$u_id
        //$u_rol , 
        //$c , $a , 
        $w = null ;
        $description = "Create a new expense: $id" ;
        $doc_id = $id ;
        $crud = "create" ;
        $error = null ;
        $val_get = ( isset($_GET) ) ? json_encode($_GET) : null ;
        $val_post = ( isset($_POST) ) ? json_encode($_POST) : null ;
        $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null ;
        $ip4 = get_user_ip() ;
        $ip6 = get_user_ip6() ;
        $broswer = json_encode(get_user_browser()) ; //https://www.php.net/manual/es/function.get-browser.php

        logs_add(
                $level , $date , $u_id , $u_rol , $c , $a , $w ,
                $description , $doc_id , $crud , $error ,
                $val_get , $val_post , $val_request , $ip4 , $ip6 , $broswer
        ) ;
        ############################################################################
        ############################################################################
        ############################################################################        
    }



    header("Location: index.php?c=expenses&a=edit&id=$lastInsertId") ;
} else {

    include view("home" , "pageError") ;
}
