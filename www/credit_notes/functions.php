<?php
// plugin = credit_notes
// creation date : 
// 
// 
function credit_notes_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM credit_notes WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}


function credit_notes_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM credit_notes WHERE code= ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function credit_notes_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM credit_notes WHERE   $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function credit_notes_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM credit_notes ORDER BY id DESC LIMIT $limit  ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function credit_notes_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM credit_notes WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function credit_notes_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM credit_notes WHERE id=? ");
    $req->execute(array($id));
}

function credit_notes_edit($id ,  $client_id ,  $invoice_id ,  $addresses_billing ,  $addresses_delivery ,  $date_registre ,  $total ,  $tax ,  $returned ,  $comments ,  $code ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE credit_notes SET "
            
            ."client_id=:client_id , "   
."invoice_id=:invoice_id , "   
."addresses_billing=:addresses_billing , "   
."addresses_delivery=:addresses_delivery , "   
."date_registre=:date_registre , "   
."total=:total , "   
."tax=:tax , "   
."returned=:returned , "   
."comments=:comments , "   
."code=:code , "   
."status=:status  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "client_id" =>$client_id ,   "invoice_id" =>$invoice_id ,   "addresses_billing" =>$addresses_billing ,   "addresses_delivery" =>$addresses_delivery ,   "date_registre" =>$date_registre ,   "total" =>$total ,   "tax" =>$tax ,   "returned" =>$returned ,   "comments" =>$comments ,   "code" =>$code ,   "status" =>$status ,  
                

));
}

function credit_notes_add($client_id ,  $invoice_id ,  $addresses_billing ,  $addresses_delivery ,  $date_registre ,  $total ,  $tax ,  $returned ,  $comments ,  $code ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `credit_notes` ( `id` ,   `client_id` ,   `invoice_id` ,   `addresses_billing` ,   `addresses_delivery` ,   `date_registre` ,   `total` ,   `tax` ,   `returned` ,   `comments` ,   `code` ,   `status`   )
                                       VALUES  (:id ,  :client_id ,  :invoice_id ,  :addresses_billing ,  :addresses_delivery ,  :date_registre ,  :total ,  :tax ,  :returned ,  :comments ,  :code ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "client_id" => $client_id ,  
 "invoice_id" => $invoice_id ,  
 "addresses_billing" => $addresses_billing ,  
 "addresses_delivery" => $addresses_delivery ,  
 "date_registre" => $date_registre ,  
 "total" => $total ,  
 "tax" => $tax ,  
 "returned" => $returned ,  
 "comments" => $comments ,  
 "code" => $code ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}



function credit_notes_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM credit_notes 
    
            WHERE id like :txt OR id like :txt
OR client_id like :txt
OR invoice_id like :txt
OR addresses_billing like :txt
OR addresses_delivery like :txt
OR date_registre like :txt
OR total like :txt
OR tax like :txt
OR returned like :txt
OR comments like :txt
OR code like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function credit_notes_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (credit_notes_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function credit_notes_is_id($id){
     return true;
}

function credit_notes_is_client_id($client_id){
     return true;
}

function credit_notes_is_invoice_id($invoice_id){
     return true;
}

function credit_notes_is_addresses_billing($addresses_billing){
     return true;
}

function credit_notes_is_addresses_delivery($addresses_delivery){
     return true;
}

function credit_notes_is_date_registre($date_registre){
     return true;
}

function credit_notes_is_total($total){
     return true;
}

function credit_notes_is_tax($tax){
     return true;
}

function credit_notes_is_returned($returned){
     return true;
}

function credit_notes_is_comments($comments){
     return true;
}

function credit_notes_is_code($code){
     return true;
}

function credit_notes_is_status($status){
     return true;
}

function credit_notes_can_be_edit( $credit_notes_id ) {    
    // determina si puede ser editada   
    if( ! $credit_notes_id ){
        return false;
    }
    // si el saldo de pagos de esta nota de credito es superiro a cero, no se puede editar
    
        if(balance_total_total_by_credit_note($credit_notes_id) > 0 ){
        return false;
    }
    
    
    if(credit_notes_field_id('invoice_id', $credit_notes_id) ){
        return false;
    }
    
    // si proviene de una factura 
    
    $status = credit_notes_field_id("status", $credit_notes_id); 
        
    switch ($status) {
        case 10:
            $can = true; 
            break;
        
        case 20:
            $can = false; 
            break;
        
        case -10:
            $can = false; 
            break;

        default:
            $can = false; 
            break;
    }
    
    return $can ;
    
}

function credit_notes_add_by_client_id($client_id , $code , $status , $budget_id = null) {
    global $db ;
    $req = $db->prepare(" INSERT INTO `credit_notes` ( `client_id`, `code`, `status`   )
                                       VALUES  (:client_id , :code,  :status  ) ") ;
    $req->execute(array(
        "client_id" => $client_id ,
        "code" => $code ,
        "status" => $status
            )
    ) ;
    return $db->lastInsertId() ;
}

function credit_notes_add_individual_by_client_id($client_id , $ab , $ad , $code , $status , $budget_id) {
    global $db ;
    $req = $db->prepare(" INSERT INTO `credit_notes` ( `client_id`, `budget_id`, `addresses_billing`, `addresses_delivery`, `code`, `type`, `status`   )
                                       VALUES    (  :client_id , :budget_id, :addresses_billing, :addresses_delivery,  :code,  :type,  :status  ) ") ;
    $req->execute(array(
        "client_id" => $client_id ,
        "budget_id" => $budget_id ,
        "addresses_billing" => $ab ,
        "addresses_delivery" => $ad ,
        "code" => $code ,
        "type" => "I" ,
        "status" => $status
            )
    ) ;


    return $db->lastInsertId() ;
}

function credit_notes_search_by_id($id) {
    global $db ;
    $req = $db->prepare("SELECT * FROM credit_notes WHERE id= ? ") ;
    $req->execute(array( $id )) ;
    $data = $req->fetchall() ;
    return $data ;
}
//
//function credit_notes_search_by_code($code) {
//    global $db ;
//    $req = $db->prepare("SELECT * FROM credit_notes WHERE status= ? ") ;
//    $req->execute(array( $code )) ;
//    $data = $req->fetchall() ;
//    return $data ;
//}

function credit_notes_search_by_client_id($client_id) {
    global $db ;
    $req = $db->prepare("SELECT * FROM credit_notes WHERE client_id= ? ") ;
    $req->execute(array( $client_id )) ;
    $data = $req->fetchall() ;
    return $data ;
}

/**
 * Facturas en status registradas, segun cliente y typo
 * @global type $db
 * @param type $client_id
 * @param type $type [M, I]
 * @return type
 */
function credit_notes_search_registre_by_cliente_id_type($client_id , $type) {
    global $db ;
    $req = $db->prepare("SELECT id FROM credit_notes WHERE type= :type AND ( client_id = :client_id AND :status = :status )") ;
    $req->execute(array(
        "client_id" => $client_id ,
        "type" => $type ,
        "status" => 10
    )) ;
    $data = $req->fetch() ;
    return (isset($data[0])) ? $data[0] : false ;
}

function credit_notes_search_by_year_trimestre($year , $tri) {
    global $db ;
    
    switch ($tri) {
        case 1: // enero, feb, marzo
            $m1 = 1; 
            $m2 = 2; 
            $m3 = 3; 
            break;
        case 2: // abril, mayo, junio
            $m1 = 4; 
            $m2 = 5; 
            $m3 = 6; 
            break;
        case 3: // julio, agos, sept
            $m1 = 7; 
            $m2 = 8; 
            $m3 = 9; 
            break;
        case 4: // oct, nov , dic
            $m1 = 10; 
            $m2 = 11; 
            $m3 = 12; 
            break;

        default:
            break;
    }
    
    $req = $db->prepare(
        "   SELECT * 
            FROM credit_notes 
            WHERE YEAR(date_registre) =:year AND 
            (
            MONTH(date_registre)=:m1 OR 
            MONTH(date_registre)=:m2 OR 
            MONTH(date_registre)=:m3 
            )
            ORDER BY date_registre, id DESC
                         
        ") ;
    $req->execute(array(
        "year" => $year ,
        "m1" => $m1,         
        "m2" => $m2,         
        "m3" => $m3,         
    )) ;
    $data = $req->fetchall() ;
    return (isset($data)) ? $data : false ;
}


function credit_notes_search_by_client_id_type_status($client_id , $type , $status) {
    global $db ;
    $req = $db->prepare("SELECT * FROM credit_notes WHERE type= :type AND ( client_id = :client_id AND :status = :status )") ;
    $req->execute(array(
        "client_id" => $client_id ,
        "type" => $type ,
        "status" => $status
    )) ;
    $data = $req->fetchall() ;
    return (isset($data)) ? $data : false ;
}

function credit_notes_comments_update($credit_note_id , $comments) {
    global $db ;
    $req = $db->prepare(" UPDATE credit_notes SET comments=:comments WHERE id=:id  ") ;
    $req->execute(array(
        "id" => $credit_note_id ,
        "comments" => $comments
            )
    ) ;
    //return $db->lastInsertId();
}

function credit_notes_update_ce($credit_note_id , $ce) {
    global $db ;
    $req = $db->prepare(" UPDATE credit_notes SET ce=:ce WHERE id=:id  ") ;
    $req->execute(array(
        "id" => $credit_note_id ,
        "ce" => $ce
            )
    ) ;
    //return $db->lastInsertId();
}


/**
 * Recalcula la suma de los items de una factura y los registra en la factura 
 * @global type $db
 * @param type $credit_note_id
 * @param type $ce
 */
function credit_notes_update_total_credit_notexxxxxxxxxxxxxx($credit_note_id) {
    /**
     * valtax = (tax/100+1)
     * 
     * if( discounts_mode = '%') 
     *      total_discount = precio - ((precio * discounts)/100)
     * 
     * if( discounts_mode != '%')
     *      total_discount = precio - discounts
     * 
     * 
     * if( discounts_mode = '%' , price - ((price * discounts)/100) , price - discounts) as total_discount 
     * 
     * 
     * (quantity * (price - if( discounts_mode = '%' , price - ((price * discounts)/100) , price - discounts))) * (tax/100+1)
     */
    
    
    //if( discounts_mode = '%' , price - ((price * discounts)/100) , price - discounts))) * (tax/100+1)) 
    
    global $db ;
    $req = $db->prepare("
            UPDATE credit_notes 
            SET 
            
            total = (SELECT SUM(quantity * price) FROM credit_note_lines WHERE credit_note_id=:id ), 
            
            tax   = (SELECT SUM(quantity * price) FROM credit_note_lines WHERE credit_note_id=:id )
        
            WHERE id=:id  ") ;
                
    
    $req->execute(array(
        "id" => $credit_note_id ,
            )
    ) ;
    //return $db->lastInsertId();
}

function credit_notes_update_type($credit_note_id , $type) {
    global $db ;
    $req = $db->prepare(" UPDATE credit_notes SET type=:type WHERE id=:id  ") ;
    $req->execute(array(
        "id" => $credit_note_id ,
        "type" => $type
            )
    ) ;
    //return $db->lastInsertId();
}

//function credit_notes_update_credit_note_id($credit_note_id , $credit_note_id) {
//    global $db ;
//    $req = $db->prepare(" UPDATE credit_notes SET credit_note_id=:credit_note_id WHERE id=:id  ") ;
//    $req->execute(array(
//        "id" => $credit_note_id ,
//        "credit_note_id" => $credit_note_id
//            )
//    ) ;
//    //return $db->lastInsertId();
//}

function credit_notes_update_total_tax($id , $total , $tax) {
    global $db ;
    $req = $db->prepare(" UPDATE `credit_notes` SET `total` = :total, `tax` = :tax WHERE `id` = :id  ") ;
    $req->execute(array(
        "total" => $total ,
        "tax" => $tax ,
        "id" => $id
            )
    ) ;
}


function credit_note_lines_totalHTVA($credit_note_id){
        global $db;
    $limit = 999;

    $data = null;
    
    $req = $db->prepare("SELECT SUM( quantity * value  ) as total  FROM credit_note_lines WHERE credit_note_id=:credit_note_id ");
    
    $req->execute(array(        
        "credit_note_id" => $credit_note_id
    ));
    
    $data = $req->fetch();
    return ($data[0]) ? : 0;
}

function credit_note_lines_totalTVA($credit_note_id){
    global $db;
    $limit = 999;
    $data = null;    
    $req = $db->prepare("SELECT SUM(( quantity * value  * tax )/100) as total  FROM credit_note_lines WHERE credit_note_id=:credit_note_id ");    
    $req->execute(array(        
        "credit_note_id" => $credit_note_id
    ));    
    $data = $req->fetch();
    return ($data[0]) ? : 0;
}



function credit_notes_update_total_advance($id , $advance) {
    global $db ;
    $req = $db->prepare(" UPDATE credit_notes SET advance=:advance WHERE id=:id  ") ;
    $req->execute(array(
        "advance" => $advance ,
        "id" => $id
            )
    ) ;
    //return $db->lastInsertId();
}

//function credit_notes_change_status_to($id , $status) {
//    global $db ;
//    $req = $db->prepare(" UPDATE credit_notes SET status=:status WHERE id=:id  ") ;
//    $req->execute(array(
//        "status" => $status ,
//        "id" => $id
//            )
//    ) ;
//    //return $db->lastInsertId();
//}

function credit_notes_modal_reminder_send($r , $credit_note_id) {
    include view("credit_notes" , "modal_reminder_send") ;
}

//function credit_notes_total_by_status($status) {
//    global $db ;
//    $req = $db->prepare(" SELECT COUNT(*)  FROM credit_notes  WHERE status=?  ") ;
//    $req->execute(array( $status )) ;
//    $data = $req->fetch() ;
//    return $data[0] ;
//}

function credit_notes_search_by_budget_id($budget_id) {
    global $db ;
    $req = $db->prepare("SELECT * FROM credit_notes WHERE budget_id= ? ") ;
    $req->execute(array( $budget_id )) ;
    $data = $req->fetchall() ;
    return $data ;
}

function credit_notes_total_credit_noted_budget_id($budget_id) {
    global $db ;
    $req = $db->prepare("SELECT SUM(total + tax) as total FROM credit_notes WHERE budget_id= ? ") ;
    $req->execute(array( $budget_id )) ;
    $data = $req->fetchall() ;
    return doubleval($data[0][0]) ;
}

function credit_notes_update_billing_address($credit_note_id , $new_address_json) {
    global $db ;
    $req = $db->prepare(" UPDATE `credit_notes` SET `addresses_billing` =:addresses_billing WHERE `id`=:id  ") ;
    $req->execute(array(
        "id" => $credit_note_id ,
        "addresses_billing" => $new_address_json
            )
    ) ;
}

function credit_notes_update_delivery_address($credit_note_id , $new_address_json) {
    global $db ;
    $req = $db->prepare(" UPDATE credit_notes SET addresses_delivery =:addresses_delivery WHERE id=:id  ") ;
    $req->execute(array(
        "id" => $credit_note_id ,
        "addresses_delivery" => $new_address_json
            )
    ) ;
    //return $db->lastInsertId();
}

function credit_note_status_list_e() {
    global $db ;
    $limit = 999 ;

    $data = null ;

    $req = $db->prepare("SELECT * FROM credit_note_status ORDER BY order_by  LIMIT $limit ") ;

    $req->execute(array(
        "limit" => $limit
    )) ;
    $data = $req->fetchall() ;
    return $data ;
}

//function credit_notes_field_code($field , $code) {
//    global $db ;
//
//    $req = $db->prepare("SELECT $field FROM `credit_notes` WHERE `code`= ?") ;
//
//    $req->execute(array(
//        $code
//    )) ;
//
//    $data = $req->fetch() ;
//
//    return (isset($data[0])) ? $data[0] : false ;
//}

/**
 * Mustra si es Indivicual o Mensual
 * @param type $id
 */
function credit_notes_numberf($id) {
    $type = ( credit_notes_field_id("type" , $id) ) ? credit_notes_field_id("type" , $id) : "" ;
    ;

    echo ( $type == "M" || $type == "I") ? "$id - $type" : $id ;
}

function credit_notes_search_advanced(
        $client_id , $status , $year , $month , $monthly
) {
    global $db ;
/////////////
// no facturados unicamente
//    
    if ( $monthly ) {
        $req = $db->prepare(" SELECT * FROM credit_notes WHERE client_id =:client_id AND status = :status  AND (date_registre BETWEEN :start AND :end) AND type = :type order by date_registre DESC ") ;
        $req->execute(array(
            'client_id' => $client_id ,
            'status' => $status ,
            'start' => "$year-$month-01 00:00:00" ,
            'end' => "$year-$month-31 23:59:59" ,
            'type' => 'M'
        )) ;
    } else {
        $req = $db->prepare("SELECT * FROM credit_notes WHERE client_id =:client_id AND status = :status  AND (date_registre BETWEEN :start AND :end) order by date_registre DESC") ;
        $req->execute(array(
            'client_id' => $client_id ,
            'status' => $status ,
            'start' => "$year-$month-01 00:00:00" ,
            'end' => "$year-$month-31 23:59:59"
        )) ;
    }
//////////////    
    $data = $req->fetchall() ;
    return $data ;
}

function credit_note_remove_items_by_budget_id($budget_id) {
    global $db ;

    $req = $db->prepare(" DELETE  FROM `credit_note_lines` WHERE `budget_id` = :budget_id ") ;

    $req->execute(array(
        "budget_id" => $budget_id
    )) ;
}

// PDF FILES
function credit_notes_pdf_formated_id($id){
   
    $y = date('Y', strtotime(credit_notes_field_id("date_registre", $id))); 
// extraigo el año de la factura 
    // la agrego antes del numero 
    return $y . "" .$id ; 
    
}

function credit_note_lines_add_with_budget_id(
        
        $credit_note_id , $budget_id,  $code ,  $quantity ,  $description ,  $price ,  $discounts ,  $discounts_mode ,  $tax ,  $order_by ,  $status   
        
        ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `credit_note_lines` ( `id` ,   `credit_note_id` , `budget_id`,  `code` ,   `quantity` ,   `description` ,   `price` ,   `discounts` ,   `discounts_mode` ,   `tax` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :credit_note_id , :budget_id, :code ,  :quantity ,  :description ,  :price ,  :discounts ,  :discounts_mode ,  :tax ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "credit_note_id" => $credit_note_id ,  
  "budget_id"=>$budget_id,
 "code" => $code ,  
 "quantity" => $quantity ,  
 "description" => $description ,  
 "price" => $price ,  
 "discounts" => $discounts ,  
 "discounts_mode" => $discounts_mode ,  
 "tax" => $tax ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}


function credit_notes_add_r1($credit_note_id) {
    global $db ;
    $req = $db->prepare(" UPDATE credit_notes SET r1=:r1 WHERE id=:id  ") ;
    $req->execute(array(
        "id" => $credit_note_id ,
        "r1" => date("Y-m-d"), 
            )
    ) ;    
}

function credit_notes_add_r2($credit_note_id) {
    global $db ;
    $req = $db->prepare(" UPDATE credit_notes SET r2=:r2 WHERE id=:id  ") ;
    $req->execute(array(
        "id" => $credit_note_id ,
        "r2" => date("Y-m-d"), 
            )
    ) ;    
}

function credit_notes_add_r3($credit_note_id) {
    global $db ;
    $req = $db->prepare(" UPDATE credit_notes SET r3=:r3 WHERE id=:id  ") ;
    $req->execute(array(
        "id" => $credit_note_id ,
        "r3" => date("Y-m-d"), 
            )
    ) ;    
}
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

function credit_notes_total_by_status($status) {
    global $db ;
    $req = $db->prepare(" SELECT COUNT(*)  FROM credit_notes  WHERE status=?  ") ;
    $req->execute(array( $status )) ;
    $data = $req->fetch() ;
    return $data[0] ;
}

function credit_notes_search_by_code($code) {
    global $db ;
    $req = $db->prepare("SELECT * FROM credit_notes WHERE code= ? ") ;
    $req->execute(array( $code )) ;
    $data = $req->fetchall() ;
    return $data ;
}

function credit_notes_search_by_status($status) {
    global $db ;
    $req = $db->prepare("SELECT * FROM credit_notes WHERE status= ? ORDER BY id DESC ") ;
    $req->execute(array( $status )) ;
    $data = $req->fetchall() ;
    return $data ;
}

function credit_notes_change_status_to($id , $status) {
    global $db ;
    $req = $db->prepare(" UPDATE credit_notes SET status=:status WHERE id=:id  ") ;
    $req->execute(array(
        "status" => $status ,
        "id" => $id
            )
    ) ;
    //return $db->lastInsertId();
}

function credit_notes_change_date($id, $date) {
    global $db;
    $req = $db->prepare(
            "UPDATE credit_notes 
            SET date=:date 
            WHERE id=:id          
        ");
    $req->execute(array(
        "date" => $date,        
        "id" => $id
            )
    );    
}

//function credit_notes_field_code($field, $code) {
//    global $db;
//    $data = null;
//    $req = $db->prepare("SELECT $field FROM credit_notes WHERE code= ?");
//    $req->execute(array($code));
//    $data = $req->fetch();
//    //return $data[0];
//    return (isset($data[0]))? $data[0] :  false;
//}

function credit_notes_update_returned($id , $returned) {
    global $db ;
    $req = $db->prepare(" UPDATE credit_notes SET returned=:returned WHERE id=:id  ") ;
    $req->execute(array(
        "returned" => $returned ,
        "id" => $id
            )
    ) ;
    return $db->lastInsertId() ;
}

function credit_notes_update($id , $total , $description) {

    global $db ;
    $req = $db->prepare(" UPDATE credit_note_lines SET value=:value, description=:description  WHERE credit_note_id=:id ") ;
    $req->execute(array(
        "id" => $id , 
        "value" => $total , 
        "description" => $description
    )) ;
}

function credit_notes_update_total($id) {
    global $db ;
    $req = $db->prepare("UPDATE credit_notes SET total= (SELECT SUM(value) FROM credit_note_lines WHERE credit_note_id=:id ), tax =(SELECT SUM(tax) FROM credit_note_lines WHERE credit_note_id=:id ) WHERE id=:id  ") ;
    $req->execute(array(
        "id" => $id ,
            )
    ) ;
    //return $db->lastInsertId();
}